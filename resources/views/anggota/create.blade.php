@extends('layout.app')

@section('title', 'Tambah Data Anggota')

@section('content')
 <section class="section">
    <div class="section-header">
        <h4>Anggota</h4>
    </div>

    <div class="section-body">
        <div class="card">
         <div class="card-header">
            <h4>Tambah Data Anggota</h4>
         </div>   

    <div class="card-body">
        <form action="{{route('anggota.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" id="kode" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
            </div>    

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                </div>
            </div>    

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="telepon">Telepon</label>
                    <input type="number" name="telepon" id="telepon" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                </div>
            </div>    

            <div class="row">
                <div class="form-group col-md-8">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group col-md-4">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div> 

                <button type="submit" class="btn btn-success"><i class="far fa-save"></i>Simpan</button>
            </form>  
            </div>
        </div>  
    </div>
   </section>
@endsection