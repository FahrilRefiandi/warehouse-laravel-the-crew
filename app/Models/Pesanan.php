<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table='pesanan';
    protected $fillable=['barang_id','jumlah_beli','toko_id'];
}
