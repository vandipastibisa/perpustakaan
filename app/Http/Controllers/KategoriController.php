<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class KategoriController extends Controller
{
  public function index()
  {
    $kategori = category::all();

    return view('kategori.index', compact('kategori'));
  }
   
    public function store(Request $request)
  {
      //dd($request->all());

      $kategori = new category;
      $kategori->kode = $request->kode;
      $kategori->nama = $request->nama;

      $kategori->save();

      return redirect('kategori')->with('sukses', 'Data berhasil disimpan');
      
  }
  public function edit($id)
  {
    $kategori = category::find($id);
    return view('kategori.edit' , compact('kategori'));
  }

  public function update(Request $request, $id)
  {
    $kategori = category::find($id);
    $kategori->kode = $request->kode;
    $kategori->nama = $request->nama;
    $kategori->update();

    return redirect('kategori')->with('sukses','Data berhasil diupdate');;


  }
  public function destroy($id)
  {
    $kategori = category::find($id);
    $kategori->delete();

    return redirect('kategori')->with('sukses','Data berhasil dihapus');;
  }

  
  
}