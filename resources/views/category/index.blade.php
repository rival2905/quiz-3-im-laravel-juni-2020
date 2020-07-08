@extends('layouts.master')
{{-- Page title --}}
@section('title')
    Categories
    @parent
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
              
            </div>
            <div class="card-body">
            <a href="/categories/create">
                <button type="submit" class="btn btn-primary">Tambah Category</button>
            </a><br>&nbsp;
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  @foreach($categories as $key => $data)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$data->name}}</td>
                    
                      <td>
                        
                        <a href="/categories/{{$data->id}}/edit"><button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></a>
                        <form action="/categories/{{$data->id}}" method="POST" style="display: inline">
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