<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];
    protected $dates = ['start_time','end_time'];//これでformatが使える

    // リレーション
    public function movie()
    {
       return $this->belongsTo(Movie::class);
    }
}
