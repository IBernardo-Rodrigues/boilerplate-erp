<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function edit() {
        return view('change-password.edit');
    }

    public function update(Request $request) {
        $request->validate($this->rules($request));

        $user = User::find(auth()->id());

        $user->update(['password' => bcrypt($request->new_password)]);

        return redirect()->route('change-password.edit')
            ->with('success', 'Senha atualizada com sucesso.');
    }

    private function rules(Request $request, $primaryKey = null, bool $changeMessages = false)
    {
        $rules = [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'confirmed'],
        ];

        $messages = [];

        return !$changeMessages ? $rules : $messages;
    }
}
