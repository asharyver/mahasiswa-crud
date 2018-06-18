<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate (clear) table
        DB::table('users')->truncate();

        // Insert Main User
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // Make seed
        factory(App\User::class, 100)->create();
    }
}
