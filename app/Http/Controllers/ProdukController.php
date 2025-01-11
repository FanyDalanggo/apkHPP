<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');
        $produk = Produk::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);
        
        return view('pages.produk.index', compact('produk'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('pages.produk.add', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Produk::create($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk Berhasi Dibuat');
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
        $kategori = kategori::all();
        $produk = Produk::FindOrFail($id);
        return view('pages.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $produk = Produk::FindOrFail($id);

        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk Berhasi Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Produk::FindOrFail($id);
        $data->delete();
        return redirect()->route('produk.index')->with('success', 'Produk Berhasi DiHapus');
    }
}
