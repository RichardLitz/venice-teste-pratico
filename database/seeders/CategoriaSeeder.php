<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Populando a tabela categorias.
     */
    public function run(): void
    {
        $valor = [
            [
                "id" => 1,
                "nome" => "CARRO",
            ],
            [
                "id" => 2,
                "nome" => "MOTO",
            ],
            [
                "id" => 3,
                "nome" => "BITREM",
            ],
            [
                "id" => 4,
                "nome" => "NÁUTICOS",
            ],
            [
                "id" => 5,
                "nome" => "TRUCK OU CAMINHÃO",
            ]            
        ];
        DB::table('categorias')->insert($valor);
    }

}
