<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('swipper/css/swiper-bundle.css')}}">
    {{-- <link rel="stylesheet" href="swipper/css/swiper-bundle.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="css/@yield('css').css">
    {{-- CSS TAMBAHAN --}}

    @yield('css-custom')
    <title>@yield('title')</title>
</head>
<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="{{asset('swipper/js/swiper-bundle.js')}}"></script>
    <script>
        var swiper = new Swiper('.swiper-home', {
          slidesPerView: 3,
          spaceBetween: 30,
          slidesPerGroup: 1,
          loop: true,
          loopFillGroupWithBlank: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          autoplay: {
            delay: 3000,
          },
          breakpoints: {
            320: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            480: {
              slidesPerView: 2,
              spaceBetween: 30
            },
            // when window width is >= 640px
            640: {
              slidesPerView: 3,
              spaceBetween: 40
            }
          }
        });
      </script>
      <script>
        var swiper = new Swiper('.swiper-checkout', {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 20,
          effect: 'fade',
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
            pagination: {
              el: '.swiper-pagination'
            },
            mousewheel: true,
            keyboard: true,
            breakpoints: {
            320: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            480: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            // when window width is >= 640px
            640: {
              slidesPerView: 1,
              spaceBetween: 20
            }
          }
        });
      </script>
</body>
</html>