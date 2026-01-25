<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        
        Product::query()->delete(); 

        $produtos = [
            ['title' => 'Ração Natural', 'category' => 'Alimentação', 'image' => '/img/produtos/ração.png', 'price' => 8990, 'stock' => 10],
            ['title' => 'Guia Retrátil', 'category' => 'Acessórios', 'image' => '/img/produtos/retratil.png', 'price' => 4500, 'stock' => 10],
            ['title' => 'Mordedor Pro', 'category' => 'Brinquedos', 'image' => '/img/produtos/mordedor.png', 'price' => 2590, 'stock' => 10],
            ['title' => 'Kit Bucal', 'category' => 'Saúde', 'image' => '/img/produtos/bucal.png', 'price' => 3990, 'stock' => 10],
            
            ['title' => 'Cama Nuvem', 'category' => 'Conforto', 'image' => '/img/produtos/nuvem.png', 'price' => 12900, 'stock' => 10],
            ['title' => 'Mix Frutas', 'category' => 'Petiscos', 'image' => '/img/produtos/frutas.png', 'price' => 1590, 'stock' => 10],
        ];

        foreach ($produtos as $p) {
            Product::create($p);
        }
    }
}