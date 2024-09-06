<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DusunDetail extends Model
{
    use HasFactory;
    protected $table = 'dusun_detail'; // merepresentasikan nama table
    protected $guarded = []; // merepresentasikan field table yg terlindungi atau tidak boleh di isi

    // Menetapkan dusun_id sebagai primary key
    protected $primaryKey = 'dusun_id';

    // Jika dusun_id bukan auto-incrementing
    public $incrementing = false;

    // select dusun_detail where dusun_id = 1
    function dusun()
    {
        $this->hasOne(Dusun::class, 'id', 'dusun_id');
    }
}
