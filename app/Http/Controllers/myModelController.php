<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 引入myModel模型
use App\Models\home\myModel;

class myModelController extends Controller
{
    //
    // 調用myModel模型的控制器方法

    // 當調用 save 方法時，將會插入一條新記錄。
    public function myModel_add(Request $request){
        
        // 實例化myModel模型 (插入新數據一定要用實例化)
        $member = new myModel;
        
        // 這裡我們不想寫表單去接收數據, 就直接給$request接收的數據賦值
        $request->name = 'peter';
        $request->age = 30;
        $request->email = 'myModel_add_testing@gamil.com';

        // 接收請求的對應數據 放到$member對應字段
        // $member->id = $request->id; //id不需要, 因為是auto_increment
        $member->name = $request->name;
        $member->age = $request->age;
        $member->email = $request->email;

        $member->save();
    }

    public function myModel_update(Request $request){
        // save 方法也可以用來更新數據庫已經存在的模型。更新模型，你需要先檢索出來，設置要更新的屬性，然後調用 save 方法。

        // 實例化myModel
        // $member = new myModel;
        // 調用靜態方法, 不實例化
        // $member = myModel::find(10);

        // 這裡我們不想寫表單去接收數據, 就直接給$request接收的數據賦值
        $request->id = 11;
        $request->name = 'mary_Model';
        $request->age = 99;
        $request->email = 'myModel_update_testing@gmail.com';
        
        // find()方法 找到想update的對應id 想update數據一定要用find()方法 參數為主鍵

        // 調用靜態方法, 不實例化
        // $member = myModel::find($request->id)->toArray();  可以使用toArray數組化
        $member = myModel::find($request->id);
        $member->name = $request->name;
        $member->age = $request->age;
        $member->email = $request->email;
        $member->save();
    }
    public function myModel_update_multi(){
        // 調用靜態方法, 不實例化
        myModel::where('name', 'mary_Model')
          ->where('age', 99)
          ->update(['age' => 80, 'name'=>'mary_update_multi']);
    }

    public function myModel_temp(){
        myModel::create(['id'=> null,'name'=>'test','age'=>44,'email'=>'testing@test.com']);
        

    }
    public function myModel_delete(){
        // 刪除模型 delete方法
        $terget = myModel::find(12);
        $target = myModel::where('name','new_mary');
        $target->delete();  
        // delete鏈式寫法:
        myModel::where('id',13)->delete();
        // 通過主鍵刪除模型 destroy(主鍵)
        myModel::destroy(16);
    
    }
    public function myModel_select(){
        $datas = myModel::where('name','peter')->get();
        echo 'id&emsp;name&emsp;age&emsp;email <br>';
        foreach($datas as $data){
            echo $data->id . '&emsp;';
            echo $data->name . '&emsp;';
            echo $data->age . '&emsp;';
            echo $data->email . '&emsp;';
            echo '<br>';
        }
    }
    public function myModel_selectAll(){
        $datas = myModel::select('*')->orderBy('id','asc')->get();
        echo 'id&emsp;name&emsp;age&emsp;email <br>';
        foreach($datas as $data){
            echo $data->id . '&emsp;';
            echo $data->name . '&emsp;';
            echo $data->age . '&emsp;';
            echo $data->email . '&emsp;';
            echo '<br>';
        }
    }

}
