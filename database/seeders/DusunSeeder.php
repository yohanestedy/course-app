<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dusunData = [
            ['id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 8, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 9, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($dusunData as $data) {
            // Cek apakah id sudah ada di tabel dusun
            if (!DB::table('dusun')->where('id', $data['id'])->exists()) {
                DB::table('dusun')->insert($data);
            }
        }
    }
}
