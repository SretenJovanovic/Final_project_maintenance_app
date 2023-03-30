<?php

namespace App\Http\Controllers\Api\Authenticate;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthenticationService;

class AuthController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function login(LoginRequest $request)
    {
        $request->validated($request->all());
        $service = new AuthenticationService();

        $success = $service->login(
            'web',
            $request->email,
            $request->password
        );
        if (!$success) {
            return $this->error('', 'Credentials do not match.', 401);
        }
        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->username)->plainTextToken
        ]);
    }


    public function logout(string $id)
    {
        //
    }
}
