@extends('layouts.app')
@section('title', 'Plandi')
@section('css', 'checkout')
@section('content')
<div style="margin-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-12 col-sm-12">
                <div class="detail">
                    <div class="swiper-container swiper-checkout">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" class="img-produk" style="background-image:url(image/man.png)">
                            </div>
                            <div class="swiper-slide" class="img-produk" style="background-image:url(image/hero.svg)">
                            </div>
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
                    <p class="text2">Pot Kokedama</p>
                    <div class="d-flex">
                        <p class="text5 text-medium">Terjual 25 produk</p>
                        <p class="text5 text-medium ml-4">5.000 x dilihat</p>
                    </div>
                    <div style="background-color: rgba(206, 151, 94, 0.15);padding: 1rem;border-radius: 5px;"
                        class="mt-3 mb-3">
                        <p class="text5 text-medium">Harga</p>
                        <p class="text2 text-orange">Rp 15.000</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mt-3">
                                    <div class="d-flex">
                                        <div class="col-md-6 mr-3">
                                            <p class="text-medium text6">Berat barang</p>
                                            <p class="text3">200gr</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-medium text6">Berat Volume</p>
                                            <p class="text3">200gr</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="d-flex">
                                        <div class="col-md-6 mr-3">
                                            <p class="text-medium text6">Diameter luar</p>
                                            <p class="text3">10 cm</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-medium text6">Diameter dalam</p>
                                            <p class="text3">8 cm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <p class="text-medium text6">Panjang tali</p>
                                        <p class="text3">10 cm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text5">Info dan pemesanan hubungi kami melalui :</p>
                    <div class="row">
                        <div class="col-sm-3 col-5 mt-2 d-flex align-items-center">
                            <a class="text-right btn btn-md text5 btn-whatsapp" href="#"><span class="iconify"
                                    data-icon="bx:bxl-whatsapp" data-inline="false" data-width="23"
                                    data-height="23"></span>Whatsapp</a>
                        </div>
                        <div class="col-sm-3 col-7 mt-2 d-flex align-items-center">
                            <a href="" class="btn btn-md text5 btn-phone"><span class="iconify" data-icon="bi:telephone"
                                    data-inline="false" data-width="23" data-height="23"></span>Telephone</a>
                        </div>
                        <div class="col-sm-3 col-6 mt-2 d-flex align-items-center">
                            <a href="" class="btn btn-md text5 btn-sms"><span class="iconify" data-icon="ic:outline-sms"
                                    data-inline="false" data-width="23" data-height="23"></span>SMS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text3 text-medium text-center judul-deskripsi">Deskripsi</p>
        <p class="text5 text-dark mb-5"> Secara bahan, pot kulit kelapa ini memanfaatkan 50% bagian dalam dan kulit luat kelapa. Dengan teknik sederhana memanfaatkan kulit kelapa yang masih utuh, kemudian disatukan kembali menjadi seolah utuh kembali. Ditambah dengan beberapa sentuhan untuk menambah karya seni. <br><br>
            Untuk memudahkan dalam pemakaiannya, pot kulit kelapa ini kami tambahkan tali dari bahan sabut kelapa dan pada ujungnya dililit pengait besi. <br><br>
            
            Ukuran pot ini  jelas tidak sama, antara satu dengan lainnya, bervariasi menyesuaikan bahan kulit kelapa yang didapat. </p>
    </div>
</div>
@endsection
