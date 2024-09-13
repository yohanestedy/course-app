<?php

namespace App\Http\Controllers;

use App\Models\DusunDetail;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // View Index Warga
    public function index()
    {
        $warga = Warga::with('dusunDetail')->get();

        return view('pages.master.warga.index', compact('warga'));
    }

    // Add Warga
    public function add()
    {
        $dusunDetail = DusunDetail::get();
        // Ordering = untuk mengurutkan data
        // - asc = Ascending = mengurutkan dari yg pertama ke terakhir
        // - desc = Descending = kebalikan dari asc
        $dusunDetail = DusunDetail::orderBy('dusun_id', 'asc')->get();

        return view('pages.master.warga.add', compact('dusunDetail'));
    }
    // Add Warga Store
    public function store(Request $request)
    {
        Warga::create([
            "dusun_id" => $request->dusun,
            "name" => $request->name,
            "foto" => $request->foto,
            "age" => $request->age,
        ]);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil di simpan.');
    }

    // Delete Warga
    public function delete($id)
    {
        Warga::find($id)->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }

    // Update Data Warga
    public function edit($id)
    {
        $dusunWarga = DusunDetail::where('dusun_id', $id)->first();
        // $dusunWarga = Warga::find($id)->with('dusunDetail')->first();

        $dusunDetail = DusunDetail::orderBy('dusun_id', 'asc')->get();

        // Rusak
        // $warga = Warga::find($id)->first();

        $warga = Warga::where('id', $id)->first();

        return $dusunWarga;

        return view('pages.master.warga.edit', compact('warga', 'dusunDetail', 'dusunWarga'));
    }

    public function update(Request $request, $id)
    {

        Warga::find($id)->update([
            "dusun_id" => $request->dusun,
            "name" => $request->name,
            "foto" => $request->foto,
            "age" => $request->age,

        ]);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil di update.');
    }
}
