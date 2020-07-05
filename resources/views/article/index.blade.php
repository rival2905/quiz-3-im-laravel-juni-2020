@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Articles
    @parent
@endsection

@push('link')
    <link href="{{asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

{{-- Page content --}}
@section('content')
    

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Articles</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
              
            </div>
            <div class="card-body">
            <a href="/artikel/create">
                <button type="submit" class="btn btn-primary">Tambah Artikel</button>
            </a><br>&nbsp;
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($data as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->title}}</td>
                      <td>
                        <a href="/artikel/{{$data->id}}"><button class="btn btn-sm btn-success"><i class="fas fa-search"></i></button></a>
                        <a href="/artikel/{{$data->id}}/edit"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></a>
                        <form action="/artikel/{{$data->id}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                      
                    </tr>
                   @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="{{asset('sbadmin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('sbadmin2/js/demo/datatables-demo.js')}}"></script>

<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>


@endpush