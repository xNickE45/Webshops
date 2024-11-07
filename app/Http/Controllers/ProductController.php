<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->is_admin == 0) {
            return redirect()->route('home');
        }

        $consoles = Console::all();
        return view('admin/index' )->with('consoles', $consoles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
        ]);
        $imagePath = $request->file('image_url')->store('images', 'public');

        Console::create([
            'name' => $request->name,
            'image_url' => $imagePath,
            'price' => $request->price,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.index')->with('message', 'Console created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $console = Console::findOrFail($id);
        return view('admin.show', compact('console'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $console = Console::findOrFail($id);
        return view('admin.edit', compact('console'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
        ]);

        $console = Console::findOrFail($id);

        if ($request->hasFile('image_url')) {
            // Delete the old image
            Storage::disk('public')->delete($console->image_url);

            // Store the new image
            $imagePath = $request->file('image_url')->store('images', 'public');
            $console->image_url = $imagePath;
        }

        $console->name = $request->name;
        $console->price = $request->price;
        $console->amount = $request->amount;
        $console->save();

        return redirect()->route('admin.index')->with('message', 'Console updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $console = Console::findOrFail($id);
        $console->delete();

        return redirect()->route('admin.index')->with('message', 'Console deleted successfully.');
    }
}
