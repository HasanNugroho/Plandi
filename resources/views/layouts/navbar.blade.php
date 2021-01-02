<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand text-primary d-flex align-items-center" style="font-weight: 600; font-size: 16px;"
            href="/">Plandis<p style="margin-left: 5px; font-weight: normal; font-size: 14px;">Group</p></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link anu text-dark text5 active" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link anu dropdown-toggle text-dark text5" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Produk
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item anu text-dark text5" href="#">Action</a></li>
                        <li><a class="dropdown-item anu text-dark text5" href="#">Another action</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark anu text5" href="#">Testimoni</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link text-dark anu text5" href="#">Tentang Kami</a>
                </li> --}}
            </ul>
        </div>
        <div class="wrap">
            <form action="{{route('search')}}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Cari barangmu" name="search">
                    <button type="submit" class="searchButton">
                        <span class="iconify" data-icon="bx:bx-search" data-inline="false"
                            style="color: #BD7E4A;"></span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () { 
        $('.anu') 
                .click(function (e) { 
            $('.anu') 
                .removeClass('active'); 
            $(this).addClass('active'); 
        }); 
    }); 
</script>
