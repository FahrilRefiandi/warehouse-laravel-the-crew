<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    // AGAR FACORY DAPAT DIGUNAKAN
    use HasFactory;
    // MEMBERI NAMA TABEL
    protected $table='satuan';
    // MENGATUR YANG BOLEH DIISI
    protected $fillable=['satuan'];
}
