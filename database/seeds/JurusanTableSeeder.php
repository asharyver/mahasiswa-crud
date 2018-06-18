<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate (clear) table
        DB::table('jurusan')->truncate();
        
        $major = [
            'Teknik Informatika',
            'Sistem Informasi',
            'Teknik Mesin',
            'Teknik Nuklir',
            'Teknik Perminyakan',
            'Teknik Pertambangan',
            'Teknik Sipil',
            'Farmasi',
            'Meteorologi',
            'Teknologi Hasil Perikanan'];
        
        $data = [];
        foreach ($major as $val) {
            $data[] = [
                'name' => $val,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        
        DB::table('jurusan')->insert($data);
    }
}
