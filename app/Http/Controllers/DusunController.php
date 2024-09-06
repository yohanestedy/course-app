<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\DusunDetail;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    // Halaman INDEX DUSUN
    public function index()
    {
        //1. query (select/get)
        // $dusun = Dusun::all(); //select * from dusun
        $dusun = Dusun::with('dusunDetail')->get(); //select * from dusun

        //2. mengirim data ke view (compact())

        //3. view akan meng consume data

        return view('pages.master.dusun.index', compact('dusun'));
    }

    // DETAIL DUSUN
    public function detail($id)
    {
        $dusunDetail = DusunDetail::where('dusun_id', $id)->first();

        return view('pages.master.dusun.detail', compact('dusunDetail'));
    }

    // VIEW TAMBAH DUSUN
    public function add()
    {

        return view('pages.master.dusun.add');
    }

    // TAMBAH DUSUN
    public function store(Request $request)
    {
        // insert to dusun
        $dusun = Dusun::create([]);

        // insert to dusun_detail
        DusunDetail::create([
            "dusun_id" => $dusun->id,
            "name" => $request->name,
            "description" => $request->description,
            "foto" => $request->foto,
        ]);

        return redirect()->route('dusun.index')->with('success', 'Data Berhasil di Simpan.');
    }

    // VIEW EDIT DUSUN
    public function edit($id)
    {
        $dusunDetail = DusunDetail::where('dusun_id', $id)->first();

        return view('pages.master.dusun.edit', compact('dusunDetail'));
    }

    // EDIT DUSUN
    public function update(Request $request, $id)
    {
        // $dusunDetail = DusunDetail::where('dusun_id', $id)->firstOrFail();


        // $dusunDetail->name = $request->input('name');
        // $dusunDetail->description = $request->input('description');
        // $dusunDetail->foto = $request->input('foto');
        // $dusunDetail->save();

        // Versi Wahyu
        DusunDetail::where('dusun_id', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "foto" => $request->foto,
        ]);

        // return $dusunDetail;
        return redirect()->route('dusun.index')->with('success', 'Data Berhasil di Update.');
    }


    // HAPUS DUSUN DAN DUSUN DETAIL
    public function delete($id)
    {
        // Hapus semua data terkait di tabel `dusun_detail`
        DusunDetail::where('dusun_id', $id)->delete();

        // Hapus dusun setelah menghapus data terkait
        Dusun::findOrFail($id)->delete();

        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil dihapus.');
    }
}
