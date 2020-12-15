@extends('adminlte::page')
@section('title', 'Tambah Produk')
@section('content_header')
<h1>Tambah Produk</h1>
@stop

@section('content')
<div class="container">
    <form class="row" action="{{route('tambah.produk')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nama Barang</label>
            <input type="text" name="nama_produk" class="form-control" id="inputEmail4" placeholder="pot">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="inputEmail4" placeholder="50.000">
        </div>
        <div class="col-md-6">
            <label for="bb" class="form-label">Berat barang</label>
            <input type="text" name="berat_barang" class="form-control" id="bb" placeholder="Dalam satuan gram">
        </div>
        <div class="col-md-6">
            <label for="volume" class="form-label">Berat volume</label>
            <input type="text" name="berat_volume" class="form-control" id="volume" placeholder="Dalam satuan gram">
        </div>
        <div class="col-md-6">
            <label for="luar" class="form-label">Diameter luar</label>
            <input type="text" name="diameter_luar" class="form-control" id="luar" placeholder="Dalam satuan centimeter">
        </div>
        <div class="col-md-6">
            <label for="dalam" class="form-label">Diameter dalam</label>
            <input type="text" name="diameter_dalam" class="form-control" id="dalam" placeholder="Dalam satuan centimeter">
        </div>
        <div class="col-md-6">
            <label for="tali" class="form-label">Panjang tali</label>
            <input type="text" name="panjang_tali" class="form-control" id="tali" placeholder="Dalam satuan centimeter">
        </div>
        <div class="col-md-6">
            <label for="tali" class="form-label">Foto produk</label>
            <div class="input-group control-group increment">
                <input type="file" name="foto[]" class="form-control" multiple>
                <div class="input-group-btn">
                    <button class="btn btn-success btn-tambah" type="button"><i
                            class="glyphicon glyphicon-plus"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="clone visually-hidden">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="foto[]" class="form-control" multiple>
                    <div class="input-group-btn">
                        <button class="btn btn-danger btn-kurang" type="button"><i
                                class="glyphicon glyphicon-remove"></i>
                            Hapus</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="diskripsi">Deskripsi</label>
                <div class="col-md-12">
                    <textarea rows="15" id="konten"
                        class="form-control form-control-line  @error('diskripsi') is-invalid @enderror"
                        name="diskripsi" placeholder=""></textarea>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </div>
    </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

@stop
@section('js')
<script src="/vendor/ckeditor/ckeditor.js"></script>
{{-- text editor --}}
<script>
    var konten = document.getElementById("konten");
    CKEDITOR.replace(konten, {
        language: 'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

</script>
{{-- multiple image --}}
<script type="text/javascript">
    $(document).ready(function () {
        $(".btn-tambah").click(function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("form").on("click", ".btn-kurang", function () {
            $(this).parents(".control-group").remove();
        });
    });

</script>
@stop
