<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasFactory;
    public static function defaultPermissions()
    {
        return [
            [
                'title' => 'Dashboard',
                'items' => [
                    array('name' => 'dashboard_view', 'description' => 'Visualizar')
                ]
            ],
            [
                'title' => 'Usuários',
                'items' => [
                    array('name' => 'users_view', 'description' => 'Visualizar'),
                    array('name' => 'users_create', 'description' => 'Criar'),
                    array('name' => 'users_edit', 'description' => 'Editar'),
                    array('name' => 'users_delete', 'description' => 'Deletar'),
                ]
            ],
            [
                'title' => 'Atribuições',
                'items' => [
                    array('name' => 'roles_view', 'description' => 'Visualizar'),
                    array('name' => 'roles_create', 'description' => 'Criar'),
                    array('name' => 'roles_edit', 'description' => 'Editar'),
                    array('name' => 'roles_delete', 'description' => 'Deletar'),
                ]
            ],
        ];
    }
}
