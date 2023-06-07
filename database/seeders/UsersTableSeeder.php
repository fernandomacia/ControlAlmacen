<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdministrador = new User([
            'dni' => '9943935D',
            'name' => 'Susana Puente Valero',
            'rol' => 'administrador',
            'email' => 'admin@example.net',
            'password' => Hash::make('password'),
            'updated_at' => now(),
            'created_at' => now(),
            'enabled' => true,
        ]);

        $userAdministrador->saveOrFail();

        $userEncargado1 = new User([
            'dni' => '01642486X',
            'name' => 'Leo Ordóñez Alcaráz',
            'rol' => 'encargado',
            'email' => 'encargado1@example.net',
            'password' => Hash::make('password'),
            'updated_at' => now(),
            'created_at' => now(),
            'enabled' => true,
        ]);

        $userEncargado1->saveOrFail();

        $userEncargado2 = new User([
            'dni' => '00203758R',
            'name' => 'Mara Arroyo Martos',
            'rol' => 'encargado',
            'email' => 'encargado2@example.net',
            'password' => Hash::make('password'),
            'updated_at' => now(),
            'created_at' => now(),
            'enabled' => true,
        ]);

        $userEncargado2->saveOrFail();

        $userUsuario = new User([
            'dni' => '39470321K',
            'name' => 'Mateo Villanueva Segura',
            'rol' => 'usuario',
            'email' => 'usuario@example.net',
            'password' => Hash::make('password'),
            'updated_at' => now(),
            'created_at' => now(),
            'enabled' => true,
        ]);

        $userUsuario->saveOrFail();

        \App\Models\User::factory()->count(20)->create();
    }
}
