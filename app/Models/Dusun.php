<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;
    protected $table = 'dusun'; // merepresentasikan nama table
    protected $guarded = []; // merepresentasikan field table yg terlindungi atau tidak boleh di isi

    // case relasi ke DusunDetail (ambil)
    // kita butuh data detail dari dusun, sedangkan table dusun ini hanya pnya id
    function dusunDetail(){
        $this->hasOne(DusunDetail::class, 'dusun_id', 'id');
    }

    // output adalah data dari dusun dan dusun detail akan di keluarkan

    function getRelasiWarga(){
        $this->hasMany(Warga::class, 'dusun_id', 'id');
    }
}
