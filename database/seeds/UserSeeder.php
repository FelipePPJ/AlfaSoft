<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Felipe Batista',
            'email' => 'felipe_batista@live.com',
            'password' => Hash::make('felipeba_alfasoft'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'updated_at' => now(),
            'created_at' => now()
        ]);
    }
}