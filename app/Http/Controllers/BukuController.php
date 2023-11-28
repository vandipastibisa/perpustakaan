<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\category;
use App\Models\Penerbit;
use App\Models\Anggota;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    
    public function index()
    {
        $buku = Buku::all();

        return view('buku.index', compact('buku'));
    }


    public function create()
    {
        
        $kategori = category::all();
        $penerbit = Penerbit::all();
        return view('buku.create',  compact('kategori','penerbit'));
        
    }

   
    public function store(Request $request)
    {
        $image = $request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());
        Buku::create([
        'kode' => $request->kode,
        'judul' => $request->judul,
        'kategori_id' => $request->kategori_id,
        'penerbit_id' => $request->penerbit_id,
        'isbn' => $request->isbn,
        'pengarang' => $request->pengarang,
        'jumlah_halaman' => $request->jumlah_halaman,
        'stok' => $request->stok,
        'tahun_terbit' => $request->tahun_terbit,
        'sinopsis' => $request->sinopsis,
        'gambar' => $image->hashName(),
       ]);
       
       return redirect('buku')->with('sukses', 'Data berhasil disimpan');
    }

   
    public function show($id)
    {
        //
    }


    public function edit(string $id)
    {
        $buku = Buku::find($id);
        $kategori = category::all();
        $penerbit = penerbit::all();
        return view('buku.edit', compact('buku','kategori','penerbit'));
    }

    
    public function update(Request $request,  $id)
    {
        $image =$request->file('gambar');
        $image->storeAs('public/buku', $image->hashName());

        $buku = Buku::find($id);

        $buku->kode = $request->kode;
        $buku->judul = $request->judul;
        $buku->kategori_id = $request->kategori_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->jumlah_halaman = $request->jumlah_halaman;
        $buku->stok= $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->sinopsis = $request->sinopsis;
        $buku->gambar = $image->hashName();
        $buku->update();

        return redirect('buku')->with('sukses', 'Data berhasil diupdate');;
    
    }


    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('buku')->with('sukses', 'Data berhasil dihapus');

    }
    
}