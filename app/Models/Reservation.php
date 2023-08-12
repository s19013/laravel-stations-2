<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    // リレーション
    public function schedule() {
        return $this->hasOne(Schedule::class);
    }

    public function sheet() {
        return $this->hasOne(Sheet::class);
    }
}
