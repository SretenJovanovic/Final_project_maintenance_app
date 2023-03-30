<?php

namespace App\Http\Controllers\Api\Authenticate;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\RolesResource;

class RolesController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RolesResource::collection(
            Role::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }
        $validated = $request->validate([
            'type' => ['required', 'string', 'in:admin,manager,operator,technician,employee']
        ]);
        if ($validated) {
            $role = new Role();
            $role->type = $request->type;
            $role->save();
        }
        return new RolesResource($role);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return new RolesResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }
        $validated = $request->validate([
            'type' => ['required', 'string', 'in:admin,manager,operator,technician,employee']
        ]);
        if ($validated) {
            Role::where('id', $role->id)
                ->update([
                    'type' => $request->type,
                ]);
        }
        $updatedRole = Role::findOrFail($role->id);
        return new RolesResource($updatedRole);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return $this->isAuthorized() ? $this->isAuthorized() : response()->json([
            'succes' => 'Request was successfull.',
            'message' => 'Role deleted.'
        ]);
    }

    private function isAuthorized()
    {

        if (auth()->user()->role->type != 'admin' && auth()->user()->role->type != 'manager') {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
