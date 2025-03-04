<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index() {
        $user = User::find(auth()->id());

        return view('profile.index', compact('user'));
    }

    public function update(Request $request) {
        $user = User::find(auth()->id());

        $this->validate($request, $this->rules($request, $user->id));
        
        $inputs = $request->all(); 

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $image = $request->file('profile_image');

            $path = $image->store('images', 'public');

            $inputs['profile_img'] = $path;
        }
        
        $user->fill($inputs)->save();

        return redirect()->route('profile.index')
            ->with('success', 'Perfil atualizado com sucesso.');
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'profile_image' => ['nullable', 'file'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($primaryKey)]
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
