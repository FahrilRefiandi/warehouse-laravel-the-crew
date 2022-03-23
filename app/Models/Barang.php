<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    // MEMBERI NAMA TABEL
    protected $table='barang';
    // MENGATUR YANG BOLEH DIISI
    protected $fillable=[
        'kode_barang','nama_barang','stok','satuan_id','jenis_id',
    ];
}
