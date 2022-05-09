<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            'program_id' => 1,
            'name' => 'Yoga',
            'sekolah' => 'Udacoding Academy',
            'angkatan' => 'Batch 1',
        ]);
        DB::table('participants')->insert([
            'program_id' => 2,
            'name' => 'uda',
            'email' => 'uda@gmail.com',
            'sekolah' => 'Udacoding Academy',
            'angkatan' => 'Batch ',
        ]);
        // DB::table('participants')->insert([
        //     'program_id' => 1,
        //     'name' => 'Yoga',
        //     'sekolah' => 'Udacoding Academy',
        //     'angkatan' => 'Batch 1',
        // ]);
        // DB::table('participants')->insert([
        //     'program_id' => 1,
        //     'name' => 'Yoga',
        //     'sekolah' => 'Udacoding Academy',
        //     'angkatan' => 'Batch 1',
        // ]);
    }
}
