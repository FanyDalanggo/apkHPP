<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');
        $kategori = kategori::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);
    
        return view('pages.kategori.index', compact('kategori'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = kategori::FindOrFail($id);
        return view('pages.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        $kategori = kategori::findOrFail($id);

        $kategori->nama = $request->input('nama');

        $kategori->update();
        return redirect()->route('kategori.index')->with('success', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = kategori::FindOrFail($id);
        $data->delete();
        return redirect()->route('kategori.index')->with('success', 'data berhasil dihapus');
    }
}
