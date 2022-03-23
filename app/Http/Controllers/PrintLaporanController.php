<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Toko;

class PrintLaporanController extends Controller
{

    public function laporanBarang()
    {
        // meanmpilkan data barang dan merelasikan dengan jenis barang dan satuan
        $data = Barang::
        leftJoin('satuan','barang.satuan_id','satuan.id')
        ->leftJoin('jenis_barang','jenis_barang.id','barang.jenis_id')
        ->orderBy('stok','desc')->get(['barang.*','satuan.satuan','jenis_barang.jenis']);
        return view('backend.laporan.barang',compact('data'));
    }

    public function laporanPesanan(){
        $tokos=Toko::get();
        $pesanans=Pesanan::join('barang','barang.id','pesanan.barang_id')
        ->join('satuan','satuan.id','barang.satuan_id')
        ->get(['pesanan.*','barang.nama_barang','barang.stok','barang.kode_barang','satuan.satuan']);
        return view('backend.laporan.pesanan',compact('tokos','pesanans'));
    }

}
