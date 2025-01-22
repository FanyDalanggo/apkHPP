<?php

namespace App\Http\Controllers;

use App\Models\KapasitasProduksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class KapasitasProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');

        $kapasitas_produksi = KapasitasProduksi::when($search, function ($query, $search) {
            return $query->where('kapasitas_perhari', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pages.kapasitas_produksi.index', compact('kapasitas_produksi', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk=Produk::all();
        return view('pages.kapasitas_produksi.add', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'produks_id' => 'required',
            'kapasitas_perhari' => 'required',
            'kapasitas_perbulan' => 'required',
            'jumlah_hari_kerja' => 'required',
        ]);
        
        KapasitasProduksi::create($validateData);

        return redirect()->route('kapasitas_produksi.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(string $id)
    {
        $produk = Produk::all();
        $kapasitas_produksi = KapasitasProduksi::findOrFail($id);
        return view('pages.kapasitas_produksi.edit', compact('kapasitas_produksi', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'produks_id' => 'required',
            'kapasitas_perhari' => 'required',
            'kapasitas_perbulan' => 'required',
            'jumlah_hari_kerja' => 'required',
        ]);

        KapasitasProduksi::where('id', $id)->update($validateData);

        return redirect()->route('kapasitas_produksi.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KapasitasProduksi $kapasitas_produksi)
    {
        $kapasitas_produksi->delete();

        return redirect()->route('kapasitas_produksi.index')->with('success', 'Data Berhasil Dihapus');
    }
}
