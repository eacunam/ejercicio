<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'codigo' => "C001",
            'nombre' => "Visión Artificial",
            'descripcion' => "Curso básico de IA"
        ]);

        DB::table('products')->insert([
            'codigo' => "C002",
            'nombre' => "Algoritmos",
            'descripcion' => "Curso básico de PG"
        ]);

        DB::table('products')->insert([
            'codigo' => "C003",
            'nombre' => "Teoría de Computación",
            'descripcion' => "Curso básico de CC"
        ]);
    }
}
