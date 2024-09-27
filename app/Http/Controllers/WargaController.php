<?php

namespace App\Http\Controllers;

use App\Models\DusunDetail;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    // View Index Warga
    public function index()
    {
        $warga = Warga::with('dusunDetail')->get();

        return view('pages.master.warga.index', compact('warga'));
    }

    // Detail Warga
    public function detail($id)
    {

        $warga = Warga::with('dusunDetail')->find($id);

        // Menghitung umur berdasarkan tanggal lahir
        $umur = Carbon::parse($warga->tgl_lahir)->age;

        // dd($warga->tgl_lahir);

        return view('pages.master.warga.detail', compact('warga', 'umur'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:120|regex:/^[a-zA-Z\s]*$/',
            'dusun' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048',
            'tgl_lahir' => 'required',
        ], [
            'name.required' => 'Nama warga wajib diisi!',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'dusun.required' => 'Pilih dusun warga',
            'foto.mimes' => 'Format foto yang diperbolehkan hanya jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran file maksimal 2MB.',
            'tgl_lahir.required' => 'Tanggal lahir warga wajib diisi!',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('foto')) {

            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('foto')->storeAs('public/warga', $filenameSimpan);
        } else { // setup default foto
            $filenameSimpan = 'default_image.jpg';
        }



        Warga::create([
            "dusun_id" => $request->dusun,
            "name" => $request->name,
            "foto" => $filenameSimpan,
            "tgl_lahir" => $request->tgl_lahir,
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

        $dusunDetail = DusunDetail::orderBy('dusun_id', 'asc')->get();

        // Rusak
        $warga = Warga::find($id);

        return view('pages.master.warga.edit', compact('warga', 'dusunDetail'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:120|regex:/^[a-zA-Z\s]*$/',
            'dusun' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048',
            'tgl_lahir' => 'required',
        ], [
            'name.required' => 'Nama warga wajib diisi!',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'dusun.required' => 'Pilih dusun warga',
            'foto.mimes' => 'Format foto yang diperbolehkan hanya jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran file maksimal 2MB.',
            'tgl_lahir.required' => 'Tanggal lahir warga wajib diisi!',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $warga = Warga::find($id);

        if ($request->hasFile('foto')) {

            if ($warga->foto != 'default_image.jpg') {
                Storage::delete('public/warga/' . $warga->foto);
            }

            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('foto')->storeAs('public/warga', $filenameSimpan);
        } else {
            $filenameSimpan = $warga->foto;
        }

        Warga::find($id)->update([
            "dusun_id" => $request->dusun,
            "name" => $request->name,
            "foto" => $filenameSimpan,
            "tgl_lahir" => $request->tgl_lahir,

        ]);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil di update.');
    }
}
