<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'level'  => 'admin',
            'email' => 'admin@gmail.com',
            'password'  => Hash::make('admin')
        ]);
        // $user = User::create([
        //     'name' => 'peserta',
        //     'level'  => 'peserta',
        //     'email' => 'peserta@gmail.com',
        //     'password'  => Hash::make('peserta')
        // ]);
    }
}
