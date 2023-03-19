<?php

namespace App\Http\Controllers\Authenticate;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthenticationService;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function store(LoginRequest $request)
    {
        $service = new AuthenticationService();
        $success = $service->login(
            'web',
            $request->input('email'),
            $request->input('password')
        );
        if ($success) {
            $role = $service->userRole();
            if ($role === 'admin') {
                return redirect()->route('admin.index');
            } else if ($role === 'technician') {
                return redirect()->route('technician.index');
            } else if ($role === 'operator') {
                return redirect()->route('operator.index');
            } else {
                return redirect()->back()->withErrors([
                    'message' => 'Something went wrong...',
                ]);
            }
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Credentials not found',
            ]);
        }
    }

    public function logout()
    {

        $service = new AuthenticationService();
        $service->logout('web');

        return redirect()->route('login.show');
    }
}
