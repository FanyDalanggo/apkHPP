<?php

namespace App\Http\Controllers;

use App\Models\BiayaPenyusutan;
use Illuminate\Http\Request;

class BiayaPenyusutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');

        $biaya_penyusutan = BiayaPenyusutan::when($search, function ($query, $search) {
            return $query->where('jenis_biaya', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pages.biaya_penyusutan.index', compact('biaya_penyusutan', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.biaya_peyusutan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_biaya' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'masa_penyusutan' => 'required',
            'total' => 'required|numeric',
        ]);

        BiayaPenyusutan::create($validateData);

        return redirect()->route('biaya_penyusutan.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = BiayaPenyusutan::findOrFail($id);
        return view('pages.biaya_peyusutan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'jenis_biaya' => 'required',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'masa_penyusutan' => 'required',
            'total' => 'required|numeric',
        ]);

        $biaya_penyusutan = BiayaPenyusutan::findOrFail($id);

        $biaya_penyusutan->update($validateData);

        return redirect()->route('biaya_penyusutan.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiayaPenyusutan $biaya_penyusutan)
    {
        $biaya_penyusutan->delete();

        return redirect()->route('biaya_penyusutan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
