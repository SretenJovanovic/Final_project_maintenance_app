<?php

namespace App\Http\Controllers\Api\Authenticate;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UsersResource::collection(
            User::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }

        $request->validated($request->all());

        $user = new User();
        $userService = new UserService();
        $userService->storeUser($request, $user);

        return new UsersResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UsersResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }

        $userService = new UserService();
        $userService->updateUser($request, $user);

        $updatedUser = User::findOrFail($user->id);
        return new UsersResource($updatedUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->isAuthorized() ? $this->isAuthorized() : response()->json([
            'succes' => 'Request was successfull.',
            'message' => 'User deleted.'
        ]);
    }

    private function isAuthorized()
    {

        if (auth()->user()->role->type != 'admin' && auth()->user()->role->type != 'manager') {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
