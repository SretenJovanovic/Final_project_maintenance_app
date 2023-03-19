<?php
namespace App\Http\Controllers\Authenticate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }
}
