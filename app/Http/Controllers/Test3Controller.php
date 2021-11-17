<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test3Controller extends Controller
{
    //
    public function test3(){
        
        return redirect()->route('test3');
    }
}
