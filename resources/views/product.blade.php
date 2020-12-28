@extends('layouts.app')
@section('title', 'Plandi')
@section('css', 'produk')
@section('content')
<div style="margin-top: 70px">
    <div class="container">
        <div class="search-result">
            @if ($jenis == 'search_result')
            <div class="d-flex text2">
                <p class="text-medium">Hasil pencarian : <p class="text-dark ml-1">{{$key}}</p></p>
            </div>
            @else
            <div class="d-flex text2">
                <p class="text-medium">Semua Produk</p>
            </div>
            @endif
            
            <div class="row">
                @foreach ($produk as $produk)
                <div class="col-md-3 col-sm-4 col-6 mt-3">
                    <a href="{{route('checkout', $produk->slug)}}">
                    <div class="card">
                        <img class="img-produk" src="{{ Storage::url($produk->foto_utama)}}" class="card-img-top" alt="{{$produk->nama_produk}}">
                        <div class="card-body">
                            <h5 class="text3 text-medium">{{$produk->nama_produk}}</h5>
                            <p class="text3 text-dark">Rp.{{$produk->harga}}</p>
                        </div>
                      </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @if ($jenis == 'search_result')
        <div class="search-result">
            <div class="text2">
                <p class="text-medium">Temukan produk serupa</p>
            </div>
            @if ($count_rekomendasi != 0)
            <div class="row">
                @foreach ($rekomendasi as $r)
                <div class="col-md-3 col-sm-4 col-6 mt-3">
                    <a href="{{route('checkout', $r->slug)}}">
                    <div class="card">
                        <img class="img-produk" src="{{ Storage::url($t->foto_utama)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="text3 text-medium">{{$r->nama_produk}}</h5>
                            <p class="text3 text-dark">Rp.{{$r->harga}}</p>
                        </div>
                      </div>
                    </a>
                </div>
                @endforeach
            <div class="text-center mt-5">
                <a href="" class="text5 see-all btn btn-md btn-outline-primary">Lihat Semua <span
                        class="iconify text-primary" data-icon="ic:baseline-navigate-next" data-inline="false"
                        data-width="25" data-height="25"></span></a>
            </div>
            @else
                <div class="text-center mt-5 mb-5">
                    <h5 class="text3 text-medium">Produk Belum Tersedia</h5>
                </div>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
