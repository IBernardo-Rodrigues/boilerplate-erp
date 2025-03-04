<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createRoles();
        $this->createPermissions();
    }

    private function createPermissions()
    {
        $array = Permission::defaultPermissions();

        $percorrerArray = function ($array) use (&$percorrerArray) {
            foreach ($array as $value) {
                if (is_array($value) && !array_key_exists('name', $value)) {
                    $percorrerArray($value);
                }
                if (is_array($value) && array_key_exists('name', $value)) {
                    Permission::updateOrCreate(
                        ['name' => $value["name"]],
                        $value
                    );
                }
            }
        };

        $percorrerArray($array);

        $this->command->info('Default Permissions added.');
    }

    
    private function createRoles() 
    {
        $admin = Role::firstOrCreate(
            ['name' => 'administrador'],
        );
        
        $user = Role::firstOrCreate(
            ['name' => 'usuário'],
        );

        $admin->permissions()->sync(Permission::all());
        
        $this->command->info('Admin will have full rights');
    }
}
