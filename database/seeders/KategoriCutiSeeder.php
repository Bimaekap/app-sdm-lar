<?php

namespace Database\Seeders;

use App\Models\KategoriCuti;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'jenis_cuti' => 'Cuti Sakit',
                'jumlah_cuti' => 20,
                'status' => 1,                         
            ],
            [
                'jenis_cuti' => 'Cuti Tahunan',
                'jumlah_cuti' => 11,
                'status' => 1,                         
            ],
            [
                'jenis_cuti' => 'Cuti Optional',
                'jumlah_cuti' => 5,
                'status' => 1,                         
            ],
        ];

        foreach ($items as $item){
        KategoriCuti::create($item);
        }
    }
}
