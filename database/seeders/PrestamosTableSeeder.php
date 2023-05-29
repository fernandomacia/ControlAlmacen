<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestamo;

class PrestamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestamo1 = new Prestamo([
            'updated_at' => now(),
            'created_at' => now(),
            'userId' => '4',
            'articuloId' => '1'
        ]);

        $prestamo1->saveOrFail();

        $prestamo2 = new Prestamo([
            'updated_at' => now(),
            'created_at' => now(),
            'userId' => '5',
            'articuloId' => '2'
        ]);

        $prestamo2->saveOrFail();

        $prestamo3 = new Prestamo([
            'updated_at' => now(),
            'created_at' => now(),
            'userId' => '6',
            'articuloId' => '3'
        ]);

        $prestamo3->saveOrFail();
    }
}
