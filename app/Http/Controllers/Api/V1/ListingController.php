<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Http\Resources\ListingCollection;
use App\Http\Requests\StoreListingRequest;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct() {
        $this->authorizeResource(Listing::class, 'listing');
    }


    public function index()
    {
        $query = Listing::query()
            ->where('status', 'published')
            ->with('user');
        $listings = $query->latest()->get();
        return new ListingCollection($listings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        // $this->authorize('create', Listing::class);
        
        $request->merge(['user_id' => 1]);
        $listing = Listing::create($request->all());
        return $listing;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
