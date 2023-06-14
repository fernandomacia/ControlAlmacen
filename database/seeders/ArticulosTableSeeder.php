<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articulo1 = new Articulo([
            'name' => 'Switch TP-LINK TL-SG105',
            'description' => 'Switch ethernet para sobremesa. 5 puertos ethernet 10/100/1000 Mbps',
            'departamentoId' => '1',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'prestado' => true,
            'enabled' => true,
        ]);

        $articulo1->saveOrFail();

        $articulo2 = new Articulo([
            'name' => 'Switch TP-LINK TL-SG1024DE',
            'description' => 'Switch 24 puertos ethernet 10/100/1000 Mbps',
            'departamentoId' => '1',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'prestado' => true,
            'enabled' => true,
        ]);

        $articulo2->saveOrFail();

        $articulo3 = new Articulo([
            'name' => 'ASUS VivoBook Pro 15',
            'description' => 'Ordenador portatil Full HD, AMD Ryzen™ 5 5600H, 16GB RAM, 512GB SSD, GeForce RTX™ 3050',
            'departamentoId' => '1',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'prestado' => false,
            'enabled' => true,
        ]);

        $articulo3->saveOrFail();

        $articulo4 = new Articulo([
            'name' => 'ASUS VivoBook Pro 17',
            'description' => 'Ordenador portatil Full HD, AMD Ryzen™ 5 5600H, 16GB RAM, 512GB SSD, GeForce RTX™ 3050',
            'departamentoId' => '1',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'prestado' => false,
            'enabled' => true,
        ]);

        $articulo4->saveOrFail();

        $articulo5 = new Articulo([
            'name' => 'ASUS VivoBook Pro 21',
            'description' => 'Ordenador portatil Full HD, AMD Ryzen™ 5 5600H, 16GB RAM, 512GB SSD, GeForce RTX™ 3050',
            'departamentoId' => '1',
            'updated_at' => '2023-03-21 13:10:57',
            'created_at' => '2023-03-21 13:10:57',
            'prestado' => false,
            'enabled' => true,
        ]);

        $articulo5->saveOrFail();
    }
}
