<?php

namespace App\Http\Controllers;

use App\Models\biaya_variabel;
use Illuminate\Http\Request;

class BiayaVariabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biaya_variabel = biaya_variabel::all();
        return view('pages.biaya_variabel.index', compact('biaya_variabel'));
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
    public function store(Request $request, biaya_variabel $biaya_variabel)
    {
        $request->validate([
            'jenis_biaya' => '',
            'jumlah' => '',
            'harga' => '',
            'satuan' => '',
            'total' => '',
        ]);

        $biaya_variabel->jenis_biaya = $request->jenis_biaya;
        $biaya_variabel->jumlah = $request->jumlah;
        $biaya_variabel->harga = $request->harga;
        $biaya_variabel->satuan = $request->satuan;
        $biaya_variabel->total = $request->total;
        $biaya_variabel->save();

        return redirect()->route('biaya_variabel.index')->with('success', 'Bahan baku berhasil ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
