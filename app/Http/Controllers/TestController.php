<?php

namespace App\Http\Controllers;

use App\Models\home\myModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\home\article;
use App\Models\home\author;
use App\Models\home\comment;

class TestController extends Controller
{
    // 我們這個控制跆用來輸出phpinfo
    public function test1(){
        
        return phpinfo();
    }
    
    // csrf
    // csrf 用於展示基礎表單 get
    public function csrf_postToReceive(){
        return view('csrf_postToReceive');
    }
    // csrf 處理請求 post
    public function csrf_receive(){
        return 'post請求提交成功!';
    }
    
    // 自動驗證 verify_form
    public function verify_form(Request $request){
      
        if($request->method() == 'POST'){
            // 自動驗證  驗證對象就是第一參數 $request
            $this->validate($request,[
                'name'=> 'Required|Min:2|Max:20',
                'age'=>'Required|Integer|Min:1|Max:200',
                'email'=>'Required|Email',
                'captcha' => 'required|captcha'
            ]);
            // echo '<pre>';
            // print_r($request->all());
            echo 'success';
            // echo '<pre>';
            // print_r(request()->all());

            // mews captcha
            // $rules = ['captcha' => 'required|captcha'];
            // $validator = validator()->make(request()->all(), $rules);
            // if ($validator->fails()) {
            //     echo '<p style="color: #ff0000;">Incorrect!</p>';
            // } else {
            //     echo '<p style="color: #00ff30;">Matched :)</p>';
            // }
            
        }else{
            // 如果不是post 就是渲染表單視圖
            return view('verify_form');
        }
        
    }
    // 文件上傳操作 (avatar)
    public function upload_avatar(Request $request){
        // 判斷請求類型
        if($request->method() == 'POST'){
            if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
                // print_r($request->avatar);
                // print_r($request->avatar->path());  // file temp path
                // print_r($request->avatar->extension());
                // print_r($request->avatar->hashName());
                // print_r($request->avatar->getClientOriginalName());

                //  $path = $request->avatar->move('./images',strstr($request->avatar->getClientOriginalName(),'.',true)  . md5(time() . rand(100000,999999)). '.' .$request->avatar->extension());
                
                echo '<pre>';
                $uploadName = strstr($request->avatar->getClientOriginalName(),'.',true)  . md5(time() . rand(100000,999999)). '.' .$request->avatar->extension();
                // storeAs 會存到/storage/app下
                $path = $request->avatar->storeAs('./public/images',$uploadName);
                // 獲取全部數據
                $data = $request->all();
                $data['avatar'] = $uploadName;
                $result = myModel::create($data); 
                // 轉跳重定向
                if($result){
                    return redirect('/');
                }else {
                    return 'upload failed!';
                }
                
            }
        }else {
            // $i = 1000;
            // while(myModel::find($i) == null){
            //     $i -=1;
            // }
            // $target = myModel::find($i);
            // $images = asset('storage/images/' . $target->avatar);

            // 上一個用戶的頭像(id最大的用戶) 讀取storage/app/public/images文件
            $target = myModel::select('*')->orderBy('id','desc')->get();
            $images = asset('storage/images/' . $target[0]->avatar);
            return view('upload_avatar',['images'=>$images]);
        }
    }

    // 分頁member
    public function pagination(){
        // $datas = myModel::orderby('id','asc')->get();
        $datas = myModel::orderby('id', 'asc')->paginate(5);
        
        return view('pagination',compact('datas'));
    }

    // 響應方法
    // ajax1 頁面展示  (ajax1的頁面發送ajax請求到home/test/ajax2)
    public function ajax1(){
        return view('ajax1');
    }

    // ajax2 ajax的響應 (返回數據給home/test/ajax1)
    public function ajax2(){
        // 查詢數據
        // $data = myModel::all();   // all方法直接取得全部數據
        $data = myModel::select('*')->orderBy('id','asc')->get();
        $data2 = DB::select('select * from member where id = :id', ['id' => 35]);
        // json格式響應
        // return json_encode($data);
        return response()->json([$data,$data2]);
        
        // 
        // return true; // laravel中bool值是不能被直接通過return響應輸出的
        // return ['a'=>123]; //響應數組會自動轉換為 Object對象
        
    }

    // session會話控制
    public function session(Request $request){
        // 存儲一個session數據
        $request->session()->put('name','張三');

        // push session的值是數組類型
        // $request->session()->push('name2','張三');
        $request->session()->put('age','30');

        // 改session put
        $request->session()->put('name','張三2');
        // 通過laravel方法的session無法用原生php 的$_SESSION 獲取
        // session_start();
        // dd($_SESSION['name']);

        // session()->get()獲取session數據 第2參數是如果沒有對應的鍵, 就生成對應的鍵與值
        echo $request->session()->get('name','default');
        echo '<br>' . '<pre>';
        // session()->all()方法
        print_r($request->session()->all());

        echo '<br>' ;
        // session()->has()方法
        if($request->session()->has('age')){
            echo $request->session()->get('age');
        }
        echo '<br>' ;
        // session()->forget()方法
        $request->session()->forget('age');

        // session()->exists()方法
        if($request->session()->exists('age')){
            echo $request->session()->get('age');
        }else {
            echo 'null';
        }
        echo '<br>' ;
        // session()->flush()  清除所有session
        $request->session()->flush();

        print_r($request->session()->all());
    }

    // 緩存操作 cache
    public function cache(){
        //use Illuminate\Support\Facades\Cache; 記得引入cache類

        // 在緩存中存儲數據 put  更新
        // Cache::put('name','方源',10); // 10秒
        Cache::put('name','方源');
        Cache::put('age',500);
        // 設置緩存 只是在不存在時生成(同名時不添加)
        Cache::add('age',30); // 無效
        Cache::add('age2',30);  // 後面forget
        Cache::add('age3',300);
        // forever存儲緩存
        
        Cache::forever('ability','500year_memory');

        // 從緩存中獲取數據  
        $value1 = Cache::get('name');
        $value2 = Cache::get('abc', 'default');
        $value3 = Cache::get('age',0);
        
        echo $value1;
        echo '<br>';
        echo $value2;
        echo '<br>';
        echo $value3;
        echo '<br>';
        // 回調函數方法返回默認值
        $value4 = Cache::get('time',function(){
            return date('Y-m-d H:i:s',time());
        });
        echo $value4;
        echo '<br>';
        // has() 判斷是否存在
        if(Cache::has('name')){
            echo 'yes';
        }else{
            echo 'no';
        }
        echo '<br>';
        // 從緩存中刪除數據
        Cache::forget('age2');
        $value5 = Cache::get('age2','nothing');
        echo $value5;
        echo '<br>';
        // 你可以使用 flush 方法清空所有的緩存：
        // Cache::flush();

        // Cache 輔助函數
        $value6 = cache('age');
        echo $value6;
        echo '<br>';
        
        echo 'increment and decrement';
        echo '<br>';
        // cache 遞增與遞減值  increment , decrement  好多bug
        // Cache::forget('new_count');
        Cache::add('new_count',0,15);
        

        if(Cache::has('new_count')){ // increment與decrement 只跑第一次...
            Cache::increment('new_count',1); 
            Cache::increment('new_count',1);
            Cache::decrement('new_count',1);
            Cache::decrement('new_count',1);
            Cache::decrement('new_count',1);
            Cache::decrement('new_count',10);
        }
        
        $value8 = Cache::get('new_count','no');
        echo $value8;
        echo '<br>';

        // 獲取和存儲remember  (如果不存在,就存儲, 如果存在,就獲取)
        $value9 = Cache::remember('time2', 10, function () {
            return date('Y-m-d H:i:s', time());
        });
        echo $value9;
        // 你可以使用 rememberForever 方法從緩存中獲取數據或者永久存儲它：
        $value10 = Cache::rememberForever('forever_token', function () {
            return 'sdfxce46DFG454dzzz';
        });
        echo '<br>';
        echo $value10;
    }

    // 聯表查詢 (left_join)
    public function left_join(){
        // select t1.id,t1.article_name,t2.author_name from article as t1 left join author as t2 on t1.author_id = t2.id;
        $result = DB::table('article as t1')->
        select('t1.id','t1.article_name','t2.author_name')->
        leftJoin('author as t2','t1.author_id','t2.id')->
        get();
        dd($result);
        
    }

    // 關聯模型
    // use App\Models\home\article;
    // use App\Models\home\author;
    public function OneToOne(){
        // 查詢數據
        $datas  = article::get();
        // 循環編歷
        echo 'id' . '&emsp;' . 'article_name' . '&emsp;' . 'author_name' . '<br>';
        foreach($datas as $key => $value){
            // 原生獲取另一張表的數據 (無關聯模型下)
            // echo $value->id . '&emsp;&emsp;' . $value->article_name . '&emsp;&emsp;&emsp;' . 
            // author::find($value->author_id)->author_name . '<br>';
            // 定好關聯模型,就可以動態獲取
            echo $value->id . '&emsp;&emsp;' . $value->article_name . '&emsp;&emsp;&emsp;' . 
            $value->author->author_name . '<br>';
        }
    }
    public function OneToMany(){
        $datas = article::get();
        // 循環編歷
        echo 'id' . '&emsp;' . 'article_name' . '&emsp;' . 'author_name' . '&emsp;' . 'comment' .'<br>';
        
        foreach($datas as $key => $value){
            echo $value->id . '&emsp;&emsp;' . $value->article_name . '&emsp;&emsp;&emsp;' . 
            $value->author->author_name . '這文章的評論為:' . '<br>';

            // 原生寫法(無關聯模型下)
            // $comments = comment::where('article_id' , $value->id)->get();
            // foreach($comments as $v){
            //     echo $v->comment . '<br>';
            // }

            foreach($value->comment as $k => $v){  // comment.article_id 與 article.id關聯了
                // $value->comment會取得對應$value的article.id內的comment.comment(關聯了)
                // $value->comment 是數組 (有些文章一篇article有多個comment)
                echo $v->comment . '<br>';
            }
        }
    }
    public function ManyToMany(){
        $datas = article::get();

        foreach($datas as $key => $value){
            echo '當前文章名為: ' . $value->article_name . '其所用的關鍵詞為:' . '<br/>' ;
            foreach($value->keyword as $k => $v){
                echo $v->keyword . ' <br>';
            }
        };
    }
}


