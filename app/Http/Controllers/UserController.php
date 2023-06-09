<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->paginate(6);

        return view('user.index')->with(
            [
                'users' => $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $userService = new UserService();
        $userService->storeUser($request, $user);

        return redirect()->route('users.index')->withSuccess('User stored successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        
        $this->isAllowedUser();
        $role = $user->role->type;

        return view('user.show')->with([
            'user' => $user,
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->isAllowedUser();
        $roles = Role::all();

        return view('user.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->isAllowedUser();
        $userService = new UserService();
        $userService->updateUser($request, $user);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->isAllowedUser();
        User::where('id', $user->id)
            ->delete();
        return redirect()->route('users.index');
    }

    protected function isAllowedUser(){
        if (auth()->user()->role->type != 'admin' && auth()->user()->role->type != 'manager') {
            abort(403, 'Unauthorized Action');
        }
    }
}
