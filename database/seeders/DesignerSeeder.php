<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'designer',
            'email' => 'designer@yopmail.com',
            'password' => bcrypt('12345678'),
            'type' => 1,
        ]);
    }
}
