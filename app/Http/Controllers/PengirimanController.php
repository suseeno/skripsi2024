<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengirim;
use App\Models\lokasi;
use App\Models\barang;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengirim=pengirim::all();
        $lokasi=lokasi::all();
        return view('back.pengiriman.index',compact('pengirim','lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengirim =pengirim::all();
        $lokasi= lokasi::all();
        $barang =Barang::all();
        $kurir =user::all();
        return view('back.pengiriman.create',compact('pengirim','lokasi','barang','kurir'));
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
            'no_pengiriman'=>'required',
            'tanggal'=>'required',
            'lokasi_id'=>'required',
            'barang_id'=>'required',
            'jumlah_barang'=>'required',
            'harga_barang'=>'required', 
            
            
            
        ]);
        $data=$request->all();
        $data['no_pengiriman']=$request->nomor_pengiriman;
        $data['tanggal']=$request->tanggal;
        $data['lokasi_id']=$request->lokasi_id;
        $data['barang_id']=$request->barang_id;
        $data['jumlah_barang']=$request->jumlah_barang;
        $data['harga_barang']=$request->harga_barang;
        $data['user_id']=$request->user_id;
        $data=pengirim::create($data);
        Alert::success('success','Created Succesfully');
        return redirect()->route('pengirim.index');
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
        $pengirim=pengirim::find($id);
        $lok= lokasi::all();
        $barang =Barang::all();
        $kurir =user::all();
        return view('back.pengiriman.edit',compact('pengirim','lok','barang','kurir'));
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
        $pengirim=Pengirim::find($id);
        $pengirim->update([
            'no_pengiriman'=>$request->no_pengiriman,
            'tanggal'=>$request->tanggal,
            'lokasi_id'=>$request->lokasi_id,
            'barang_id'=>$request->barang_id,
            'jumlah_barang'=>$request->jumlah_barang,
            'harga_barang'=>$request->harga_barang,
            'user_id'=>$request->user_id,
            
            
        ]);
        Alert::success('success','Updates Succesfully');
        return redirect()->route('pengirim.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengirim = pengirim::find($id);

        $pengirim->delete($id);
        Alert::success('success',' Delete Succesfully');
        return redirect()->route('pengirim.index');
    }
}
