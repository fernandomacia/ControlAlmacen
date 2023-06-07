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
            'prestado' => now(),
            'userId' => '4',
            'articuloId' => '1'
        ]);

        $prestamo1->saveOrFail();

        $prestamo2 = new Prestamo([
            'prestado' => now(),
            'userId' => '1',
            'articuloId' => '2'
        ]);

        $prestamo2->saveOrFail();

        $prestamo3 = new Prestamo([
            'prestado' => now(),
            'devuelto' => now(),
            'userId' => '2',
            'articuloId' => '3',
            'devuelveId' => '3'
        ]);

        $prestamo3->saveOrFail();

        $prestamo4 = new Prestamo([
            'prestado' => now(),
            'devuelto' => now(),
            'userId' => '4',
            'articuloId' => '4',
            'devuelveId' => '3'
        ]);

        $prestamo4->saveOrFail();

        $prestamo5 = new Prestamo([
            'prestado' => now(),
            'userId' => '4',
            'articuloId' => '5',
        ]);

        $prestamo5->saveOrFail();
    }
}
