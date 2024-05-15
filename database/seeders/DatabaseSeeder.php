<?php

namespace Database\Seeders;

use App\Models\Filme;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //['l','12', '18']
        $filmes = [
            "Indiana Jones" => 'l',
            "MIB" => '12',
            "Lucy" => '18',
            "Batman" => '12'
        ];

        foreach($filmes as $titulo => $class){
            Filme::create([
                "titulo" => $titulo,
                "classificacao" => $class
            ]);
        }

    }
}
