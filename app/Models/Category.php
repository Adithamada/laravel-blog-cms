<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";

    public function blog(){
        return $this->hasMany(Blog::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
