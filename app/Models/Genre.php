<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    // リレーション
    public function movie() {
        // これ多分hasmanyだと思う,moviesって書くべきだと思う
        return $this->hasOne(Movie::class);
    }
}
