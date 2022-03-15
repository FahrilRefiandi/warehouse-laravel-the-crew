<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Supplier::orderBy('nama_supplier','asc')->latest()->get();
        return view('backend.supplier',compact('data'));
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
            'nama_supplier' => 'required|string',
            'alamat_supplier' => 'required|string',
            'kontak_supplier' => 'required|string',
        ]);

        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'kontak_supplier' => $request->kontak_supplier,
        ]);
        return redirect('/supplier')->with('sukses',"Data $request->nama_supplier berhasil disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Supplier::where('id',$id)->first();
        return view('backend.editSupplier',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Supplier::where('id',$id)->first();
        dd($data);
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
            'nama_supplier' => 'required|string',
            'alamat_supplier' => 'required|string',
            'kontak_supplier' => 'required|string',
        ]);

        Supplier::where('id',$id)->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'kontak_supplier' => $request->kontak_supplier,
        ]);
        return redirect('/supplier')->with('sukses',"Data $request->nama_supplier berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $req, $id)
    {
        Supplier::where('id',$id)->delete();
        return redirect('/supplier')->with('sukses',"Data $req->nama_supplier berhasil dihapus.");
    }
}
