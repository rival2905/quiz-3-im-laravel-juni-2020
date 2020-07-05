@extends('layouts.master')

{{-- Page title --}}
@section('title')
    ERD
    @parent
@endsection

{{-- Page content --}}
@section('content')
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ERD</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <img class="rounded-square" src="{{asset('sbadmin2/img/erd.png')}}" alt="">
      </div>
      <!-- /.card-body -->
    </div>

@endsection
