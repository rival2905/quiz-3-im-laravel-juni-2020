@extends('layouts.master')
{{-- Page title --}}
@section('title')
    Categories
    @parent
@endsection

@section('content')
    <div class="ml-3 mt03">
        <form action="/categories/{{$categories->id}}" method="post">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input class="form-control" type="text" name="name"  value="{{$categories->name}}">
                <input class="btn btn-primary mt-2" type="submit" value="Edit Category">
            </div>
        </form>
    </div>
@endsection