<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    // AGAR FACTORY DAPAT DIGUNAKAN
    use HasFactory;
    // MEMBERI NAMA TABEL
    protected $table='pesanan';
    // MENGATUR YANG BOLEH DIISI
    protected $fillable=['barang_id','jumlah_beli','toko_id'];
}
