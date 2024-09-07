<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga'; // merepresentasikan nama table
    protected $guarded = []; // merepresentasikan field table yg terlindungi atau tidak boleh di isi

    function dusunDetail()
    {
        return $this->hasOne(DusunDetail::class, 'dusun_id', 'dusun_id');
    }
}
