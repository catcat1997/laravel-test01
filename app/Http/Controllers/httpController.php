<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class httpController extends Controller
{
    /*
     * 存儲一個新用戶
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id,$page)
    {
        echo '<pre>';
        echo 'id: ' . $id;
        echo '<hr>';
        // all方法
        // $input = $request->all();
        // echo '<pre>';
        // var_dump($input);
        // dd($input);
        
        // input方法
        // echo $name = $request->input('name','default_name');
        // echo '<br>';
        // echo $age = $request->input('age','999');
        
        // query方法 (不會取得post數據? body)
        // echo $name = $request->query('name','default_name');
        // echo '<br>';
        // echo $age = $request->query('age','999');

        // 通過動態屬性獲取輸入
        echo $name = $request->name;

        // 獲取部分輸入數據
        // $input = $request->only(['username', 'password']);
        // var_dump($input);
        // $input = $request->only('username', 'password');
        // var_dump($input);
        // $input = $request->except(['credit_card']);
        // var_dump($input);
        // $input = $request->except('credit_card');
        // var_dump($input);
        // $input = $request->only('credit_card');
        // var_dump($input);
        
        // 判斷輸入值是否存在 has

        if ($request->has('name')) {
            echo 'yes';
        }else {
            echo 'no';
        }
        echo '<br>';
        if ($request->has(['name', 'email'])) {
            echo 'all yes';
        }else {
            echo 'all no';
        }
        echo '<br>';
        // hasAny 方法將會在指定的值有一個存在的情況下返回 true
        if ($request->hasAny(['name', 'email'])) {
            echo 'hasAny yes';
        }else {
            echo 'hasAny no';
        }
        echo '<br>';
        // filled判斷一個值在請求中是否存在，並且不為空
        if ($request->filled('name')) {
            echo 'filled yes';
        }else {
            echo 'filled no';
        }
        echo '<br>';
        // missing判斷一個值在請求中是否缺失

        if ($request->missing('name')) {
            echo 'missing yes';
        }else {
            echo 'missing no';
        }
        echo '<br>';
        
    }
}
