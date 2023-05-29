<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';    
    protected $guarded = 'false';
    protected $fillable = [
        'title',
        'content',
        'description',
        'preview_image',
        'price',
        'count',
        'is_published',
        'caregory_id',
        //'tags',
       // 'colors',
    ];
}

