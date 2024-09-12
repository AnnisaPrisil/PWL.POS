<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['barang_id'=>'1',
            'kategori_id'=>1,
            'barang_kode'=>1,
            'barang_nama'=>'kemeja',
            'harga_beli'=>400000,
            'harga_jual'=>500000],

            ['barang_id'=>'2',
            'kategori_id'=>1,
            'barang_kode'=>2,
            'barang_nama'=>'jas',
            'harga_beli'=>700000,
            'harga_jual'=>900000],

            ['barang_id'=>'3',
            'kategori_id'=>1,
            'barang_kode'=>3,
            'barang_nama'=>'celana',
            'harga_beli'=>50000,
            'harga_jual'=>70000],

            ['barang_id'=>'4',
            'kategori_id'=>1,
            'barang_kode'=>4,
            'barang_nama'=>'soto',
            'harga_beli'=>16000,
            'harga_jual'=>20000],

            ['barang_id'=>'5',
            'kategori_id'=>2,
            'barang_kode'=>5,
            'barang_nama'=>'sushi',
            'harga_beli'=>300000,
            'harga_jual'=>3500000],

            ['barang_id'=>'6',
            'kategori_id'=>2,
            'barang_kode'=>6,
            'barang_nama'=>'rawon',
            'harga_beli'=>40000,
            'harga_jual'=>50000],

            ['barang_id'=>'7',
            'kategori_id'=>2,
            'barang_kode'=>7,
            'barang_nama'=>'dongeng',
            'harga_beli'=>35000,
            'harga_jual'=>40000],

            ['barang_id'=>'8',
            'kategori_id'=>3,
            'barang_kode'=>8,
            'barang_nama'=>'novel',
            'harga_beli'=>90000,
            'harga_jual'=>100000],

            ['barang_id'=>'9',
            'kategori_id'=>3,
            'barang_kode'=>9,
            'barang_nama'=>'ilmiah',
            'harga_beli'=>50000,
            'harga_jual'=>70000],

            ['barang_id'=>'10',
            'kategori_id'=>3,
            'barang_kode'=>10,
            'barang_nama'=>'blender',
            'harga_beli'=>300000,
            'harga_jual'=>4500000],

            ['barang_id'=>'11',
            'kategori_id'=>3,
            'barang_kode'=>11,
            'barang_nama'=>'wajan',
            'harga_beli'=>100000,
            'harga_jual'=>200000],

            ['barang_id'=>'12',
            'kategori_id'=>4,
            'barang_kode'=>12,
            'barang_nama'=>'panci',
            'harga_beli'=>30000,
            'harga_jual'=>40000],

            ['barang_id'=>'13',
            'kategori_id'=>4,
            'barang_kode'=>13,
            'barang_nama'=>' laptop',
            'harga_beli'=>200000000,
            'harga_jual'=>350000000],

            ['barang_id'=>'14',
            'kategori_id'=>5,
            'barang_kode'=>14,
            'barang_nama'=>'komputer',
            'harga_beli'=>20000000,
            'harga_jual'=>30000000],

            ['barang_id'=>'15',
            'kategori_id'=>5,
            'barang_kode'=>15,
            'barang_nama'=>'tv',
            'harga_beli'=>5000000,
            'harga_jual'=>7000000],
        ];
        DB::table('m_barang')->insert($data);
    }
}