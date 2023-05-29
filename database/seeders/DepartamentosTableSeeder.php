<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamento1 = new Departamento([
            'name' => 'Departamento Programación',
            'encargadoId' => '2',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'enabled' => true,
        ]);
        
        $departamento1->saveOrFail();

        $departamento2 = new Departamento([
            'name' => 'Departamento Redes',
            'encargadoId' => '3',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'enabled' => true,
        ]);
        
        $departamento2->saveOrFail();

        
    }
}
