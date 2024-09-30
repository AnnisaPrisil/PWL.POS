<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 
            'user_id' => 3, 
            'pembeli' => 'faiq', 
            'penjualan_kode' => 'pnc001', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 2, 
            'user_id' => 3, 
            'pembeli' => 'ica', 
            'penjualan_kode' => 'pnc002', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 3, 
            'user_id' => 3, 
            'pembeli' => 'prisil', 
            'penjualan_kode' => 'pnc003', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 4, 
            'user_id' => 3, 
            'pembeli' => 'aiq', 
            'penjualan_kode' => 'pnc004', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 5, 
            'user_id' => 3, 
            'pembeli' => 'bruno', 
            'penjualan_kode' => 'pnc005', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'], 

            ['penjualan_id' => 6, 
            'user_id' => 3, 
            'pembeli' => 'taylor', 
            'penjualan_kode' => 'pnc006', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 7, 
            'user_id' => 3, 
            'pembeli' => 'aiq', 
            'penjualan_kode' => 'pnc007', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 8,
             'user_id' => 3, 
             'pembeli' => 'kylie', 
             'penjualan_kode' => 'pnc008',
              'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 9, 
            'user_id' => 3, 
            'pembeli' => 'kendall', 
            'penjualan_kode' => 'pnc009', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'],

            ['penjualan_id' => 10, 
            'user_id' => 3, 
            'pembeli' => 'lady', 
            'penjualan_kode' => 'pnc010', 
            'penjualan_tanggal' => '2025-01-05 00:00:00'], 
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
