@extends('adminlte::page')
@section('title', 'Kategori produk')
@section('content_header')
<div class="d-flex justify-content-between">
    <div class="text2">Keyword SEO</div>
    <button type="button" class="btn text3 btn-md btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Keyword
    </button>
</div>
@stop

@section('content')
<div class="container">
    <table class="table" id="tableKategori">
        <thead class="table-light">
            <tr>
                <th>Keyword</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keyword as $k)
            <tr>
                <td>{{$k->keyword}}</td>
                <td><a class="btn btn-danger btn-sm delete-confirm" href="{{route('hapus.keyword',$k->id)}}">Hapus</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formKategori" action="{{route('add.keyword')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kategori">Keyword</label>
                        <input type="text" class="form-control" id="kategori" name="keyword"
                            placeholder="Tulis kategori">
                    </div>
                    <button type="submit" class="btn btn-primary" id="save">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
@stop
@section('js')
<script>
    console.log('Success');

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
{{-- AJAX --}}

{{-- <script>
    $('#exampleModal').appendTo("body");
    $("#formKategori").submit(function (e) {
        e.preventDefault();

        let kategori = $("#kategori").val();
        let _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{route('add.kategori')}}",
            type: "POST",
            data: {
                kategori: kategori,
                _token: _token
            },
            success: function (response) {
                let i = 1;
                if (response) {
                    $("#tableKategori tbody").prepend('<tr><td>' + response.kategori +
                        '</td><td><a class="btn btn-danger btn-sm" href="{{route("hapus.kategori", ' +
                        response.id + ')}}">Hapus</a></td></tr>');
                    $("#formKategori")[0].reset();
                    $("#exampleModal").modal('hide');
                    $(".modal").modal('hide');
                }
            }
        });
    });

</script> --}}
@stop
