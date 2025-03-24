<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * populando a tabela produtos.
     */
    public function run(): void
    {
        $valor = [
            [
                "id" => 1,
                "nome" => "MOBI",
                "categoria_id" => 1,
                "marca_id" => 1,
            ],
            [
                "id" => 2,
                "nome" => "PALIO",
                "categoria_id" => 1,
                "marca_id" => 1,
            ],
            [
                "id" => 3,
                "nome" => "CRONOS",
                "categoria_id" => 1,
                "marca_id" => 1,
            ],
            [
                "id" => 4,
                "nome" => "ARGO",
                "categoria_id" => 1,
                "marca_id" => 1,
            ],
            [
                "id" => 5,
                "nome" => "RANGER",
                "categoria_id" => 1,
                "marca_id" => 2,
            ],            
            [
                "id" => 6,
                "nome" => "EDGE",
                "categoria_id" => 1,
                "marca_id" => 2,
            ],            
            [
                "id" => 7,
                "nome" => "FUSION",
                "categoria_id" => 1,
                "marca_id" => 2,
            ],            
            [
                "id" => 8,
                "nome" => "X1",
                "categoria_id" => 1,
                "marca_id" => 3,
            ],            
            [
                "id" => 9,
                "nome" => "X5",
                "categoria_id" => 1,
                "marca_id" => 3,
            ],            
            [
                "id" => 10,
                "nome" => "X6",
                "categoria_id" => 1,
                "marca_id" => 3,
            ],            
            [
                "id" => 11,
                "nome" => "CORSA",
                "categoria_id" => 1,
                "marca_id" => 4,
            ],            
            [
                "id" => 12,
                "nome" => "ONIX",
                "categoria_id" => 1,
                "marca_id" => 4,
            ],            
            [
                "id" => 13,
                "nome" => "CIVIC",
                "categoria_id" => 1,
                "marca_id" => 5,
            ],            
            [
                "id" => 14,
                "nome" => "CRV",
                "categoria_id" => 1,
                "marca_id" => 5,
            ],            
            [
                "id" => 15,
                "nome" => "CG 150",
                "categoria_id" => 2,
                "marca_id" => 5,
            ],            
            [
                "id" => 16,
                "nome" => "FORZA 350",
                "categoria_id" => 2,
                "marca_id" => 5,
            ],            
            [
                "id" => 17,
                "nome" => "FACTOR 150",
                "categoria_id" => 2,
                "marca_id" => 6,
            ],            
            [
                "id" => 18,
                "nome" => "FAZER 250",
                "categoria_id" => 2,
                "marca_id" => 6,
            ],            
            [
                "id" => 19,
                "nome" => "LANDER 250",
                "categoria_id" => 2,
                "marca_id" => 6,
            ],            
            [
                "id" => 20,
                "nome" => "FH 540",
                "categoria_id" => 3,
                "marca_id" => 7,
            ],            
            [
                "id" => 21,
                "nome" => "FH 460",
                "categoria_id" => 3,
                "marca_id" => 7,
            ],            
            [
                "id" => 22,
                "nome" => "G 420",
                "categoria_id" => 3,
                "marca_id" => 8,
            ],            
            [
                "id" => 23,
                "nome" => "P 360",
                "categoria_id" => 3,
                "marca_id" => 8,
            ],            
            [
                "id" => 24,
                "nome" => "VM 290",
                "categoria_id" => 5,
                "marca_id" => 7,
            ],            
            [
                "id" => 25,
                "nome" => "FH 420",
                "categoria_id" => 5,
                "marca_id" => 7,
            ],            
            [
                "id" => 26,
                "nome" => "VM 330",
                "categoria_id" => 5,
                "marca_id" => 7,
            ],            
            [
                "id" => 27,
                "nome" => "R 450",
                "categoria_id" => 5,
                "marca_id" => 8,
            ],            
            [
                "id" => 28,
                "nome" => "R 470",
                "categoria_id" => 5,
                "marca_id" => 8,
            ],            
            [
                "id" => 29,
                "nome" => "R 540",
                "categoria_id" => 5,
                "marca_id" => 8,
            ],            
            [
                "id" => 30,
                "nome" => "DAILY 35",
                "categoria_id" => 5,
                "marca_id" => 9,
            ],            
            [
                "id" => 31,
                "nome" => "DAILY 70C",
                "categoria_id" => 5,
                "marca_id" => 9,
            ],            
            [
                "id" => 32,
                "nome" => "DAILY 45",
                "categoria_id" => 5,
                "marca_id" => 9,
            ],            
            [
                "id" => 33,
                "nome" => "FOCKER 222",
                "categoria_id" => 4,
                "marca_id" => 11,
            ],            
            [
                "id" => 34,
                "nome" => "FOCKER 188",
                "categoria_id" => 4,
                "marca_id" => 11,
            ],            
            [
                "id" => 35,
                "nome" => "AZIMUT 62",
                "categoria_id" => 4,
                "marca_id" => 12,
            ],            
            [
                "id" => 36,
                "nome" => "PRESTIGE 400",
                "categoria_id" => 4,
                "marca_id" => 12,
            ],            
        ];
        DB::table('produtos')->insert($valor);
    }
}
