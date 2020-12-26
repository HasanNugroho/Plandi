@extends('adminlte::page')
@section('title', 'Produk')
@section('content_header')
    <h1>Produk</h1>
@stop

@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produk as $p)
        <tr>
          <th scope="row">1</th>
          <td>
              <img src="{{ Storage::url($p->foto_utama)}}" style="width: 100px; height: 100px; margin: 0 .2rem;" alt="">
          </td>
          <td>{{$p->nama_produk}}</td>
          <td>Rp {{$p->harga}}</td>
          <td>
              <a href="{{route('edit.produk', $p->slug)}}" class="btn btn-sm btn-warning">Edit</a>
              <a href="{{route('hapus.produk', $p->slug)}}" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@stop