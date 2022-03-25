<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mendapatkan data bulan ini
        $bulanIni=substr(now(),0,7);
        // barang
        $barang=Barang::where('stok','>=',10)->count();
        // cek level user
        if(Auth::user()->level == 0){
            $orderTerbaru=Toko::where('user_id',Auth::user()->id)->latest()->get();
            // dd($orderTerbaru);
            // pengelola toko
            $pesanan=Toko::where('created_at','like',"$bulanIni%")->where('user_id',Auth::user()->id)->count();
            $barangTerjual=Toko::join('pesanan','pesanan.toko_id','toko.id')->select(['pesanan.*','toko.user_id','toko.created_at'])
            ->where('user_id',Auth::user()->id)->where('toko.created_at','like',"$bulanIni%")->count();
            $terkirim=Toko::where('status','3')->where('user_id',Auth::user()->id)->count();
            // menampilkan view dashboard dan mengirimkan data
            return view('backend.dashboardPengelolaToko',compact('pesanan','barangTerjual','barang','terkirim','orderTerbaru'));
        }else{
            $orderTerbaru=Toko::latest()->get();
            // menghitung jumlah pesanan
            $pesanan=Toko::where('created_at','like',"$bulanIni%")->count();

            // menghitung jumlah barang terjual
            $barangTerjual=Pesanan::where('created_at','like',"$bulanIni%")->count();
            // belum di acc
            $terkirim=Toko::where('status','3')->count();
            // menampilkan view dashboard dan mengirimkan data
            return view('backend.dashboard',compact('pesanan','barangTerjual','barang','terkirim','orderTerbaru'));
        }

    }
}
