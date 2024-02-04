<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryMenu;
use Str;
use alert;
class CategoryMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = CategoryMenu::all();
        return view('back.category.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.category.create');
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
            'name_category' => 'required',
        ]);
        $cat = CategoryMenu::create([
            'name_category' => $request->name_category,
            'slug' => Str::slug($request->name_category),
        ]);
        Alert::success('success', 'Category  has been successFuly');
        return redirect()->route('category.index');
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
        $cat = CategoryMenu::find($id);
        return view('back.category.edit', compact('cat'));
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
        $this->validate($request, [
            'name_category' => 'required|min:10',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name_category);

        $cat = CategoryMenu::find($id);
        $cat->update($data);
        Alert::success('success', 'berhasil di edit');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = CategoryMenu::find($id);
        $cat->delete();
        Alert::success('success', 'has ben successfuly');
        return redirect()->route('category.index');
    }
}
