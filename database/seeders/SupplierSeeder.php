<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1, 
                'supplier_kode' => '1', 
                'supplier_nama' => 'Supplier A',
                'supplier_alamat' => 'Jl. Mawar No. 123, Jakarta'
            ],
            [
                'supplier_id' => 2, 
                'supplier_kode' => '2', 
                'supplier_nama' => 'Supplier B',
                'supplier_alamat' => 'Jl. Melati No. 456, Bandung'
            ],
            [
                'supplier_id' => 3, 
                'supplier_kode' => '3', 
                'supplier_nama' => 'Supplier C',
                'supplier_alamat' => 'Jl. Anggrek No. 789, Surabaya'
            ],

        ];

        DB::table('m_supplier')->insert($data);
    }
}
