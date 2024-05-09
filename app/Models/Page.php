<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'title',
        'content',
        'is_active',
        'created_at',
        'updated_at',
    ];
}
