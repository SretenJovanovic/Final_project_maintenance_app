<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::with('role','profile','userContactInfo')->get();
        return view('profiles.index')->with(
            [
                'users' => $users
            ]
        );
    }
}
