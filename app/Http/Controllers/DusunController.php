<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    //index halaman dusun
    public function index()
    {
        //1. query (select/get)
        // $dusun = Dusun::all(); //select * from dusun
        $dusun = Dusun::with('dusunDetail')->get(); //select * from dusun

        //2. mengirim data ke view (compact())

        //3. view akan meng consume data

        return view('pages.master.dusun.index', compact('dusun'));
    }
    public function detail()
    {

        return view('pages.master.dusun.detail', compact('detail'));
    }
}
