<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data satuan
        $data=Satuan::orderBy('satuan','asc')->latest()->get();
        // mengirim data ke view
        return view('backend.satuan',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'satuan'=>'required|string',
        ]);
        // insert data ke table satuan
        Satuan::create([
            'satuan' => $request->satuan,
        ]);

        // alihkan halaman ke halaman satuan
        return redirect('/satuan')->with('sukses',"Data $request->satuan berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data satuan berdasarkan id
        $data=Satuan::where('id',$id)->first();
        // mengirim data ke view
        return view('backend.editSatuan',compact('data'));
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
        // validasi data
        $request->validate([
            'satuan'=>'required|string',
        ]);

        // update data satuan
        Satuan::where('id',$id)->update([
            'satuan' => $request->satuan,
        ]);

        // alihkan halaman ke halaman satuan
        return redirect('/satuan')->with('sukses',"Data $request->satuan berhasil diupdate.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus data satuan berdasarkan id
        Satuan::where('id',$id)->delete();
        // alihkan halaman ke halaman satuan dan tampilkan pesan sukses
        return redirect('/satuan')->with('sukses',"Data berhasil dihapus.");
    }
}
