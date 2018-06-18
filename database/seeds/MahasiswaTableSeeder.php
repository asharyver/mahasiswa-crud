<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate (clear) table
        DB::table('mahasiswa')->truncate();

        // Make seed
        factory(App\Mahasiswa::class, 100)->create();
    }
}
