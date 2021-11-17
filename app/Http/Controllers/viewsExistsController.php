<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class viewsExistsController extends Controller
{
    public function views_exists($viewfile = 'a'){
        if(View::exists($viewfile)) {
            echo 'viewfile name: ' . $viewfile . ' exist!';
        }else {
            echo 'viewfile name: ' . $viewfile . " doesn't exist!";
        }
    }

    public function greeting_func($name1 = 'peter', $name2 = 'mary'){
        $name1 = $name1;
        $name2 = $name2;
        // 視圖變量的渲染方法  1.數組, 2.->with(數組) , 3.->with()->with()
        // return view('greeting',['name1'=>$name1 , 'name2'=> $name2]);
        // return view('greeting')->with(['name1'=>$name1 , 'name2'=> $name2]);
        // return view('greeting')->with('name1','test1')->with('name2','test2');
        $time = time();
        // 使用compact函數 渲染
        return view('greeting',compact('name1','name2','time'));

    }
    public function laravel_foreach(){
        $data = DB::select('select * from member order by id asc');
        return view('laravel_foreach',['data'=>$data]);
    }
    public function if_else(){
        // 1~7 星期一到星期日
        $day = date('N',time());
        return view('if_else',compact('day'));
    }

    public function templatePage(){
        return view('template.template');
    }
    public function sonPage(){
        return view('son.son');
    }
}
