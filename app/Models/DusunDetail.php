<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DusunDetail extends Model
{
    use HasFactory;

    // select dusun_detail where dusun_id = 1
    function dusunDetail(){
        $this->hasOne(Dusun::class, 'id', 'dusun_id');
    }

    
}
