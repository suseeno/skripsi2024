<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lok =lokasi::all();
        return view('back.lokasi.index',compact('lok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lok=lokasi::all();
        return view('back.lokasi.create',compact('lok'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'nama_lokasi'=>'required',
            'kode_lokasi'=>'required',
            
        ]);
        $data=$request->all();
        $data['nama_lokasi']=$request->nama_lokasi;
        $data['kode_lokasi']=$request->kode_lokasi;
       

        $data=lokasi::create($data)->paginate(4);
        Alert::success('success',' Creteted Succesfully');
        return redirect()->route('lokasi.index');   
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
        $lok=lokasi::find($id);
        return view('back.lokasi.edit',compact('lok'));
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
        $lok=lokasi::find($id);
        $lok->update([
            'nama_barang'=>$request->nama_barang,
            'kode_barang'=>$request->kode_barang,
            
            
        ]);
        Alert::success('success','Updates Succesfully');
        return redirect()->route('lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lok = lokasi::find($id);

        $lok->delete($id);
        Alert::success('success',' Delete Succesfully');
        return redirect()->route('lokasi.index');
    }
}
