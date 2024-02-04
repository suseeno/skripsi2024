<?php

namespace App\Http\Controllers;
use App\Models\Masakan;

use Illuminate\Http\Request;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $data = Masakan::join('kategori', 'kategori.id', 'masakan.kategori_id')
            ->where('nama_masakan', 'like', "%{$req->keyword}%")
            ->select('masakan.*', 'nama_kategori')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('back.masakan.daftar', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back masakan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //buat kode masakan
        $blt = date('s');
        $kode_mkn = 'MKN' . $blt;

        \Validator::make($req->all(), [
            'nama_masakan' => 'required|between:3,100',
            'harga' => 'required|numeric',
            'gambar' => 'required|image',
            'status_masakan' => 'required',
        ])->validate();

        $filename =
            rand(1, 999) .
            '_' .
            str_replace(' ', '', $req->gambar->getClientOriginalName());

        $req->file('gambar')->storeAs('/public/gambar', $filename);

        $result = new Masakan();
        $result->kode_masakan = $kode_mkn . sprintf('%02s', $req->kode_masakan);
        $result->kategori_id = $req->kategori_id;
        $result->nama_masakan = $req->nama_masakan;
        $result->gambar = $filename;
        $result->harga = $req->harga;
        $result->status_masakan = $req->status_masakan;

        if ($result->save()) {
            alert()
                ->success('Data Berhasil Tersimpan ke Database.', 'Tersimpan!')
                ->autoclose(4000);
            return redirect('/admin/masakan');
        } else {
            alert()
                ->info(
                    'Harap Periksa lagi data Formulir anda.',
                    'Tidak Tersimpan!'
                )
                ->autoclose(4000);
        }
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
