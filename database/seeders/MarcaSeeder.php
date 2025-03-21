<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Populando a tabela marcas.
     */
    public function run(): void
    {
        $valor = [
            [
                "id" => 1,
                "nome" => "FIAT",
            ],
            [
                "id" => 2,
                "nome" => "FORD",
            ],
            [
                "id" => 3,
                "nome" => "BMW",
            ],
            [
                "id" => 4,
                "nome" => "CHEVROLET",
            ],
            [
                "id" => 5,
                "nome" => "HONDA",
            ],
            [
                "id" => 6,
                "nome" => "YAMAHA",
            ],
            [
                "id" => 7,
                "nome" => "VOLVO",
            ],
            [
                "id" => 8,
                "nome" => "SCANIA",
            ],
            [
                "id" => 9,
                "nome" => "IVECO",
            ],
            [
                "id" => 10,
                "nome" => "DAF",
            ],
            [
                "id" => 11,
                "nome" => "FIBRAFORT",
            ],
            [
                "id" => 12,
                "nome" => "SCHAEFER YACHTS",
            ],
            [
                "id" => 13,
                "nome" => "MAGMA YACHTS",
            ]
        ];
        DB::table('marcas')->insert($valor);
    }
}
