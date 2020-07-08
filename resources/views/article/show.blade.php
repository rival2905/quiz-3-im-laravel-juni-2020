@extends('layouts.master')

{{-- Page title --}}
@section('title')
    Artikel
    @parent
@endsection


@section('content')

<div class="card">
      
    <div class="card-header">
        <h3 class="card-title">{{$data->title}}</h3>
            {{$data->slug}}
        <br>Author : {{$data->name}}
    </div>
      <!-- /.card-header -->
    <div class="card-body" style="font-size : 17px">      
        {{$data->content}} 
        <br>&nbsp; 
        <p >
      
        @foreach($data->tags as $dat)
            <button class="btn btn-sm btn-success">{{$dat->tag_name}}</button>
        @endforeach
        </p>   
    </div>
      <!-- /.card-body -->
</div>    
@endsection

