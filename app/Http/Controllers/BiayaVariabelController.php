<?php

namespace App\Http\Controllers;

use App\Models\BiayaVariabel;
use Illuminate\Http\Request;

class BiayaVariabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');
    
        $biaya_variabel = BiayaVariabel::when($search, function ($query, $search) {
            return $query->where('jenis_biaya', 'like', '%' . $search . '%');
        })->paginate(10);
    
        return view('pages.biaya_variabel.index', compact('biaya_variabel', 'search'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.biaya_variabel.add');
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
            'satuan' => 'required',
            'total' => 'required',
        ]);

        BiayaVariabel::create($validateData);

        return redirect()->route('biaya_variabel.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = BiayaVariabel::findOrFail($id);
        return view('pages.biaya_variabel.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validateData = $request->validate([
            'jenis_biaya' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'total' => 'required|numeric',
        ]);
    
        $biaya_variabel = BiayaVariabel::findOrFail($id);
    
        $biaya_variabel->update($validateData);
    
        return redirect()->route('biaya_variabel.index')->with('success', 'Data berhasil diubah.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiayaVariabel $biaya_variabel)
    {
        $biaya_variabel->delete();

        return redirect()->route('biaya_variabel.index')->with('success', 'Data Berhasil Dihapus');
    }
}
