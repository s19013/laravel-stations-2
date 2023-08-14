<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    protected $dates = ['date'];

    // リレーション
    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }

    public function sheet() {
        return $this->belongsTo(Sheet::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
