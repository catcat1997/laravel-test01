<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comment')->insert([
            [
                'comment'=>'好好看啊!',
                'article_id'=> rand(1,3)
            ],
            [
                'comment'=>'不看啊!',
                'article_id'=> rand(1,3)
            ],
            [
                'comment'=>'作者有問題',
                'article_id'=> rand(1,3)
            ],
            [
                'comment'=>'文章文筆好!',
                'article_id'=> rand(1,3)
            ],
            [
                'comment'=>'好一個春秋蟬!',
                'article_id'=> rand(1,3)
            ],
            [
                'comment'=>'在暗示什麼[doge]',
                'article_id'=> rand(1,3)
            ],
        ]);
    }
}
