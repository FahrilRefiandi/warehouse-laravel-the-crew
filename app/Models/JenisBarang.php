<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    // MEMBERI NAMA TABEL
    protected $table='jenis_barang';
    // MENGATUR YANG BOLEH DIISI
    protected $fillable=['jenis'];
}
