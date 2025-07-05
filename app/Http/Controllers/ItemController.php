<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // ambil semua data barang dari database
        return view('items.index', compact('items')); // arahkan ke view items/index.blade.php
    }
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|unique:items',
            'name' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan!');

    }
    // Tampilkan form edit
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Proses update data
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|unique:items,kode_barang,' . $item->id,
            'name' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Hapus barang
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus!');
    }

    // Cari barang
    public function search(Request $request)
    {
        $keyword = $request->query('keyword');

        $items = Item::where('name', 'like', "%$keyword%")->get();

        return view('items.index', compact('items'));
    }

}




