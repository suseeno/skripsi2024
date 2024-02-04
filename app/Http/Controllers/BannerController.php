<?php

namespace App\Http\Controllers;
use App\Models\banner;

use Str;
use Alert;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view('back.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banner = Banner::all();
        return view('back.banner.create', compact('banner'));
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
            'intro' => 'required',
            //  'image' => 'required',
        ]);
        if (!empty($request->file('image'))) {
            $data = $request->all();
            $data['is_active'] = $request->is_active;
            $data['image'] = $request->file('image')->store('banner');
        }
        banner::create($data);
        Alert::success('success', 'berhasil di tambahkan');
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = banner::find($id);
        return view('back.banner.edit', compact('master'));
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
            $menu = banner::find($id);
            $menu->update([
                'title' => $request->title,
                'intro' => $request->intro,
                'is_active' => $request->is_active,
            ]);
            Alert::success('success', 'Data Hass been Update');
            return redirect()->route('banner.index');
        } else {
            $menu = banner::find($id);
            // storage::delete('gambar_artikel');
            $menu->update([
                'title' => $request->title,
                'intro' => $request->intro,
                'is_active' => $request->is_active,

                'image' => $request->file('image')->store('banner'),
            ]);
            Alert::success('success', 'Data Has Been Update');
            return redirect()->route('banner.index');
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
        $banner = banner::find($id);

        $banner->delete();
        Alert::success('success', 'has ben successfuly');
        return redirect()->route('banner.index');
    }
}
