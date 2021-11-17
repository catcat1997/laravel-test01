<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    use HasFactory;
    protected $table = 'author';
    public $timestamps = false;

    // protected $primaryKey = 'id';
    // protected $fillable = ['id','article_name','author_id'];
}
