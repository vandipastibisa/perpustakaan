@extends('layout.app')

@section('title','kategori')

@section('content')

        <section class="section">
          <div class="section-header">
            <h1>kategori</h1>
          </div>

          <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>kategori</h4>

                    <div class="card-header-form">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-form">Tambah Data</button>
                    </div>
                </div>

                <div class="card-body">
                  <table class="table table-hover" id="table">
                    <thead>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                 </thead>

                 <tbody>
                    @foreach ($kategori as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            <form action="kategori/{{$item->id}}" method="GET" id="delete-form{{$item->id}}">
                            @method('delete')
                          <a href="/kategori/{{$item->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" onclick="confirmDelete('delete-form{{$item->id}}')"><i class="fa fa-trash"></i></button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                   
                  </tbody>    
               </table>
              </div>
            </div>
          </div>
        </section>
        @include('kategori.form')
@endsection


@push('script')
<script>
  function confirmDelete(formId){
    event.preventDefault();
    swal({
      title: 'Apakah Anda yakin?',
      text: 'Setelah dihapus, Anda tidak dapat memulihkannya!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        document.getElementById(formId).submit();
      }
    });
  }
</script>
@endpush



@push('script')
 <script>
   $(document).ready(function(){
      $('#table').DataTable();
   });
   </script>
@endpush