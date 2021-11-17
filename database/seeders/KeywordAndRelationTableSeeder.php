<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordAndRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('keyword')->insert([
            [
                'keyword' =>'半價'
            ],
            [
                'keyword' =>'免費'
            ],
            [
                'keyword' =>'以物換物'
            ],
            [
                'keyword' =>'我的朋友'
            ],
            [
                'keyword' =>'熱門'
            ],
            
        ]);
        DB::table('relation')->insert([
        ['article_id'=> rand(1,3),
            'key_id'=> rand(1,5)
        ],
        ['article_id'=> rand(1,3),
            'key_id'=> rand(1,5)
        ],
        ['article_id'=> rand(1,3),
            'key_id'=> rand(1,5)
        ],
        ['article_id'=> rand(1,3),
            'key_id'=> rand(1,5)
        ],
        ['article_id'=> rand(1,3),
            'key_id'=> rand(1,5)
        ],
        ]);
    }
}
