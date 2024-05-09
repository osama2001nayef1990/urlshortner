<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'action',
        'description',
        'user_id',
        'admin_id',
        'url_id',
        'created_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function url(){
        return $this->belongsTo(Url::class);
    }
    
}
