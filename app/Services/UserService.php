<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use App\Models\UserContactInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserService
{

    public function storeUser(UserStoreRequest $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {

            $hashedPassword = Hash::make($request->password);

            $user->username = $request->input('username');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = $hashedPassword;
            $user->role_id = $request->input('role');

            $user->save();
        });
    }
    public function updateUser(UserUpdateRequest $request, User $user)
    {
        DB::transaction(function () use ($request, $user) {
            $hashedPassword = Hash::make($request->password);

            User::where('id', $user->id)
                ->update([
                    'username' => $request->input('username'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'password' => $hashedPassword,
                    'role_id' => $request->input('role')
                ]);
        });
    }
}
