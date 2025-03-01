<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sales = [
            ['company_id' => 1, 'client_id' => 1, 'product_id' => 1, 'quantity' => 2, 'total_price' => 200.00],
            ['company_id' => 1, 'client_id' => 2, 'product_id' => 2, 'quantity' => 1, 'total_price' => 100.00],
            ['company_id' => 1, 'client_id' => 3, 'product_id' => 3, 'quantity' => 3, 'total_price' => 300.00],
            ['company_id' => 2, 'client_id' => 1, 'product_id' => 1, 'quantity' => 1, 'total_price' => 100.00],
            ['company_id' => 2, 'client_id' => 2, 'product_id' => 2, 'quantity' => 2, 'total_price' => 200.00],
            ['company_id' => 2, 'client_id' => 3, 'product_id' => 3, 'quantity' => 1, 'total_price' => 150.00],
            // Adicione mais registros conforme necessário
        ];

        foreach ($sales as $saleData) {
            Sale::create($saleData);
        }
    }
}
