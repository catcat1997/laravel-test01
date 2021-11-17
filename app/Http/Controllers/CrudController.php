<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CrudController extends Controller
{
    //
    public function select($id = 0){
        // $result = DB::select('select * from member where id = ?',[1]);

        //使用命名綁定 :bind
        $result = DB::select('select * from member where id = :id', ['id' => $id]);
        echo '<pre>';
        print_r($result);
        
    }
    public function selectAll(){
        $result = DB::select('select * from member order by id asc');
        echo '<pre>';
        
        foreach($result as $each){
            echo $each->id . '<br>';
            echo $each->name . '<br>';
            echo $each->age . '<br>';
            echo $each->email . '<br>';
            echo '<hr>';
        }
    }

    public function add(){
        $added = DB::insert('insert into member values (?,?,?,?)', [null,'mary',30,'mary123@gmail.com']);
        echo 'added' . $added . 'row';
        // DB::statement 可以執行任何SQL語句, 但沒有返回值。
        DB::statement('insert into member values (?,?,?,?)', [null,'mary',30,'mary123@gmail.com']);
    }

    public function delete($id = 3){
        $deleted = DB::delete('delete from member where id= ?',[$id]);
        echo 'affected' . $deleted . 'row';
    }

    public function update(){
        $affected = DB::update("update member set name = 'new_mary' where name = ?",['mary']);
        echo 'affected' . $affected . 'row';
    }



    // 執行普通語句 DB::statement  可以執行任何SQL語句, 但沒有返回值
    public function dropTable(){
        DB::statement('drop table users');
    }
}
