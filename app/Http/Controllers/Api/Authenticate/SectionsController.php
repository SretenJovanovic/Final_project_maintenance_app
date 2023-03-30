<?php

namespace App\Http\Controllers\Api\Authenticate;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionsResource;

class SectionsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SectionsResource::collection(
            Section::all()
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
            'name' => ['required', 'string', 'max:255']
        ]);
        if ($validated) {
            $section = new Section();
            $section->name = $request->name;
            $section->save();
        }
        return new SectionsResource($section);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return new SectionsResource($section);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);
        if ($validated) {
            Section::where('id', $section->id)
                ->update([
                    'name' => $request->name,
                ]);
        }
        $updatedSection = Section::findOrFail($section->id);
        return new SectionsResource($updatedSection);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return $this->isAuthorized() ? $this->isAuthorized() : response()->json([
            'succes' => 'Request was successfull.',
            'message' => 'Section deleted.'
        ]);
    }

    private function isAuthorized()
    {

        if (auth()->user()->role->type != 'admin' && auth()->user()->role->type != 'manager') {
            return $this->error('', 'You are not authorized to make this request', 403);
        }
    }
}
