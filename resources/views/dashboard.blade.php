@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text1">{{$visitor}}</div>
                        <div class="text4">Pengunjung</div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="iconify text-danger" data-icon="bx:bxs-bar-chart-alt-2" data-inline="true"
                            data-width="65" data-height="65"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text1">{{$count_produk}}</div>
                        <div class="text4">Produk</div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="iconify text-primary" data-icon="fa-solid:shopping-basket" data-inline="true"
                            data-width="65" data-height="65"></span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text1">{{$count_testi}}</div>
                        <div class="text4">Testimoni</div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="iconify" data-icon="foundation:comment-quotes" data-inline="true" data-width="65"
                            data-height="65"></span> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="text1">{{$count_kategori}}</div>
                        <div class="text4">Kategori</div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="iconify text-secondary" data-icon="bx:bxs-category-alt" data-inline="true"
                            data-width="65" data-height="65"></span> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="text2">
                    Produk
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-primary table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">harga</th>
                                <th scope="col">Pengunjung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $p)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <img src="{{ Storage::url($p->foto_utama)}}"
                                        style="width: 80px; height: 80px; margin: 0 .2rem;" alt="">
                                </td>
                                <td>{{$p->nama_produk}}</td>
                                <td>Rp.{{$p->harga}}</td>
                                <td>{{$p->visitor}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="text2">Testimoni</div>
            </div>
            <div class="card-body">
                @foreach ($testi as $t)
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="{{ Storage::url($t->foto)}}" style="width: 100%; height: auto;" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="text3">{{$t->nama}}</h5>
                                <p class="text6">{{$t->komentar}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
