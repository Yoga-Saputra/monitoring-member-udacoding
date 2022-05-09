<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        foreach(range(0,5) as $i ){
            DB::table('programs')->insert([
                'nama_program' => 'Web',
            ]);
            DB::table('programs')->insert([
                'nama_program' => 'Android',
            ]);
            DB::table('programs')->insert([
                'nama_program' => 'Ios',
            ]);
            DB::table('programs')->insert([
                'nama_program' => 'Flutter',
            ]);
            DB::table('programs')->insert([
                'nama_program' => 'Kotlin',
            ]);
            DB::table('programs')->insert([
                'nama_program' => 'UI Design',
            ]);
    }
}
