<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode'=>'PAK' ,'kategori_nama' => 'Pakaian'],
            ['kategori_id' => 2, 'kategori_kode' =>'MAK','kategori_nama' => 'Makanan'],
            ['kategori_id' => 3, 'kategori_kode' =>'BUK','kategori_nama' => 'Buku'],
            ['kategori_id' => 4, 'kategori_kode' =>'PRH','kategori_nama' => 'Peralatan Rumah'],
            ['kategori_id' => 5, 'kategori_kode' =>'ELK','kategori_nama' => 'Elektronik'],

        ];

        DB::table('m_kategori')->insert($data);
}

}
