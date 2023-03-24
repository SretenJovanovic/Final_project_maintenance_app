<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Equipement;
use Illuminate\Http\Request;
use App\Services\EquipementService;
use App\Http\Requests\EquipementStoreRequest;
use App\Http\Requests\EquipementUpdateRequest;

class EquipementController extends Controller
{


    public function index()
    {
        $equipements = Equipement::with('section')->get();
        return view('equipement.index')->with([
            'equipements' => $equipements
        ]);
    }
    public function create()
    {
        $sections = Section::all();
        return view('equipement.create')->with([
            'sections' => $sections
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipementStoreRequest $request)
    {
        $equipement = new Equipement();
        $userService = new EquipementService();
        $userService->storeUser($request, $equipement);

        return redirect()->route('equipements.index');
    }

    public function show(Equipement $equipement)
    {

        return view('equipement.show')->with([
            'equipement' => $equipement,
        ]);
    }

    public function edit(Equipement $equipement)
    {

        $sections = Section::all();

        return view('equipement.edit')->with([
            'equipement' => $equipement,
            'sections' => $sections
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipementUpdateRequest $request, Equipement $equipement)
    {
        $equipementService = new EquipementService();
        $equipementService->updateEquipement($request, $equipement);
        return redirect()->route('equipements.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipement $equipement)
    {
        Equipement::where('id', $equipement->id)
            ->delete();
        return redirect()->route('equipements.index');
    }
}
