<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required',  'string']
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->sendError('Credenciais inválidas', 401);
        }

        $user = User::where('email', $request->only('email'))->first();

        return $this->sendResponse([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->sendResponse('Você está deslogado e seu token foi deletado.');
    }
}
