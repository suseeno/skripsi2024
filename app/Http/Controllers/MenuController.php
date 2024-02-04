<?php

namespace App\Http\Controllers;
use App\Models\CategoryMenu;
use App\Models\Dapur;
use App\Models\Menu;
use Str;
use Alert;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::all();

        return view('back.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = CategoryMenu::all();

        return view('back.menu.create', compact('cat'));
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
            'name' => 'required',
            'price' => 'required',
        ]);

        $master = menu::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->file('image')->store('menu'),
            'is_active' => $request->is_active,
            'status_masakan' => $request->status_masakan,
            'category_menus_id' => $request->category_menus_id,
            // 'id_dapur' => $request->id_dapur,
        ]);
        Alert::success('success', 'berhasil disimpan');
        return redirect()->route('menu.index');
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
        $mn = Menu::find($id);
        $cat = CategoryMenu::all();

        return view('back.menu.edit', compact('mn', 'cat'));
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
            $menu = menu::find($id);
            $menu->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'slug' => str::slug($request->name),
                'category_menus_id' => $request->category_menus_id,
                'is_active' => $request->is_active,
            ]);
            Alert::success('success', 'Data Hass been Update');
            return redirect()->route('menu.index');
        } else {
            $menu = menu::find($id);
            // storage::delete('gambar_artikel');
            $menu->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'slug' => Str::slug($request->judul),
                'category_menus_id' => $request->category_menus_id,
                'is_active' => $request->is_active,

                'image' => $request->file('image')->store('menu'),
            ]);
            Alert::success('success', 'Data Has Been Update');
            return redirect()->route('menu.index');
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
        $mn = menu::find($id);

        $mn->delete();
        Alert::success('success', 'has ben successfuly');
        return redirect()->route('menu.index');
    }
}
