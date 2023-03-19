<?php


namespace App\Services;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{

    public function login(string $guard, string $email, string $password): bool
    {
        return Auth::guard($guard)->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function userRole()
    {
        $role = auth()->user()->role->type;
       
        return $role;
    }
    public function logout(string $guard)
    {
        Auth::guard($guard)->logout();
        session()->flush();
        session()->regenerate();
    }
}
