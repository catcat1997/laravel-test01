<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $table = 'article';
    public $timestamps = false;

    // protected $primaryKey = 'id';
    // protected $fillable = ['id','article_name','author_id'];

    // 模型的關聯操作: 一對一
    public function author(){
        return $this->hasOne('App\Models\home\author','id','author_id');
    }

    // 一對多, 加入comment關聯
    public function comment(){
        return $this->hasMany('App\Models\home\comment','article_id','id');
    }

    // 多對多
    public function keyword(){
        return $this->belongsToMany('App\Models\home\keyword','relation','article_id','key_id');
    }
}
