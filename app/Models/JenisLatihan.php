<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLatihan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function latihans()
    {
        return $this->hasMany(Latihan::class);
    }
}
