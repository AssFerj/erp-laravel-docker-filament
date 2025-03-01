<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplie;

class SupplieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplies = [
            ['company_id' => 1, 'name' => 'Fornecedor A', 'email' => 'fornecedorA@example.com', 'phone' => '123456789'],
            ['company_id' => 1, 'name' => 'Fornecedor B', 'email' => 'fornecedorB@example.com', 'phone' => '987654321'],
            ['company_id' => 1, 'name' => 'Fornecedor C', 'email' => 'fornecedorC@example.com', 'phone' => '456789123'],
            ['company_id' => 2, 'name' => 'Fornecedor D', 'email' => 'fornecedorD@example.com', 'phone' => '321654987'],
            ['company_id' => 2, 'name' => 'Fornecedor E', 'email' => 'fornecedorE@example.com', 'phone' => '654321789'],
            ['company_id' => 2, 'name' => 'Fornecedor F', 'email' => 'fornecedorF@example.com', 'phone' => '789123456'],
            // Adicione mais fornecedores conforme necessário
        ];

        foreach ($supplies as $supplyData) {
            Supplie::create($supplyData);
        }
    }
}
