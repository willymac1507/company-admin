<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Company::pluck('id') as $companyId) {
            Employee::factory(20)->create([
                'company_id' => $companyId
            ]);
        }

    }
}
