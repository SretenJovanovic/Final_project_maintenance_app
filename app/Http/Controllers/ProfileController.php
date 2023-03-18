<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('user','role')->get();
        return view('profiles.index')->with(
            [
                'profiles' => $profiles
            ]
        );
    }
}
