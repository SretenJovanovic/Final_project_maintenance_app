<?php

namespace App\Http\Controllers\Api\Authenticate;

use App\Models\Equipement;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Services\EquipementService;
use App\Http\Controllers\Controller;
use App\Http\Resources\EquipementsResource;
use App\Http\Requests\EquipementStoreRequest;
use App\Http\Requests\EquipementUpdateRequest;

class EquipementController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EquipementsResource::collection(
            Equipement::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipementStoreRequest $request)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }

        $request->validated($request->all());

        $equipement = new Equipement();
        $equipementService = new EquipementService();
        $equipementService->storeEquipement($request, $equipement);


        return new EquipementsResource($equipement);
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipement $equipement)
    {
        return new EquipementsResource($equipement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipementUpdateRequest $request, Equipement $equipement)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }

        $equipementService = new EquipementService();
        $equipementService->updateEquipement($request, $equipement);

        $updatedEquipement = Equipement::findOrFail($equipement->id);
        return new EquipementsResource($updatedEquipement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipement $equipement)
    {
        $equipement->delete();

        return $this->isAuthorized() ? $this->isAuthorized() : response()->json([
            'succes' => 'Request was successfull.',
            'message' => 'Equipement deleted.'
        ]);
    }

    private function isAuthorized()
    {

        if (auth()->user()->role->type != 'admin' && auth()->user()->role->type != 'manager') {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
