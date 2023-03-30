<?php

namespace App\Http\Controllers\Api\Authenticate;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Models\TicketCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketCategoryResource;

class TicketCategoryController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TicketCategoryResource::collection(
            TicketCategory::all()
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
            'category' => ['required', 'string', 'max:255']
        ]);
        if ($validated) {
            $ticketCategory = new TicketCategory();
            $ticketCategory->category = $request->category;
            $ticketCategory->save();
        }
        return new TicketCategoryResource($ticketCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(TicketCategory $ticketCategory)
    {
        return new TicketCategoryResource($ticketCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TicketCategory $ticketCategory)
    {
        if ($this->isAuthorized()) {
            return  $this->isAuthorized();
        }
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:255']
        ]);
        if ($validated) {
            TicketCategory::where('id', $ticketCategory->id)
                ->update([
                    'name' => $request->name,
                ]);
        }
        $updatedTicketCategory = TicketCategory::findOrFail($ticketCategory->id);
        return new TicketCategoryResource($updatedTicketCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TicketCategory $ticketCategory)
    {
        $ticketCategory->delete();

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
