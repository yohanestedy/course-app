<?php

namespace App\Http\Controllers;

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
}
