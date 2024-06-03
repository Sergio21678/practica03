<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::where('user_id', Auth::id())->get();
        $visited = $destinations->where('visited', true);
        $pending = $destinations->where('visited', false);
        return view('destinations.index', compact('visited', 'pending'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'planned_year' => 'required|integer|min:1900|max:2100',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url'
        ]);

        Destination::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'country' => $request->country,
            'planned_year' => $request->planned_year,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'visited' => false
        ]);

        return redirect()->route('destinations.index');
    }

    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'planned_year' => 'required|integer|min:1900|max:2100',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'visited' => 'required|boolean'
        ]);

        $destination->update($request->all());

        return redirect()->route('destinations.index');
    }

    public function toggleVisited(Destination $destination)
    {
        $destination->visited = !$destination->visited;
        $destination->save();

        return redirect()->route('destinations.index');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('destinations.index');
    }
}


