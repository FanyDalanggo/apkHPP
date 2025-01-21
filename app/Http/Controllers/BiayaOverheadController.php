<?php

namespace App\Http\Controllers;

use App\Models\BiayaOverhead;
use Illuminate\Http\Request;

class BiayaOverheadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('nama');

        $biaya_overhead = BiayaOverhead::when($search, function ($query, $search) {
            return $query->where('jenis_biaya', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('pages.biaya_overhead.index', compact('biaya_overhead', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.biaya_overhead.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_biaya' => 'required',
            'jumlah' => 'required',
            
        ]);

        BiayaOverhead::create($validateData);

        return redirect()->route('biaya_overhead.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $data = BiayaOverhead::findOrFail($id);
        return view('pages.biaya_overhead.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'jenis_biaya' => 'required',
            'jumlah' => 'required|numeric',
           
        ]); 

        $biaya_overhead =BiayaOverhead::findOrFail($id);

        $biaya_overhead->update($validateData);

        return redirect()->route('biaya_overhead.index')->with('success', 'Data berhasil diubah.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BiayaOverhead $biaya_overhead)
    {
        $biaya_overhead->delete();

        return redirect()->route('biaya_overhead.index')->with('success', 'Data Berhasil Dihapus');
    }
}
