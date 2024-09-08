<?php

namespace App\Http\Controllers;

use App\Models\DusunDetail;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    //
    public function index()
    {
        $warga = Warga::with('dusunDetail')->get();

        return view('pages.master.warga.index', compact('warga'));
    }

    public function add()
    {
        $dusunDetail = DusunDetail::get();
        return $dusunDetail;
        return view('pages.master.warga.add', compact('dusunDetail'));
    }
    public function store() {}
}
