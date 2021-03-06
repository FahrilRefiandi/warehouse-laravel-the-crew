<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cek level user
        if(Auth::user()->level == 0){
            $data=Toko::latest('updated_at')->where('user_id',Auth::user()->id)->get();
        }else{
            $data=Toko::latest('updated_at')->get();
        }
        // generate kode pesanan
        $kodePesan="OR".date('dmy').rand(100,10000);

        return view('backend.pesanan',compact('data','kodePesan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahRincianPesanan(Request $req,$id)
    {
        // menambahkan data pesanan
        $barang=Barang::where('id',$req->barang)->first();
        // dd($req->jumlah_beli);
        if($barang->stok <= $req->jumlah_beli){
            return redirect("/pesanan/$id")->with('gagal',"Mohon Maaf.jumlah beli melebihi stok kami.!");
        }else{
        $req->validate([
            'barang' => 'required|numeric',
            'jumlah_beli' => "required|numeric",
        ]);
        Pesanan::create([
            'barang_id' => $req->barang,
            'toko_id' => $id,
            'jumlah_beli' => $req->jumlah_beli
        ]);

        Barang::where('id',$req->barang)->update(['stok' => $barang->stok - $req->jumlah_beli]);

        return redirect("/pesanan/$id")->with('sukses',"Pesanan berhasil dibuat.!");
        }
    }
    public function deleteRincianPesanan(Request $req,$id)
    {
        // menghapus data pesanan berdasarkan id
        $barang=Barang::where('id',$req->barang_id)->first();
        $tambahStok=$barang->stok+$req->jumlah_beli;

        // dd($tambahStok,$id,$req->barang_id);
        Barang::where('id',$req->barang_id)->update(['stok' => $tambahStok]);
        Pesanan::where('id',$id)->delete();

        return redirect("/pesanan/$req->pesanan_id")->with('sukses',"Data berhasil dihapus.!");
    }

    public function updateStatusPesanan(Request $req,$id){

        $req->validate(['status' => 'required']);
        // update status pesanan
        Toko::where('id',$id)->update(['status'=>$req->status]);
        return redirect('/pesanan');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inputan
        $request->validate([
            'kode_pesanan'=> 'required|unique:toko',
            'nama_toko'=> 'required|string',
            'alamat'=> 'required',
        ]);

        // insert data ke table toko
        Toko::create([
            'nama_toko' => $request->nama_toko,
            'kode_pesanan' => $request->kode_pesanan,
            'alamat' => $request->alamat,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/pesanan')->with('sukses',"Data $request->nama_toko berhasil disimpan.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // merubah variabel id ke variabel idToko
        $idToko=$id;
        $toko=Toko::where('id',$id)->first();
        if($toko == null){
            return redirect('/pesanan')->with('gagal',"Buat pesanan terlebihdahulu.!");
        }

        // relasi database toko,pesanan barang,satuan,dan jenis barang
       $data= DB::select("SELECT
        toko.nama_toko,
        toko.kode_pesanan,
        toko.alamat,
        toko.user_id,
        pesanan.toko_id,
        pesanan.barang_id,
        pesanan.id,
        pesanan.jumlah_beli,
        pesanan.created_at,
        pesanan.updated_at,
        barang.kode_barang,
        barang.nama_barang,
        barang.stok,
        barang.satuan_id,
        barang.jenis_id,
        satuan.satuan,
        jenis_barang.jenis
    FROM
        toko
        INNER JOIN
        pesanan
        ON
            toko.id = pesanan.toko_id
        INNER JOIN
        barang
        ON
            pesanan.barang_id = barang.id
        INNER JOIN
        satuan
        ON
            barang.satuan_id = satuan.id
        INNER JOIN
        jenis_barang
        ON
            barang.jenis_id = jenis_barang.id
    WHERE
        toko.id = $id");


        // cek level rincian pesanan
        if (Auth::user()->level == 0) {
            if($toko->user_id != Auth::user()->id){
                return redirect('/pesanan')->with('gagal',"Pesanan Bukan Untuk Anda.!");
            }
        }

        // mengambil data barang
        $barang=Barang::all();
        return view('backend.rincianPesanan',compact('data','barang','idToko','toko'));
    }


}
