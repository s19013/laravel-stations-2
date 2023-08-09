<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    // リレーション
    public function movie() {
        return $this->hasOne(Movie::class);
    }
}
