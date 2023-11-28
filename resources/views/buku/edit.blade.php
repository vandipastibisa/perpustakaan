@extends('layout.app')

@section('title','Edit Data Buku')

@section('content')

<section class="section">
    <div class="section-header">
        <h4>Buku</h4>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Buku</h4>
            </div>

            <div class="card-body">
            <form action="{{route('buku.update', $buku->id)}}" enctype="multipart/form-data"  method="POST">
               @method('PUT')
                @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" id="class" class="form-control" value="{{$buku->kode}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="class" class="form-control" value="{{$buku->judul}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id" class="form-control" value="{{$buku->kategori}}">
                            @foreach($kategori as $kt)
                                <option value="{{$kt->id}}">{{$kt->nama}}</option>
                             @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                                <label for="penerbit_id">Penerbit</label>
                                <select name="penerbit_id" id="penerbit_id" class="form-control" value="{{$buku->penerbit}}">
                                @foreach($penerbit as $pb)
                                <option value="{{$pb->id}}">{{$pb->nama}}</option>
                                @endforeach
                                </select>
                            </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="isbn">ISBN</label>
                            <input type="number" name="isbn" id="isbn" class="form-control" value="{{$buku->isbn}}">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" id="pengarang" class="form-control" value="{{$buku->pengarang}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="jumlah_halaman">Jumlah Halaman</label>
                            <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control" value="{{$buku->jumlah_halaman}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-control" value="{{$buku->stok}}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{$buku->tahun_terbit}}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="sinopsis">Sinopsis</label>
                           <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control">{{$buku->sinopsis}}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file"  value="{{$buku->gambar}}">
                        </div>
                    </div>

                    <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-save"></i>Update</button>
                </form>

            </div>

        </div>
</section>
@endsection