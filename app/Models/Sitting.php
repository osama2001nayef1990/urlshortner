<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'light_logo',
        'dark_logo',
        'light_favicon',
        'dark_favicon',
        'about_us',
    ];
}
