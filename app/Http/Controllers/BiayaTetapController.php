<?php

namespace App\Http\Controllers;

use App\Models\BiayaTetap;
use Illuminate\Http\Request;

class BiayaTetapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');

        $biaya_tetap = BiayaTetap::when($search, function ($query, $search) {
            return $query->where('jenis_biaya', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pages.biaya_tetap.index', compact('biaya_tetap', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.biaya_tetap.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_biaya' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'total' => 'required',
        ]);

        BiayaTetap::create($validateData);

        return redirect()->route('biaya_tetap.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = BiayaTetap::findOrFail($id);
        return view('pages.biaya_tetap.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'jenis_biaya' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'total' => 'required',
        ]);

        $biaya_tetap = BiayaTetap::findOrFail($id);

        $biaya_tetap->update($validateData);

        return redirect()->route('biaya_tetap.index')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiayaTetap $biaya_tetap)
    {
        $biaya_tetap->delete();

        return redirect()->route('biaya_tetap.index')->with('success', 'Data Berhasil Dihapus');
    }
}
