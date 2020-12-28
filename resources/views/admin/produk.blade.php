@extends('adminlte::page')
@section('title', 'Produk')
@section('content_header')
<div class="d-flex justify-content-between">
  <div class="text2">Produk</div>
  <button type="button" class="text3 btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Produk
  </button>
</div>
@stop

@section('content')
<div class="container">
    <div class="table-responsive">
<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($produk as $p)
        <tr>
          <th scope="row">1</th>
          <td>
              <img src="{{ Storage::url($p->foto_utama)}}" style="width: 100px; height: 100px; margin: 0 .2rem;" alt="">
          </td>
          <td>{{$p->nama_produk}}</td>
          <td>Rp {{$p->harga}}</td>
          <td>
              <a href="{{route('edit.produk', $p->slug)}}" class="btn btn-sm btn-warning">Edit</a>
              <a href="{{route('hapus.produk', $p->slug)}}" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
        <form class="row" action="{{route('tambah.produk')}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="col-md-6 mb-2">
              <label for="inputEmail4" class="form-label">Nama Barang</label>
              <input type="text" name="nama_produk" class="form-control" id="inputEmail4" placeholder="pot">
          </div>
          <div class="col-md-6 mb-2">
              <label for="inputEmail4" class="form-label">Harga</label>
              <input type="text" name="harga" class="form-control" id="inputEmail4" placeholder="50.000">
          </div>
          <div class="col-md-6 mb-2">
              <label for="bb" class="form-label">Berat barang</label>
              <input type="text" name="berat_barang" class="form-control" id="bb" placeholder="Dalam satuan gram">
          </div>
          <div class="col-md-6 mb-2">
              <label for="volume" class="form-label">Berat volume</label>
              <input type="text" name="berat_volume" class="form-control" id="volume" placeholder="Dalam satuan gram">
          </div>
          <div class="col-md-6 mb-2">
              <label for="luar" class="form-label">Diameter luar</label>
              <input type="text" name="diameter_luar" class="form-control" id="luar" placeholder="Dalam satuan centimeter">
          </div>
          <div class="col-md-6 mb-2">
              <label for="dalam" class="form-label">Diameter dalam</label>
              <input type="text" name="diameter_dalam" class="form-control" id="dalam" placeholder="Dalam satuan centimeter">
          </div>
          <div class="col-md-6 mb-2">
              <label for="tali" class="form-label">Panjang tali</label>
              <input type="text" name="panjang_tali" class="form-control" id="tali" placeholder="Dalam satuan centimeter">
          </div>
          <div class="col-md-6 mb-2">
              <label for="tali" class="form-label">Kategori</label>
              <select class="form-select" aria-label="Default select example" name="kategori">
                  <option selected>Pilih kategori</option>
                  @foreach ($kategori as $kategori)
                      <option value="{{$kategori->kategori}}">{{$kategori->kategori}}</option>
                  @endforeach
                </select>
          </div>
          <div class="col-md-6 mb-2">
              <label for="tali" class="form-label">Foto Utama produk</label>
              <div class="input-group control-group">
                  <input type="file" name="foto_utama" class="form-control">
              </div>
          </div>
          <div class="col-md-6 mb-2">
              <label for="tali" class="form-label">Foto produk</label>
              <div class="input-group control-group increment">
                  <input type="file" name="foto[]" class="form-control" multiple>
                  <div class="input-group-btn">
                      <button class="btn btn-success btn-tambah" type="button"><i
                              class="glyphicon glyphicon-plus"></i>Tambah</button>
                  </div>
              </div>
          </div>
          <div class="col-md-6 mb-2">
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
          <div class="text-right">
              <button type="submit" class="btn btn-primary">Tambah Produk</button>
          </div>
      </form>
    </div>
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
<script> console.log('Hi!'); </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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