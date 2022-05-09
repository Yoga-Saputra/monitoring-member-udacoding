<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Participant;
use App\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index()
    {
        $data['list'] = 'List Portofolio';
        $portofolios = Portofolio::orderBy('id', 'desc')->get();
        return view('pages.portofolio.index', $data, compact('portofolios'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'link' => 'required|string|max:50'
        ]);
        try {
            $portofolios = Portofolio::firstOrcreate([
                'link' => $request->link
            ]);
            if ($portofolios == null) {
                abort(404);
            }
            return redirect()->back()->with(['success' => 'portofolio: '  . $portofolios->link . '  Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    //jika gagal, redirect ke form yang sama lalu membuat flash message error

    public function edit($id)
    {
        $data['list'] = 'Edit Portofolio';
        $portofolio = Portofolio::findOrFail($id);
        if ($portofolio == null) {
            abort(404);
        }
        return view('pages.portofolio.edit', $data, compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'link' => 'required|string|max:50'
        ]);
        try {
            $portofolios = Portofolio::findOrFail($id);
            $portofolios->update([
                'link' => $request->link
            ]);
            if ($portofolios == null) {
                abort(404);
            }
            return redirect(route('portofolio'))->with(['success' =>  'List Portofolio : ' . $portofolios->link . ' Diperbaharui']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $portofolios = Portofolio::findOrFail($id);
        $portofolios->delete();
        if ($portofolios == null) {
            abort(404);
        }
        return redirect(route('portofolio'))->with(['success' =>  'List Portofolio : ' . $portofolios->link . ' Dihapus']);
    }
}
