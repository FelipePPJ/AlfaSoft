<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) {

            DB::table('contacts')->insert([
                'name' => $faker->name(),
                'email' => $faker->safeEmail,
                'contact' => mt_rand(900000000, 999999999),
                'updated_at' => now(),
                'created_at' => now()
            ]);

        }
    }
}
