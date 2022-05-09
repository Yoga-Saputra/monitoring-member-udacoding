<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $data['list'] = 'List Slider';
        $sliders = Slider::orderBy('id', 'desc')->get();
        // dd($sliders);
        return view('pages.slider.index', $data, compact('sliders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bg'   => '|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $background = new Slider;
        if ($request->hasFile('bg')) {
            $file = $request->file('bg');
            /* @unlink(public_path('storage/app/user_pic/'.$user_pic->picture) ); */
            $name = $file->getClientOriginalName();
            $filename = $name;
            $file->move(public_path('storage/app/bg'), $filename);
            $background->bg   = $filename;
        } else {
            return $request;
            $background->bg = '';
        }
        $background->save();
        return redirect(route('slider'))->with('success', 'You have successfully Uploud picture');
    }

    public function edit($id)
    {
        $data['list'] = 'Edit Slider';
        $slider = Slider::findOrFail($id);
        if ($slider == null) {
            abort(404);
        }
        return view('pages.slider.edit', $data, compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $background = Slider::findorFail($id);
        $this->validate($request, [
            'bg'   => '|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        if ($request->hasFile('bg')) {
            $image = $request->file('bg');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('storage/app/bg'), $filename);
            $background->bg = $request->file('bg')->getClientOriginalName();
        }
        $background->update();
        return redirect(route('slider'))->with('sukses', 'Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        if ($slider == null) {
            abort(404);
        }
        return redirect(route('slider'))->with(['success' =>  'List Slider : ' . $slider->nama_program . ' Dihapus']);
    }
}
