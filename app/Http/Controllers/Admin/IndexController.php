<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
     //  Admin分組的index方法
     public function index(){
        echo '這是後台下的index方法';
    }
}
