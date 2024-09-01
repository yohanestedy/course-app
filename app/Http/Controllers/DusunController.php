<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\DusunDetail;
use Illuminate\Http\Request;

class DusunController extends Controller
{
    // Halaman Index Dusun
    public function index()
    {
        //1. query (select/get)
        // $dusun = Dusun::all(); //select * from dusun
        $dusun = Dusun::with('dusunDetail')->get(); //select * from dusun

        //2. mengirim data ke view (compact())

        //3. view akan meng consume data

        return view('pages.master.dusun.index', compact('dusun'));
    }

    // Halaman Detail Dusun
    public function detail($id)
    {
        // Mengambil data dusun_detail berdasarkan dusun_id
        $dusunDetail = DusunDetail::where('dusun_id', $id)->first();



        // Mengembalikan view dengan data yang diambil menggunakan compact
        return view('pages.master.dusun.detail', compact('dusunDetail'));
    }

    // Delete Dusun
    // public function delete($id)
    // {
    //     // Mencari dusun berdasarkan ID
    //     $dusun = Dusun::find($id);

    //     if ($dusun) {
    //         // Menghapus data dusun
    //         $dusun->delete();

    //         // Mengembalikan respon sukses
    //         return response()->json(['message' => 'Dusun berhasil dihapus'], 200);
    //     } else {
    //         // Mengembalikan respon jika dusun tidak ditemukan
    //         return response()->json(['message' => 'Dusun tidak ditemukan'], 404);
    //     }
    // }

    public function delete($id)
    {
        // Hapus semua data terkait di tabel `dusun_detail`
        DusunDetail::where('dusun_id', $id)->delete();

        // Hapus dusun setelah menghapus data terkait
        Dusun::findOrFail($id)->delete();

        return redirect()->route('dusun.index')->with('success', 'Dusun berhasil dihapus.');
    }
}
