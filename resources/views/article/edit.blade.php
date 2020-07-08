@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Edit Artikel
    @parent
@endsection


@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Artikel</h3>
    </div>
      <!-- /.card-header -->
    <div class="card-body">      
       
        <form action="/artikel/{{$data->id}}" method="POST">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="{{$data->name}}" placeholder="Enter name" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" value="{{$data->title}}" placeholder="Enter Judul" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Isi:</label>
                <textarea id="content" class="form-control"  placeholder="Enter content" name="content">{{$data->content}}</textarea>
            </div>
           
            <div class="form-group">
                <label for="category_id">Kategori:</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $key => $category)
                        @if($category->id == $data->category_id)
                            <option value="{{$category->id}}" selected> {{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}"> {{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags:</label>
                <input type="text" class="form-control" value="{{$data->tag}}" placeholder="Enter Judul" id="tags" name="tags">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  
    </div>
      <!-- /.card-body -->
</div>    
@endsection

