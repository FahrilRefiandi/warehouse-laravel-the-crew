<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::latest();
        dd($data);
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
            'nama_barang' => 'required|string',
            'stok' => 'required|numeric',
            'satuan' => 'required|numeric',
            'supplier' => 'required|numeric',
            'jenis' => 'required|numeric',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan,
            'supplier_id' => $request->supplier,
            'jenis_id' => $request->jenis,
        ]);
        return redirect('/barang')->with('sukses',"Data $request->nama_barang berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::where('id',$id)->first();
        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $request->validate([
            'nama_barang' => 'required|string',
            'stok' => 'required|numeric',
            'satuan' => 'required|numeric',
            'supplier' => 'required|numeric',
            'jenis' => 'required|numeric',
        ]);

        Barang::where('id',$id)->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan,
            'supplier_id' => $request->supplier,
            'jenis_id' => $request->jenis,
        ]);
        return redirect('/barang')->with('sukses',"Data $request->nama_barang berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('id',$id)->delete();
        return redirect('/barang')->with('sukses',"Data berhasil dihapus.");
    }
}
