<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:roles_create', only: ['create', 'store']),
            new Middleware('permission:roles_edit', only: ['edit', 'update']),
            new Middleware('permission:roles_view', only: ['show', 'index']),
            new Middleware('permission:roles_delete', only: ['destroy']),
        ];
    }
    
    public function index()
    {
        $roles = Role::orderBy('name')->paginate(25);

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::defaultPermissions();

        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate($this->rules($request));
        
        DB::transaction(function() use($request) {
            $inputs = $request->all();
            $inputs['name'] = strtolower($inputs['name']); 
            $role = Role::create($inputs);

            $role->givePermissionTo($request->permissions);
        });

        return redirect()
                ->route('roles.index')
                ->with('success', 'Registro adicionado com sucesso!');

    }

    public function show(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        return view('roles.show', compact('role'));
    }

    public function edit(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);

        $rolePermissions = $role->permissions()->pluck('name', 'name')->all();

        $permissions = Permission::defaultPermissions();

        return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $roleId) {
        $role = Role::findOrFail($roleId);
        
        $request->validate($this->rules($request, $role->id));

        $inputs = $request->all();
        
        DB::beginTransaction();
        $role->fill($inputs)->save();
        $role->permissions()->detach();
        $role->givePermissionTo($request->roles);
        DB::commit();

        return redirect()->route('roles.index')->with('success', 'Registro atualizado com sucesso!');
    }

    public function destroy(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId); 
        DB::beginTransaction();
        try {
            $role->delete();
            DB::commit();
            return redirect()->route('roles.index')
                ->with('success', 'Registro apagado com sucesso.');
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('roles.index')
                ->with('error', 'Não foi possível deletar esse registro.');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required', 'string'],
            'permissions' => ['required', 'array'],
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
