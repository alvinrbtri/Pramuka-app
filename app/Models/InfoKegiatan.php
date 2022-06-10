<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class InfoKegiatan extends Model
{
    protected $fillable = ['judul', 'slug', 'deskripsi', 'informasi'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
