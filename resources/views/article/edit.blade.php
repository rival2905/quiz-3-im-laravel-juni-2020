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
    @foreach($data as $data)    
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
                <label for="content">Tag:</label>
                
                <br><input type="checkbox" name="tag[]"  value="Event" /> Event
                <br><input type="checkbox" name="tag[]"  value="Info" /> Info
                <br><input type="checkbox" name="tag[]"  value="Web" /> Web
                <br><input type="checkbox" name="tag[]"  value="PHP" /> PHP
                <br><input type="checkbox" name="tag[]"  value="Laravel" /> Laravel
                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endforeach
    </div>
      <!-- /.card-body -->
</div>    
@endsection

