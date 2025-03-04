<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:users_create', only: ['create', 'store']),
            new Middleware('permission:users_edit', only: ['edit', 'update']),
            new Middleware('permission:users_view', only: ['show', 'index']),
            new Middleware('permission:users_delete', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $users = User::when($request->name, function(Builder $query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })
        ->when($request->email, function(Builder $query, $email) {
            $query->where('email', $email);
        })
        ->when($request->role, function(Builder $query, $role) {
            $query->whereHas('roles', function(Builder $query) use($role) {
                $query->where('id', $role);
            });
        })
        ->orderBy('name')->paginate(25);

        $roles = Role::orderBy('name')->get();

        return view('users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate($this->rules($request));

        DB::transaction(function() use($request) {
            $inputs = $request->except('password');

            $password = "123456";
            $inputs['password'] = bcrypt($password);
            $user = User::create($inputs);

            $role = Role::find($request->role)->name;

            $user->assignRole($role);
        });

        return redirect()
                ->route('users.index')
                ->with('success', 'Registro adicionado com sucesso!');

    }

    public function show(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        return view('users.show', compact('user'));
    }

    public function edit(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $roles = Role::orderBy('name')->get();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate($this->rules($request, $userId));

        $inputs = $request->except('role');

        $user->fill($inputs)->save();

        $role = Role::find($request->role)->name;
        $user->syncRoles($role);

        return redirect()
                ->route('users.index')
                ->with('success', 'Registro atualizado com sucesso!');
    }
    
    public function destroy(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
            return redirect()->route('users.index')
                ->with('success', 'Registro apagado com sucesso.');
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('users.index')
                ->with('error', 'Não foi possível deletar esse registro.');
        }
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($primaryKey)],
            'role' => ['required', 'integer'],
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
