<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // return 'Ini List Siswa';
        $data_siswa = \App\Siswa::all();
          return view('siswa.index',['data_siswa' => $data_siswa]);
        // return view('siswa.index',['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        // return 'Form disubmit';
        \App\Siswa::create($request->all());
        // return $request->all();
        // return redirect('/siswa');
        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        // return view('siswa/edit');
        return view('siswa/edit',['siswa' => $siswa]);
        // dd($siswa);
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/siswa')->with('sukses','Data berhasil diupdate');

    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete($siswa);
        // $siswa->delete();
        //  return redirect('/siswa')->with('sukses','Data berhasil didelete');
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');
    }    

}
