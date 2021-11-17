<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleAndAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article')->insert([
            [
                'article_name'=> '文章A',
                'author_id' => rand(1,3),
            ],
            [
                'article_name'=> '文章B',
                'author_id' => rand(1,3),
            ],
            [
                'article_name'=> '文章C',
                'author_id' => rand(1,3),
            ],
        ]);
        DB::table('author')->insert([
            [
                'author_name' => '方源'
            ],
            [
                'author_name' => '巨陽'
            ],
            [
                'author_name' => '星宿'
            ],
        ]);
        
    }
}
