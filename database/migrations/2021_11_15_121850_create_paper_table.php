<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void  
     */
    public function up()  // up方法 (向數據庫中添加新的表或列或索引)
    {
        Schema::create('paper', function (Blueprint $table) {
            // $table->列類型方法(字段名,[長度/值範圍]) -> 列修飾方法([修飾的值]);

            // id 表主鍵,自增
            $table->increments('id');
            // paper_name 唯一 varchar(100) 不空
            $table->string('paper_name', 100)->nullable(false)->unique();
            // total_score 整型 tinyint 默認為100
            $table->tinyInteger('total_score')->default(100);
            // start_time 時間戳類型(int)
            $table->integer('start_time')->nullable();
            // duration 單位分鍾 (整型int)
            $table->tinyInteger('duration');
            // status  1為啟用,2為禁用
            $table->tinyInteger('status')->default(1);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() // down方法 刪除數據表
    {
        Schema::dropIfExists('paper');
    }
}
