@extends('layouts.app')
@section('title', 'Plandi')
@section('css', 'produk')
@section('content')
<div style="margin-top: 70px">
    <div class="container">
        <div class="search-result">
            @if ($jenis == 'search_result')
            <div class="d-flex text2">
                <p class="text-medium">Hasil pencarian : <p class="text-dark ml-1">Pot kokedama</p></p>
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
            <div class="row">
                <div class="col-md-3 col-sm-4 col-6 mt-3">
                    <a href="">
                    <div class="card">
                        <img class="img-produk" src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="text3 text-medium">Pot serabut kelapa</h5>
                            <p class="text3 text-dark">Rp.10000</p>
                        </div>
                      </div>
                    </a>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="" class="text5 see-all btn btn-md btn-outline-primary">Lihat Semua <span
                        class="iconify text-primary" data-icon="ic:baseline-navigate-next" data-inline="false"
                        data-width="25" data-height="25"></span></a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
