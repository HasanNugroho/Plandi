@extends('layouts.app')
@section('title', 'Plandi')
@section('css', 'home')
@section('content')

{{-- Whatsapp --}}
<div class="whatsapp">
    <a class=" text-right btn btn-md text5 btn-whatsapp" href="#"><span class="iconify" data-icon="bx:bxl-whatsapp"
            data-inline="false" data-width="23" data-height="23"></span>Whatsapp</a>
</div>
{{-- Whatsapp end --}}
{{-- Hero --}}
<div class="hero">
    <div class="container">
        <div class="row center-hero">
            <div class="col-md-6">
                <p class="text1 text-white">Kini Hadir Pot Serabut Kelapa Ramah Lingkungan Hanya di <p
                        class="text1 mb-4" style="color: #5ECEB3">Plandis Group</p>
                </p>
                <p class="text5 mb-4 text-white">Banyak manfaat yang didapat dari serabut kelapa bagi tanaman karena
                    membantu perkembangan tanaman</p>
                <a href="#" class="btn btn-lg btn-see-product bg-white text-primary text3">Lihat Produk</a>
            </div>
            <div class="col-md-6">
                <img class="img-hero" src="/image/hero.svg" alt="">
            </div>
        </div>
    </div>
</div>
{{-- end hero --}}
{{-- Produk --}}
<div class="container">
    <div class="produk">
        <div class="kategori">
            <div class="d-flex align-items-center">
                <a href="/" class="btn btn-md text-medium text5 btn-kategori"
                    style="@if(count($kategori) == 0) background-color: #ce985e50; @endif">Semua</a>
                @foreach ($kategori as $kategori)
                <form action="{{route('home_produk')}}" method="get">
                    <input type="hidden" name="kategori" value="{{$kategori->kategori}}">
                    <button href="" type="submit" class="btn btn-md text-medium text5 btn-kategori" style="@if($kategori->kategori) background-color: #ce985e50; @endif">{{$kategori->kategori}}</button>
                </form>
                @endforeach
            </div>
        </div>
        <div class="row katalog">
            @if (count($produk) > 0)
            @foreach ($produk as $produk)
            <div class="col-lg-3 col-md-6 col-6 mb-5">
                <a href="{{route('checkout', $produk->slug)}}">
                    <div class="card">
                        <div class="gambar-produk">
                            <img src="{{ Storage::url($produk->foto_utama)}}"
                                class="card-img-top" alt="{{$produk->nama_produk}}">
                        </div>
                        <div class="card-body">
                            <h5 class="text3 text-medium">{{$produk->nama_produk}}</h5>
                            <p class="text3 text-dark">{{$produk->harga}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
                <div class="text-center">
                    <h5 class="text3 text-medium">Produk Belum Tersedia</h5>
                </div>
            @endif
        </div>
        <div class="text-center">
            <a href="{{route('produk.front')}}" class="text5 see-all btn btn-md btn-outline-primary">Lihat Semua <span
                    class="iconify text-primary" data-icon="ic:baseline-navigate-next" data-inline="false"
                    data-width="25" data-height="25"></span></a>
        </div>
    </div>
</div>
{{-- end produk --}}
{{-- Testimony --}}
<div class="testimoni">
    <div class="container-sm text-center">
        <p class="text6 text-primary">Testimonials</p>
        <p class="text2 text-primary">Apa Kata Mereka?</p>
        <div class="swiper-container swiper-home">
            <div class="swiper-wrapper">
                @foreach ($testi as $t)
                <div class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body" style="border-radius: 10px;">
                            <span class="iconify mb-2" data-icon="mdi:comment-quote" data-inline="false" style="color: #939393;" data-width="25" data-height="25"></span>
                            <p class="text5 mb-4">{{$t->komentar}}</p>
                            <div class="garis mb-2"></div>
                            <p class="text3 text-primary mb-1">{{$t->nama}}</p>
                            <img src="{{ Storage::url($t->foto)}}" class="img-testi">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
{{-- Testimony end --}}

@endsection
