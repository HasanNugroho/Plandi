@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Admin Manage</h1>
@stop

@section('content')
@if (Auth::user()->role == 'superadmin')
    <h1>hallo</h1>
@else
    <div class="container text-center">
        <div class="text1">
            KAMU BUKAN SUPERADMIN
        </div>
    </div>
@endif
@stop

@section('css')
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    console.log('Hi!');

</script>
@stop
