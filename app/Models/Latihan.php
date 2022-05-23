<?php

namespace App\Models;

use App\Models\User;
use App\Models\JenisLatihan;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Latihan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['jenislatihan', 'author'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['cari'] ?? false, function($query, $cari) {
            return $query->where('judul', 'like', '%' . $cari . '%')
                        ->orWhere('deskripsi', 'like', '%' . $cari . '%');
        });

        $query->when($filters['jenislatihan'] ?? false, function($query, $jenislatihan) {
            return$query->whereHas('jenislatihan', function($query) use ($jenislatihan) {
                $query->where('slug', $jenislatihan);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function jenislatihan()
    {
        return $this->belongsTo(JenisLatihan::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
