<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\about;
use Alert;
use Str;
use Facades\Support\store;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::all();
        return view('back.about.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about = About::all();
        return view('back.about.create', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $data = About::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->file('image')->store('about'),
        ]);
        Alert::success('success', 'berhasil disimpan');
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = about::find($id);
        return view('back.about.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (empty($request->file('image'))) {
            $menu = about::find($id);
            $menu->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            Alert::success('success', 'Data Hass been Update');
            return redirect()->route('about.index');
        } else {
            $menu = about::find($id);
            // storage::delete('gambar_artikel');
            $menu->update([
                'title' => $request->title,
                'intro' => $request->intro,

                'image' => $request->file('image')->store('about'),
            ]);
            Alert::success('success', 'Data Has Been Update');
            return redirect()->route('about.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
