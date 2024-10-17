<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            ['name' => 'Cardiology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Neurology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Orthopedics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pediatrics', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oncology', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
