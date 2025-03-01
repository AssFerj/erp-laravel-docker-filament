<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stocks = [
            ['company_id' => 1, 'product_id' => 1, 'quantity' => 100],
            ['company_id' => 1, 'product_id' => 2, 'quantity' => 50],
            ['company_id' => 1, 'product_id' => 3, 'quantity' => 75],
            ['company_id' => 2, 'product_id' => 1, 'quantity' => 200],
            ['company_id' => 2, 'product_id' => 2, 'quantity' => 150],
            ['company_id' => 2, 'product_id' => 3, 'quantity' => 100],
            // Adicione mais registros conforme necessário
        ];

        foreach ($stocks as $stockData) {
            Stock::create($stockData);
        }
    }
}
