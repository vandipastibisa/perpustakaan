@extends('layout.app')

@section('title', 'Buku')

@section('content')
 <section class="section">
    <div class="section-header">
        <h4>Buku</h4>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>BUKU</h4>
                <div class="card-header-form">
                    <a href="{{route('buku.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Tambah data </a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th style="width:5%" >#</th>
                            <th >Kode</th>
                            <th >Judul</th>
                            <th >Isbn</th>
                            <th>Pengarang</th>
                            <th>Jumlah Halaman</th>
                            <th >Stok</th>
                            <th >Tahun Terbit</th>
                            <th >Sinopsis</th>
                            <th>Gambar</th>
                            <th style="width:11%" >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buku as $buk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{!! DNS1D::getBarcodeHTML('$' .$buk->kode, 'C39+',1,25)!!}</td>
                            <td>{{$buk->judul}}</td>
                            <td>{{$buk->isbn}}</td>
                            <td>{{$buk->pengarang}}</td>
                            <td>{{$buk->jumlah_halaman}}</td>
                            <td>{{$buk->stok}}</td>
                            <td>{{$buk->tahun_terbit}}</td>
                            <td>{{$buk->sinopsis}}</td>
                            <td><img src="{{asset('/storage/buku/'.$buk->gambar)}}" class="rounded" style="width: 50px"></td>
                            <td>
                                   <form action="/buku/{{$buk->id}}" method="POST"  id="delete-form{{$buk->id}}">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('buku.edit',$buk->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger fa fa-trash" onclick="confirmDelete('delete-form{{$buk->id}}')"></button>
                                    </form> 
                                </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
 </section>

@endsection

@push('script')
<script>
    function confirmDelete(formId)
    {
    event.preventDefault();
    swal({
           title: 'Yakin ?',
           text: 'Data ini akan Hapus',
           icon: 'warning',
           buttons: true,
           dangerMode: true,
        })
        .then((willDelete)=>{
            if(willDelete){
                document.getElementById(formId).submit()
            }
        });

    }
</script>
@endpush

@push('script')
 <script>
    $(document).ready(function() {
        $('#table').dataTable();
    })
 </script>
@endpush