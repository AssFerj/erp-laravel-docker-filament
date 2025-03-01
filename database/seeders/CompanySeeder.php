<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['name' => 'Empresa A', 'email' => 'empresaA@mail.dev', 'plan_id' => 1, 'isActive' => true],
            ['name' => 'Empresa B', 'email' => 'empresaB@mail.dev', 'plan_id' => 2, 'isActive' => true],
            ['name' => 'Empresa C', 'email' => 'empresaC@mail.dev', 'plan_id' => 3, 'isActive' => true],
        ];

        foreach ($companies as $companyData) {
            Company::create($companyData);
        }
    }
}
