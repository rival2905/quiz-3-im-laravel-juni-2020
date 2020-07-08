@extends('layouts.master')
{{-- Page title --}}
@section('title')
    Categories
    @parent
@endsection

@section('content')
    <div class="ml-3 mt03">
        <form action="/categories" method="post">
        @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input class="form-control" type="text" name="name" placeholder="Enter Category name">

                <input class="btn btn-primary mt-2" type="submit" value="Create Category">
            </div>
        </form>
    </div>
@endsection