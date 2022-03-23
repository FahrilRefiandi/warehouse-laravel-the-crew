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
        // MENAMPILKAN DATA BARANG
        $data = Barang::
        leftJoin('satuan','barang.satuan_id','satuan.id')
        ->leftJoin('jenis_barang','jenis_barang.id','barang.jenis_id')
        ->latest()->get(['barang.*','satuan.satuan','jenis_barang.jenis']);

        // MENGAMBIL DATA DARI DATABASE DISIMPAN KEDALAM VARIABLE JENIS BARANG DAN SATUAN
        $jenisBarang=JenisBarang::orderBy('jenis','asc')->get();
        $satuan=Satuan::orderBy('satuan','asc')->get();

        // MENAMPILKAN DATA BARANG DI VIEW DAN MENGIRIMKAN VAR DATA
        return view('backend.barang',compact('data','jenisBarang','satuan'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDASI INPUTAN
        $request->validate([
            'kode_barang' => 'required|unique:barang',
            'nama_barang' => 'required|string',
            'stok' => 'required|numeric',
            'satuan' => 'required|numeric',
            // 'supplier' => 'required|numeric',
            'jenis' => 'required|numeric',
        ]);

        // insert data ke table barang
        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan,
            // 'supplier_id' => $request->supplier,
            'jenis_id' => $request->jenis,
            // 'harga_beli' => $request->harga_beli,
            // 'harga_jual' => $request->harga_jual,
        ]);
        // MENGIRIMKAN NOTIFIKASI DAN REDIRECT KE HALAMAN BARANG
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
        // MENAMPILKAN DATA BARANG BERDASARKAN ID
        $data = Barang::where('id',$id)->first();
        $jenisBarang=JenisBarang::orderBy('jenis','asc')->get();
        $satuan=Satuan::orderBy('satuan','asc')->get();
        // MENAMPILKAN EDITBARANG
        return view('backend.editBarang',compact('data','jenisBarang','satuan'));
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
        // VALIDAASI INPUTAN UPDATE BARANG
        $request->validate([
            'kode_barang' => ['required',Rule::unique('barang')->ignore($id,)],
            'nama_barang' => 'required|string',
            'stok' => 'required|numeric',
            'satuan' => 'required|numeric',
            // 'supplier' => 'required|numeric',
            'jenis' => 'required|numeric',
            // 'harga_beli' => 'required|numeric',
            // 'harga_jual' => 'required|numeric',
        ]);

        Barang::where('id',$id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan_id' => $request->satuan,
            // 'supplier_id' => $request->supplier,
            'jenis_id' => $request->jenis,
            // 'harga_beli' => $request->harga_beli,
            // 'harga_jual' => $request->harga_jual,
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
        // DELETE DATA BARANG BERDASARKAN ID
        Barang::where('id',$id)->delete();
        return redirect('/barang')->with('sukses',"Data $req->nama_barang berhasil dihapus.");
    }
}
