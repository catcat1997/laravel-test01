<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keyword extends Model
{
    use HasFactory;
    protected $table = 'keyword';
    public $timestamps = false;
}
