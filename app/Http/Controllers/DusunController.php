<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Dusun;
use App\Models\Warga;
use App\Models\DusunDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        // return $dusun;

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
        $validator = Validator::make($request->all(), [
            'name'          => 'required|min:3',
            'description'   => 'required',
            'foto'          => 'mimes:jpg,jpeg,png|max:2048'
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.min' => 'Nama tidak boleh kurang dari 3 karakter.',
            'description.required' => 'Deskripsi wajib diisi!',
            'foto.mimes' => 'Format foto yang diperbolehkan hanya jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran file maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // cek dulu ada upload file ngga? jika ada kita harus lakukan manipulasi untuk mendapatkan file name dan juga store ke server
        if ($request->hasFile('foto')) {

            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();

            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('foto')->storeAs('public/dusun', $filenameSimpan);
        } else { // setup default foto
            $filenameSimpan = 'default_image.jpg';
        }

        // insert to dusun
        $dusun = Dusun::create([]);

        // insert to dusun_detail
        DusunDetail::create([
            "dusun_id" => $dusun->id,
            "name" => $request->name,
            "description" => $request->description,
            "foto" => $filenameSimpan,
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
        $validator = Validator::make($request->all(), [
            'name'          => 'required|min:3',
            'description'   => 'required',
            'foto'          => 'mimes:jpg,jpeg,png|max:2048'
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.min' => 'Nama tidak boleh kurang dari 3 karakter.',
            'description.required' => 'Deskripsi wajib diisi!',
            'foto.mimes' => 'Format foto yang diperbolehkan hanya jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran file maksimal 2MB.',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        $dusun = DusunDetail::where('dusun_id', $id)->first();

        // apakah ada data file yg di upload?
        if ($request->hasFile('foto')) {
            // hapus foto lama yg bukan default img
            if ($dusun->foto != 'default_image.jpg') {
                Storage::delete('public/dusun' . $dusun->foto);
            }

            // upload new image
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();

            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('foto')->storeAs('public/dusun', $filenameSimpan);
        } else {
            $filenameSimpan = $dusun->foto;
        }


        // Versi Wahyu
        DusunDetail::where('dusun_id', $id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "foto" => $filenameSimpan,
        ]);

        // return $dusunDetail;
        return redirect()->route('dusun.index')->with('success', 'Data Berhasil di Update.');
    }


    // HAPUS DUSUN DAN DUSUN DETAIL
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            // Cek apakah ada warga yang masih terkait dengan dusun ini
            $relatedWargaCount = Warga::where('dusun_id', $id)->count();

            if ($relatedWargaCount > 0) {
                // Jika masih ada warga yang terkait, batalkan penghapusan dan berikan pesan error
                return redirect()->route('dusun.index')->with('error', 'Tidak boleh menghapus Dusun karena ada data Warga');
            }

            // Hapus foto dari server
            $dusun = DusunDetail::where('dusun_id', $id)->first();
            if ($dusun->foto != 'default_image.jpg') {
                Storage::delete('public/dusun' . $dusun->foto);
            }

            // Hapus semua data terkait di tabel `dusun_detail`
            DusunDetail::where('dusun_id', $id)->delete();

            // Hapus dusun setelah menghapus data terkait
            Dusun::findOrFail($id)->delete();

            DB::commit();
            return redirect()->route('dusun.index')->with('success', 'Dusun berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('dusun.index')->with('error', "Gagal menghapus data. Error: " . $th->getMessage());
        }
    }

    function startActivity()
    {
        try {
            // disini ada code yg melakukan aktifitas get ip address, get country, get range distance (km) dari server

            $distance = 100;
            return $distance;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
