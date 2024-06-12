<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /* Restrict routes using constructor*/
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }


    /* Display list of lisitngs*/
    public function index()
    {
        return inertia('Listing/Index', ['listings' => Listing::all()]);
    }

    /* Display create lisitng page.*/
    public function create()
    {
        return inertia('Listing/Create');
    }

    /* Store a newly created listing into DB */
    public function store(Request $request)
    {
        //Listing::create($request->all());
        //Listing::create(
        //listings() is from \App\Models\User.php
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:20|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|integer|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000'
            ]),
        );
        return redirect()->route('listing.index')->with(['success'=> 'Listing was created!']);
    }

    /* Display detailed listing page with selected lisitng id */
    public function show(Listing $listing)
    {
        return inertia('Listing/Show', [
            'listing' => $listing
        ]);
    }

    /* Display edit lisitng page */
    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit', [
            'listing' => $listing
        ]);
    }

    /* Update the specified lisitng into DB */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:1|max:20',
                'baths' => 'required|integer|min:1|max:20',
                'area' => 'required|integer|min:20|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|integer|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000'
            ]),
        );

        return redirect()->route('listing.index')->with('success', 'Listing was updated!');
    }

    /* Remove the specified listing from DB */
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect()->back()->with('success', 'Listing was deleted!');
    }
}
