<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dapur;

use alert;

class DapurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dapur = Dapur::all();
        return view('back.dapur.index', compact('dapur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.dapur.create');
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
            'stan' => 'required',
            'head_koki' => 'required',
        ]);

        $data = $request->all();
        $data['stan'] = $request->stan;
        $data['head_koki'] = $request->head_koki;
        $data = Dapur::create($data);
        Alert::success('success', ' created Has Been Susccesfully');
        return redirect()->route('dapur.index');
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
        $dapur = Dapur::find($id);
        return view('back.dapur.edit', compact('dapur'));
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
            'stan' => 'required',
            'head_koki' => 'required',
        ]);

        $dapur = dapur::find($id);
        $dapur->update([
            'stan' => $request->stan,
            'head_koki' => $request->head_koki,
        ]);
        Alert::success('success', 'Updates Succesfully');
        return redirect()->route('dapur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dapur = dapur::find($id);
        $dapur->delete();
        Alert::success('success', 'Deleted Succesfully');
        return redirect()->route('dapur.index');
    }
}
