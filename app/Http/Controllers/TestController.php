<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function jokes(){
        $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
        echo $joke->value->joke;
    }
}
