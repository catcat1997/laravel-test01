<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //  Home分組的index方法
    public function index(){
        echo '這是前台下的index方法';
    }
}
