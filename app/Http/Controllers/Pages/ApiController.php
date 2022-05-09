<?php

namespace App\Http\Controllers\Pages;

use App\Grade;
use App\Http\Controllers\Controller;
use App\Participant;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getParticipant(Request $r)
    {
        $s = Participant::orderBy('id', 'desc');

        if ($r->q) {
            $s = $s->where('name', 'LIKE', '%' . $r->q . '%');
        }
        $s = $s->get();

        return response()->json($s);
    }
}
