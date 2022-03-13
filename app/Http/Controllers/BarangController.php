<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Barang::latest()->get();
        $data = Barang::join('satuan','barang.satuan_id','satuan.id')->latest()->get(['Barang.*','satuan.satuan']);
        // dd($data);
        $jenisBarang=JenisBarang::orderBy('jenis','asc')->get();
        $satuan=Satuan::orderBy('satuan','asc')->get();
        $supplier=Supplier::orderBy('nama_supplier','asc')->get();

        return view('backend.barang',compact('data','jenisBarang','satuan','supplier'));
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
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required|string',
            'stok' => 'required|numeric',
            'satuan' => 'required|numeric',
            'supplier' => 'required|numeric',
            'jenis' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan,
            'supplier_id' => $request->supplier,
            'jenis_id' => $request->jenis,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
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
        $jenisBarang=JenisBarang::orderBy('jenis','asc')->get();
        $satuan=Satuan::orderBy('satuan','asc')->get();
        $supplier=Supplier::orderBy('nama_supplier','asc')->get();

        return view('backend.editBarang',compact('data','jenisBarang','satuan','supplier'));
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
            'kode_barang' => ['required',Rule::unique('barang')->ignore($id,)],
            'nama_barang' => 'required|string',
            'stok' => 'required|numeric',
            'satuan' => 'required|numeric',
            'supplier' => 'required|numeric',
            'jenis' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);

        Barang::where('id',$id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan,
            'supplier_id' => $request->supplier,
            'jenis_id' => $request->jenis,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);
        return redirect('/barang')->with('sukses',"Data $request->nama_barang berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $req, $id)
    {
        Barang::where('id',$id)->delete();
        return redirect('/barang')->with('sukses',"Data $req->nama_barang berhasil dihapus.");
    }
}
