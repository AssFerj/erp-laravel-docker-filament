<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar roles se não existirem
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $companyRole = Role::firstOrCreate(['name' => 'company']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Obter todas as empresas criadas
        $companies = Company::all();

        // Criar usuários
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@erp.dev',
            'password' => Hash::make('115J1|OrMt`*'),
            'company_id' => 1, // Atribui uma empresa aleatória
        ]);
        $admin->assignRole($adminRole);

        $colaborator = User::create([
            'name' => 'Colaborador',
            'email' => 'colaborador@erp.dev',
            'password' => Hash::make('125J1|OrMt`*'),
            'company_id' => 1, // Atribui uma empresa aleatória
        ]);
        $colaborator->assignRole($companyRole);

        $enterprise = User::create([
            'name' => 'cliente',
            'email' => 'cliente@erp.dev',
            'password' => Hash::make('135J1|OrMt`*'),
            'company_id' => 1, // Atribui uma empresa aleatória
        ]);
        $enterprise->assignRole($customerRole);

        // Criar usuários adicionais
        User::create([
            'name' => 'Colaborador 1',
            'email' => 'colaborador1@erp.dev',
            'password' => Hash::make('password'),
            'company_id' => 2,
        ])->assignRole($companyRole);

        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@erp.dev',
            'password' => Hash::make('password'),
            'company_id' => 2,
        ])->assignRole($customerRole);

        // Criar usuários adicionais
        User::create([
            'name' => 'Colaborador 2',
            'email' => 'colaborador2@erp.dev',
            'password' => Hash::make('password'),
            'company_id' => 3,
        ])->assignRole($companyRole);

        User::create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@erp.dev',
            'password' => Hash::make('password'),
            'company_id' => 3,
        ])->assignRole($customerRole);
    }
}
