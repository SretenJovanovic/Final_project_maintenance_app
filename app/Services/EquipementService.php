<?php

namespace App\Services;

use App\Models\Equipement;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EquipementStoreRequest;
use App\Http\Requests\EquipementUpdateRequest;
// use App\Http\Requests\UserUpdateRequest;

class EquipementService
{

    public function storeUser(EquipementStoreRequest $request, Equipement $equipement)
    {
        DB::transaction(function () use ($request, $equipement) {

            $equipement->name = $request->input('name');
            $equipement->manufacturer = $request->input('manufacturer');
            $equipement->model = $request->input('model');
            $equipement->serial = $request->input('serial');
            $equipement->description = $request->input('description');
            $equipement->section_id = $request->input('section');

            $equipement->save();
        });
    }
    public function updateEquipement(EquipementUpdateRequest $request, Equipement $equipement)
    {
        DB::transaction(function () use ($request, $equipement) {

            Equipement::where('id', $equipement->id)
                ->update([
                    'name' => $request->input('name'),
                    'manufacturer' => $request->input('manufacturer'),
                    'model' => $request->input('model'),
                    'serial' => $request->input('serial'),
                    'description' => $request->input('description'),
                    'section_id' => $request->input('section')
                ]);
        });
    }
}
