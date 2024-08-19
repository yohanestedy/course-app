<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        // return "Hello World";
        $result = self::helperGetDataWarga();
        return $result;

        // return view('hello.index');
    }

    private function helperGetDataWarga(){
        $dataWarga = [
            [
            "id" => 1,
            "name" => "Yoga"
            ],
            [
            "id" => 2,
            "name" => "Bobo"
            ],
            [
            "id" => 1,
            "name" => "ANi"
            ]
        ];
        return $dataWarga;
    }
}
