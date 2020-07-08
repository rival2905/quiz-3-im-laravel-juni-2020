@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Add Artikel
    @parent
@endsection


@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Artikel</h3>
    </div>
      <!-- /.card-header -->
    <div class="card-body">      
        <form action="/artikel" method="POST">
        @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" placeholder="Enter Judul" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Isi:</label>
                <textarea id="content" class="form-control" placeholder="Enter content" name="content"></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="content">Tag:</label>
                
                <br><input type="checkbox" name="tag[]"  value="Event" /> Event
                <br><input type="checkbox" name="tag[]"  value="Info" /> Info
                <br><input type="checkbox" name="tag[]"  value="Web" /> Web
                <br><input type="checkbox" name="tag[]"  value="PHP" /> PHP
                <br><input type="checkbox" name="tag[]"  value="Laravel" /> Laravel
                
            </div> -->
            <div class="form-group">
                <label for="category_id">Kategori:</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $key => $data)
                        <option value="{{$data->id}}"> {{$data->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags:</label>
                <input type="text" class="form-control" placeholder="Enter Judul" id="tags" name="tags">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
      <!-- /.card-body -->
</div>    
@endsection

