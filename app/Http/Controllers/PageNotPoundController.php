<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pagenotpound;
use alert;

class PageNotPoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $not = pagenotpound::all();
        return view('back.config.index', compact('not'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $not = pagenotpound::all();
        return view('back.config.create', compact('not'));
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
            'description' => 'required',
        ]);
        $data = $request->all();
        $data['title'] = $request->title;
        $data['image'] = $request->image;
        $data['intro'] = $request->intro;
        $data['description'] = $request->description;

        $not = pagenotpound::create($data);
        Alert::success('success', 'berhasil disimpan');
        return redirect()->route('404.index');
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
        //
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
        //
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
