<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{


    public function index()
    {
        $equipements = Equipement::all();
        return view('equipement.index')->with([
            'equipements' => $equipements
        ]);
    }

    public function show(Equipement $equipement)
    {

        return view('equipement.show')->with([
            'equipement' => $equipement,
        ]);
    }
}
