<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table='barang';
    protected $fillable=[
        'kode_barang','nama_barang','stok','satuan_id','supplier_id','jenis_id','harga_beli','harga_jual'
    ];
}
