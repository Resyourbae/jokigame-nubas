<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(10);
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', $validated['name']) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/games'), $filename);
            $validated['image'] = $filename;
        }

        Game::create($validated);
        return redirect()->route('admin.games.index')->with('success', 'Game berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, string $id)
    {
        $game = Game::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($game->image && file_exists(public_path('uploads/games/' . $game->image))) {
                unlink(public_path('uploads/games/' . $game->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . str_replace(' ', '_', $validated['name']) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/games'), $filename);
            $validated['image'] = $filename;
        }

        $game->update($validated);
        return redirect()->route('admin.games.index')->with('success', 'Game berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('admin.games.index')->with('success', 'Game berhasil dihapus!');
    }
}
