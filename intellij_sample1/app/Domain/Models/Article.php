<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //テーブルとの紐付け
    protected $table = 'articles';

//    protected $fillable = ['user_id', 'body'];
}
