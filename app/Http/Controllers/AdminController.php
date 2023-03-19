<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Profile;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index()
    {

        return view('admin.index')->with([
            'user' => auth()->user()
        ]);
    }
}
