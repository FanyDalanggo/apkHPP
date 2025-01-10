<?php

namespace App\Http\Controllers;

use App\Models\bahan_baku;
use App\Models\satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahan_baku = bahan_baku::with('satuan')->get();
        return view('pages.bahan_baku.index', compact('bahan_baku'));
    }

    public function create()
    {
        $jenis = DB::table('t_jenis_bahan')->get();
        $satuan = DB::table('t_satuan')->get();
        return view('pages.bahan_baku.add', compact('jenis', 'satuan'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_bahan' => 'required|string|max:255',
        //     'id_satuan' => 'required|exists:satuans,id',
        //     'id_jenis_bahan' => 'required|exists:jenis_bahans,id',
        // ]);

        // BahanBaku::create([
        //     'bahan_baku' => $request->bahan_baku,
        //     'id_satuan' => $request->satuan,
        //     'id_jenis_bahan' => $request->jenis,
        // ]);
        DB::table('t_bahan_baku')->insert([
            'bahan_baku' => $request->bahan_baku,
            'id_satuan' => $request->satuan,
            'id_jenis_bahan' => $request->jenis,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga
        ]);

        return redirect()->route('bahan_baku.index')->with('success', 'Bahan baku berhasil ditambahkan!');
    }
    public function edit($id)
    {

        $bahan_baku = \App\Models\bahan_baku::findOrFail($id);
        return view('pages.bahan_baku.edit', compact('bahan_baku'));
    }
    public function destroy($id)
    {
        $product = \App\Models\bahan_baku::findOrFail($id);
        $product->delete();
        return redirect()->route('bahan_baku.index')->with('success', 'bahan_baku Deleted Successfully');
    }
}
