<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $super_admin = [
            'name' => 'Hoang Do',
            'email' => 'panda_core_super_admin@gmail.com',
            'password' => 'Hoangdo@123',
            'role' => 1
        ];
        DB::table('users')->truncate();
        $fake_user = [$super_admin];
        for ($i = 0; $i < 100; $i++) {
            array_push($fake_user, [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make(Str::random(10)),
                'role' => rand(1,5)
            ]);
        }
        DB::table('users')->insert(
            $fake_user
        );
    }
}
