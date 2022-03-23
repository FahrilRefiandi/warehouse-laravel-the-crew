<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    // AGAR FACTORY DAPAT DIGUNAKAN
    use HasFactory;

    // MEMBERI NAMA TABEL
    protected $table='toko';
    // MENGATUR YANG BOLEH DIISI
    protected $fillable=['nama_toko','pesanan_id','kode_pesanan','alamat','user_id'];
}
