<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\NullsafeMethodCall;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 插入數據
        $datas = [
            [
                'id' => null,
                'paper_name' => 'paper_A1',
                'start_time' => strtotime('+7 days'),
                'duration'=> 120, 
            ],
            [
                'id' => null,
                'paper_name' => 'paper_B1',
                'start_time' => strtotime('+10 days'),
                'duration'=> 120, 
            ],
            [
                'id' => null,
                'paper_name' => 'paper_C1',
                'start_time' => strtotime('+5 days'),
                'duration'=> 120, 
            ],
            
        ];
        DB::table('paper')->insert($datas);
    }
}
