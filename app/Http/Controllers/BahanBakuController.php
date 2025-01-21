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
        $bahan_baku = bahan_baku::all();
        return view('pages.bahan_baku.index', compact('bahan_baku'));
    }

    public function create()
    {
        return view('pages.bahan_baku.add');
    }
    public function store(Request $request, bahan_baku $bahan_baku)
    {
        $request->validate([
            'bahan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);

        $bahan_baku->bahan = $request->bahan;
        $bahan_baku->jumlah = $request->jumlah;
        $bahan_baku->harga = $request->harga;
        $bahan_baku->satuan = $request->satuan;
        $bahan_baku->save();

        return redirect()->route('bahan_baku.index')->with('success', 'Bahan baku berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $data = bahan_baku::findOrFail($id);
        return view('pages.bahan_baku.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bahan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
        ]);
        $bahan_baku = bahan_baku::findOrFail($id);

        $bahan_baku->bahan = $request->input('bahan');
        $bahan_baku->jumlah = $request->input('jumlah');
        $bahan_baku->harga = $request->input('harga');
        $bahan_baku->satuan = $request->input('satuan');

        $bahan_baku->update();
        return redirect()->route('bahan_baku.index')->with('success', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = bahan_baku::findOrFail($id);
        $data->delete();
        return redirect()->route('bahan_baku.index')->with('success', 'bahan_baku Deleted Successfully');
    }
}
