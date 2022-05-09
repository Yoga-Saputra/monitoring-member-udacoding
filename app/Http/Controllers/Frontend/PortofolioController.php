<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $data['list'] = 'List Portofolio';
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        return view('frontend.master', $data, compact('portofolios'));
    }
}
