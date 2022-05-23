<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pedoman extends Model
{
    protected $fillable = ['judul', 'slug', 'deskripsi', 'detail'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}


