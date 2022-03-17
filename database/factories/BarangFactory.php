<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_barang' => 'XIA001',
            'nama_barang' => 'POCO PHONE M3',
            'stok' => rand(100,200),
            'satuan_id' => 1,
            'jenis_id' => 1,
        ];
    }
}
