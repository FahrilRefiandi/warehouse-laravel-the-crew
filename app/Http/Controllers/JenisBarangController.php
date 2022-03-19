<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=JenisBarang::orderBy('jenis','asc')->get();
        return view('backend.jenis',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang'=>'required|string',
        ]);

        JenisBarang::create([
            'jenis' => $request->jenis_barang,
        ]);

        return redirect('/jenis-barang')->with('sukses',"Data $request->jenis berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=JenisBarang::where('id',$id)->first();
        return view('backend.editJenisBarang',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'jenis_barang'=>'required|string',
        ]);

        JenisBarang::where('id',$id)->update([
            'jenis' => $request->jenis_barang,
        ]);

        return redirect('/jenis-barang')->with('sukses',"Data $request->jenis_barang berhasil diupdate.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisBarang::where('id',$id)->delete();
        return redirect('/jenis-barang')->with('sukses',"Data berhasil dihapus.");
    }
}
