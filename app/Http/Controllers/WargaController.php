<?php

namespace App\Http\Controllers;

use App\Models\DusunDetail;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:120|regex:/^[a-zA-Z\s]*$/',
            'dusun' => 'required',
            'foto' => 'required',
            'age' => 'required|numeric',
        ], [
            'name.required' => 'Nama warga wajib diisi!',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'dusun.required' => 'Pilih dusun warga',
            'foto.required' => 'Upload foto warga',
            'age.required' => 'Umur warga wajib diisi!',
            'age.numeric' => 'Umur warga harus berupa angka!',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

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
        $warga = Warga::find($id);

        // $warga = Warga::where('id', $id)->first();

        // return $dusunWarga;

        return view('pages.master.warga.edit', compact('warga', 'dusunDetail', 'dusunWarga'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:120|regex:/^[a-zA-Z\s]*$/',
            'dusun' => 'required',
            'foto' => 'required',
            'age' => 'required|numeric',
        ], [
            'name.required' => 'Nama warga wajib diisi!',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'dusun.required' => 'Pilih dusun warga',
            'foto.required' => 'Upload foto warga',
            'age.required' => 'Umur warga wajib diisi!',
            'age.numeric' => 'Umur warga harus berupa angka!',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Warga::find($id)->update([
            "dusun_id" => $request->dusun,
            "name" => $request->name,
            "foto" => $request->foto,
            "age" => $request->age,

        ]);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil di update.');
    }
}
