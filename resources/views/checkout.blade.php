@extends('layouts.app')
@section('title', 'Plandi')
@section('css-custom')
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@stop
@section('content')
<div style="margin-top: 70px">
    <div class="container">
        @if ($checkout)
        <div class="row">
            <div class="col-xl-5 col-lg-12 col-sm-12">
                <div class="detail">
                    <div class="swiper-container swiper-checkout">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" class="img-produk" style="background-image:url({{ Storage::url($checkout->foto_utama)}})"></div>
                            <?php foreach (json_decode($checkout->foto) as $f) {  ?>
                                <div class="swiper-slide" class="img-produk" style="background-image:url({{ Storage::url($f)}})"></div>
                            <?php } ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12 col-sm-12">
                <div class="detail">
                    <p class="text2">{{$checkout->nama_produk}}</p>
                    <div class="d-flex">
                        {{-- <p class="text5 text-medium">Terjual 25 produk</p> --}}
                        <p class="text5 text-medium mt-2">{{$checkout->visitor}} x dilihat</p>
                    </div>
                    <div style="background-color: rgba(206, 151, 94, 0.15);padding: 1rem;border-radius: 5px;"
                        class="mt-3 mb-3">
                        <p class="text5 text-medium">Harga</p>
                        <p class="text2 text-orange">Rp {{$checkout->harga}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mt-3">
                                    <div class="d-flex">
                                        <div class="col-md-6 mr-3">
                                            <p class="text-medium text6">Berat barang</p>
                                            <p class="text3">@if ($checkout->berat_barang == null) - @else {{$checkout->berat_barang}} @endif gr</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-medium text6">Berat Volume</p>
                                            <p class="text3">@if ($checkout->berat_volume == null) - @else {{$checkout->berat_volume}} @endif gr</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-flex">
                                        <div class="col-md-6 mr-3">
                                            <p class="text-medium text6">Diameter luar</p>
                                            <p class="text3">@if ($checkout->diameter_luar == null) - @else {{$checkout->diameter_luar}} @endif cm</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-medium text6">Diameter dalam</p>
                                            <p class="text3">@if ($checkout->diameter_dalam == null) - @else {{$checkout->diameter_dalam}} @endif cm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <p class="text-medium text6">Panjang tali</p>
                                        <p class="text3">@if ($checkout->panjang_tali == null) - @else {{$checkout->panjang_tali}} @endif cm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text5">Info dan pemesanan hubungi kami melalui :</p>
                    <div class="row">
                        @if ($whatsapp)
                        <div class="col mt-2 d-flex align-items-center">
                        <a class="text-right btn btn-md text5 btn-whatsapp d-flex" target="_top" href="https://wa.me/{{$whatsapp->kontak}}?text=Nama%20%3A%0ANo.%20HP%20%3A%0AAlamat%20%3A%0APesanan%20%3A%20{{$checkout->nama_produk}}%0AJumlah%20%3A"><span class="iconify"
                                    data-icon="bx:bxl-whatsapp" data-inline="false" data-width="23"
                                    data-height="23"></span>Whatsapp</a>
                        </div>
                        @endif
                        @if ($telephone)
                        <div class="col mt-2 d-flex align-items-center">
                            <a href="tel:+{{$telephone->kontak}}" target="_top" class="btn d-flex btn-md text5 btn-phone"><span class="iconify" data-icon="bi:telephone"
                                    data-inline="false" data-width="23" data-height="23"></span>Telephone</a>
                        </div>
                        @endif
                        @if ($sms)
                        <div class="col mt-2 d-flex align-items-center">
                            <a href="sms:+{{$sms->kontak}}?body=PESANANDA" target="_top" class="btn btn-md text5 btn-sms"><span class="iconify" data-icon="ic:outline-sms"
                                    data-inline="false" data-width="23" data-height="23"></span>SMS</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <p class="text3 text-medium text-center judul-deskripsi">Deskripsi</p>
        <div class="text5 text-dark mb-5">{!!$checkout->diskripsi!!}</div>
        @else
        <div class="text-center" style="padding: 10rem 0;">
            <h5 class="text1 text-medium">Produk Tidak Tersedia</h5>
        </div>
        @endif
    </div>
</div>
@endsection
