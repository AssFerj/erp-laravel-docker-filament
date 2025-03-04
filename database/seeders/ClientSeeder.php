<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Company;
use App\Models\Address;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            for ($i = 0; $i < 5; $i++) {
                // Criar um endereço para cada cliente
                $address = Address::create([
                    'street' => 'Rua ' . $i,
                    'city' => 'Cidade ' . $i,
                    'state' => 'Estado ' . $i,
                    'postal_code' => '00000-' . str_pad($i, 5, '0', STR_PAD_LEFT),
                ]);

                // Criar o cliente com o address_id
                Client::create([
                    'company_id' => $company->id,
                    'user_id' => null, // ou atribua um usuário se necessário
                    'address_id' => $address->id, // Atribuir o ID do endereço criado
                    'name' => 'Cliente ' . $i,
                    'email' => 'cliente' . $company->id . '_' . $i . '@example.com',
                    'phone' => '+1.206.453.847' . $i,
                ]);
            }
        }
    }
}
