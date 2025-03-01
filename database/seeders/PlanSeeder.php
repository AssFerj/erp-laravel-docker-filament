<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar planos manualmente
        $plans = [
            [   'id' => 1,
                'name' => 'Plano Básico',
                'price' => 29.99,
                'description' => 'Plano básico com funcionalidades limitadas.',
            ],
            [
                'id' => 2,
                'name' => 'Plano Intermediário',
                'price' => 49.99,
                'description' => 'Plano intermediário com funcionalidades adicionais.',
            ],
            [
                'id' => 3,
                'name' => 'Plano Avançado',
                'price' => 99.99,
                'description' => 'Plano avançado com todas as funcionalidades disponíveis.',
            ],
        ];

        foreach ($plans as $planData) {
            Plan::create($planData);
        }
    }
}
