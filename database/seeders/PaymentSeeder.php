<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Client;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obter todas as empresas
        $companies = \App\Models\Company::all();

        foreach ($companies as $company) {
            // Obter todos os clientes da empresa
            $clients = Client::where('company_id', $company->id)->get();

            foreach ($clients as $client) {
                // Criar 5 pagamentos para cada cliente
                for ($i = 0; $i < 5; $i++) {
                    Payment::create([
                        'amount' => rand(100, 1000), // Valor aleatório entre 100 e 1000
                        'payment_method' => 'credit_card', // Método de pagamento (exemplo)
                        'company_id' => $company->id,
                        'client_id' => $client->id,
                        'plan_id' => rand(1, 3), // ID do plano aleatório entre 1 e 3
                    ]);
                }
            }
        }
    }
}
