<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    
    public function comments() {
        return $this->hasMany(Review::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'product_id');
    }
}
