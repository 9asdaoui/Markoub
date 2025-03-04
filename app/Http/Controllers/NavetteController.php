<?php

namespace App\Http\Controllers;

use App\Models\Navette;
use Illuminate\Http\Request;

class NavetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get a list of cities for search dropdowns
        $cities = Navette::select('departure_city')
            ->distinct()
            ->pluck('departure_city')
            ->merge(Navette::select('arrival_city')
                ->distinct()
                ->pluck('arrival_city'))
            ->unique()
            ->values()
            ->all();
        
        // Get popular navettes (limiting to 6 for display)
        $popularNavettes = Navette::with('company')
            ->where('departure_time', '>=', now()->toDateString())
            ->orderBy('departure_time')
            ->limit(6)
            ->get();
        return view('navettes.home', compact('cities', 'popularNavettes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Navette $navette)
    {
        // Load navette with related company information
        $navette->load('company');

        // Get similar navettes (same route, future dates)
        $similarNavettes = Navette::with('company')
            ->where('departure_city', $navette->departure_city)
            ->where('arrival_city', $navette->arrival_city)
            ->where('id', '!=', $navette->id)
            ->where('departure_time', '>=', now()->toDateString())
            ->orderBy('departure_time')
            ->limit(5)
            ->get();

        return view('navettes.show', compact('navette', 'similarNavettes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Navette $navette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Navette $navette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Navette $navette)
    {
        //
    }
    /**
     * Search for navettes based on criteria.
     */
    public function search(Request $request)
    {
        $request->validate([
            'departure_city' => 'nullable|string',
            'arrival_city' => 'nullable|string',
            'departure_date' => 'nullable|date',
        ]);

        $query = Navette::with('company');

        if ($request->filled('departure_city')) {
            $query->where('departure_city', $request->departure_city);
        }

        if ($request->filled('arrival_city')) {
            $query->where('arrival_city', $request->arrival_city);
        }

        if ($request->filled('departure_date')) {
            $query->whereDate('departure_time', $request->departure_date);
        } else {
            // If no date selected, only show future navettes
            $query->where('departure_time', '>=', now()->toDateString());
        }

        $navettes = $query->orderBy('departure_time')->paginate(10);
        
        // Get cities for the search form
        $cities = Navette::select('departure_city')
            ->distinct()
            ->pluck('departure_city')
            ->merge(Navette::select('arrival_city')
                ->distinct()
                ->pluck('arrival_city'))
            ->unique()
            ->values()
            ->all();

        return view('navettes.search-results', [
            'navettes' => $navettes,
            'cities' => $cities,
            'searchParams' => $request->only(['departure_city', 'arrival_city', 'departure_date']),
        ]);
    }
}
