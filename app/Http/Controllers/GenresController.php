<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('management.genres.index', compact('genres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect()->route('management.genres.index')
                         ->with('success', 'Genre created successfully.');
    }

    public function edit(Genre $genre)
    {
        return view('management.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name,' . $genre->id,
        ]);

        $genre->update($validatedData);

        return redirect()->route('management.genres.index')
                         ->with('success', 'Genre updated successfully.');
    }

    public function destroy(Genre $genre)
    {
        // dd($genre);
        $genre->delete();

        return redirect()->route('management.genres.index')
                         ->with('success', 'Genre deleted successfully.');
    }
}

