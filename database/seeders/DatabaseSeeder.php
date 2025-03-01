<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            PermissionSeeder::class,
            // RoleHasPermissionSeeder::class,
            // ModelHasRoleSeeder::class,
            PlanSeeder::class,
            CompanySeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            ProductSeeder::class,
            PaymentSeeder::class,
            StockSeeder::class,
            SupplieSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
