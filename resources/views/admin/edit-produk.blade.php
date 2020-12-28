@extends('adminlte::page')
@section('title', 'Edit Produk')
@section('content_header')
<div class="text2">Edit Produk</div>
@stop

@section('content')
<div class="container">
    <form class="row" action="{{route('update.produk')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="slug" value="{{$edit->slug}}">
        <input type="hidden" name="id" value="{{$edit->id}}">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nama Barang</label>
            <input type="text" name="nama_produk" value="{{$edit->nama_produk}}" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control" value="{{$edit->harga}}" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="bb" class="form-label">Berat barang</label>
            <input type="text" name="berat_barang" class="form-control" value="{{$edit->berat_barang}}" id="bb">
        </div>
        <div class="col-md-6">
            <label for="volume" class="form-label">Berat volume</label>
            <input type="text" name="berat_volume" class="form-control" value="{{$edit->berat_volume}}" id="volume">
        </div>
        <div class="col-md-6">
            <label for="luar" class="form-label">Diameter luar</label>
            <input type="text" name="diameter_luar" class="form-control" id="luar" value="{{$edit->diameter_luar}}">
        </div>
        <div class="col-md-6">
            <label for="dalam" class="form-label">Diameter dalam</label>
            <input type="text" name="diameter_dalam" class="form-control" value="{{$edit->diameter_dalam}}" id="dalam">
        </div>
        <div class="col-md-6">
            <label for="tali" class="form-label">Panjang tali</label>
            <input type="text" name="panjang_tali" class="form-control" id="tali" value="{{$edit->panjang_tali}}">
        </div>
        <div class="col-md-6 mb-2">
            <label for="tali" class="form-label">Kategori</label>
            <select class="form-select" aria-label="Default select example" name="kategori">
                <option selected>{{$edit->kategori}}</option>
                @foreach ($kategori as $kategori)
                    <option value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                @endforeach
              </select>
        </div>
        <div class="col-md-6 mb-2">
            <label for="tali" class="form-label">Foto Utama produk</label>
            <div class="input-group control-group">
                <input type="file" name="foto_utama" class="form-control" value="{{$edit->foto_utama}}">
            </div>
        </div>
        <div class="col-md-6">
            <label for="tali" class="form-label">Foto produk</label>
            <div class="input-group control-group increment">
                <input type="file" name="foto[]" value="{{$edit->foto}}" class="form-control" multiple>
                <div class="input-group-btn">
                    <button class="btn btn-success btn-tambah" type="button"><i
                            class="glyphicon glyphicon-plus"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="clone visually-hidden">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="foto[]" value="{{$edit->foto}}" class="form-control" multiple>
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
                        name="diskripsi">{!!$edit->diskripsi!!}</textarea>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update Produk</button>
        </div>
    </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/style.css">
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

    function loadFile(event) {
        //mengubah gambar
        var reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]);
        reader.onload = function () {
            output.src = reader.result;
        }
        //mengubah label
        var i = 1;
        var file = document.getElementById('gambar');
        var output = document.getElementById('preview');
        var file = document.getElementById('labelimg'+ 'i++').innerHTML = file.files[0].name
    };

</script>
@stop
