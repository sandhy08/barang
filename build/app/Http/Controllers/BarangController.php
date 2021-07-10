<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use DataTables;

class BarangController extends Controller
{
    public function data(){

        $barang = barang::all();
        return DataTables::of($barang)->toJson();
    }

    public function img($id){
        
        $barang = barang::whereId($id)->first();
        $path = storage_path('app/'. $barang->FotoBarang);
        return $path;
    }

    public function create(Request $request){

        $poto = $request->file('fotobarang');
        $path = $poto->store('public/foto');

        barang::create([
            'NamaBarang' => $request->namabarang,
            'HargaBeli' => $request->hargabeli,
            'HargaJual' => $request->hargajual,
            'Stok' => $request->stok,
            'FotoBarang' => $path,
        ]);

        return redirect()->route('index');
    }

    public function edit(Request $request, $id){

        $poto = $request->file('fotobarang');
        $path = $poto->store('public/foto');
        
        $update = barang::find($id);
        $update->NamaBarang = $request->namabarang;
        $update->HargaBeli = $request->hargabeli;
        $update->HargaJual = $request->hargajual;
        $update->Stok = $request->stok;
        $update->FotoBarang = $path;
        $update->update();

        return redirect()->route('index');
    }

    public function delete($id){

        barang::where('id', $id)->delete();

    }
}
