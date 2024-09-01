<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DusunDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dusun_detail')->insert([
            [
                'dusun_id' => 1,
                'name' => 'Dusun A',
                'description' => 'Description for Dusun A',
                'foto' => 'foto_a.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 2,
                'name' => 'Dusun B',
                'description' => 'Description for Dusun B',
                'foto' => 'foto_b.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 3,
                'name' => 'Dusun C',
                'description' => 'Description for Dusun C',
                'foto' => 'foto_c.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 4,
                'name' => 'Dusun D',
                'description' => 'Description for Dusun D',
                'foto' => 'foto_d.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 5,
                'name' => 'Dusun E',
                'description' => 'Description for Dusun E',
                'foto' => 'foto_e.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 6,
                'name' => 'Dusun F',
                'description' => 'Description for Dusun F',
                'foto' => 'foto_f.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 7,
                'name' => 'Dusun G',
                'description' => 'Description for Dusun G',
                'foto' => 'foto_g.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 8,
                'name' => 'Dusun H',
                'description' => 'Description for Dusun H',
                'foto' => 'foto_h.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 9,
                'name' => 'Dusun I',
                'description' => 'Description for Dusun I',
                'foto' => 'foto_i.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'dusun_id' => 10,
                'name' => 'Dusun J',
                'description' => 'Description for Dusun J',
                'foto' => 'foto_j.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
