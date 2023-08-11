<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];
    protected $dates = ['start_time','end_time'];
    //これでformatが使える
    // date(, strtotime())を使う方法もあるが､model使ってるんだからformat()を使おうと思う


    // リレーション
    public function movie()
    {
       return $this->belongsTo(Movie::class);
    }
}
