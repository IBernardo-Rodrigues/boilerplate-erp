<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! app()->isProduction()) {
            $user = User::create([
                'name' => 'Administrador',
                'email' => 'admin@app.com',
                'password' => bcrypt('admin')
            ]);

            $user->assignRole('administrador');
        }
    }
}
