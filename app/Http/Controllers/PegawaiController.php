<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Str;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = User::all();
        return view('back.pegawai.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::all();
        return view('back.pegawai.add', compact('data'));
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
            'email' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            //'image' => 'required',
        ]);

        $data = $request->all();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['image'] = $request->file('image')->store('pegawai');
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['alamat'] = $request->alamat;
        $data['no_hp'] = $request->no_hp;
        $data['gender'] = $request->gender;
        $data['role'] = $request->role;
        $data['password'] = $request->password;

        $employes = User::create($data);

        Alert::success('success', ' created Has Been Susccesfully');
        return redirect()->route('pegawai.index');
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
        $employ = User::find($id);
        return view('back.pegawai.edit', compact('employ'));
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
            $employ = User::find($id);
            $employ->update([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'agama' => $request->agama,

                'no_hp' => $request->no_hp,
                'gender' => $request->gender,
                'role' => $request->role,
            ]);
            Alert::success('success', 'Data Hass been Update');
            return redirect()->route('pegawai.index');
        } else {
            $employ = User::find($id);
            // storage::delete('gambar_artikel');
            $employ->update([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'no_hp' => $request->no_hp,
                'gender' => $request->gender,
                'bagian' => $request->bagian,

                'image' => $request->file('image')->store('pegawai'),
            ]);
            Alert::success('success', 'Updated Has Been Succesfully');
            return redirect()->route('pegawai.index');
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
        $employ = User::find($id);
        $employ->delete();
        Alert::success('success', ' Deleted Has Been Susccesfully');
        return redirect()->route('pegawai.index');
    }
}
