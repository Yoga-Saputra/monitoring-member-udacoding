<?php

namespace App\Imports;

use App\Participant;
use Maatwebsite\Excel\Concerns\Importable;
// use Maatwebsite\Excel\Concerns\SkipsErrors;
// use Maatwebsite\Excel\Concerns\SkipsOnError;
// use Maatwebsite\Excel\Concerns\SkipsOnFailure;
// use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithValidation;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ParticipantImport implements ToCollection,  WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $participant = Participant::create([
                'name'      => $row['nama'],
                'email'      =>  $row['email'],
                'no_tlp'     => $row['no_tlp'],
                'sekolah'   => $row['sekolah'],
                'angkatan' => $row['angkatan'],
                'program_id' => $row['program_id'],
            ]);
            $user = User::create([
                'name' => $participant->name,
                'level'  => 'peserta',
                'email' => strtolower(str_replace(' ', '_', $participant->name)) . '@gmail.com',
                'password' => bcrypt('123456'),
                'participant_id' => $participant->id
            ]);
        }
    }
    // public function rules(): array
    // {
    //     return [
    //         '*.email' => ['email', 'unique:participants,email']
    //     ];
    // }
}
