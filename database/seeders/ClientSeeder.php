<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Company;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = \App\Models\Company::all();
        foreach ($companies as $company) {
            Client::factory()->count(5)->create(['company_id' => $company->id]); // 5 Clients por Company
        }
    }
}
