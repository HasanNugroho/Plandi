@extends('adminlte::page')
@section('title', 'Testimoni')
@section('content_header')
<div class="d-flex justify-content-between">
    <div class="text2">Testimoni</div>
    <button type="button" class="text3 btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#modal-add">
        Tambah testimoni
    </button>
</div>
@stop

@section('content')
<div class="container">
    <table class="table" id="testi-table">
        <thead class="table-light">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Komentar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testi as $testi)
            <tr>
                <td>
                    <img src="{{ Storage::url($testi->foto)}}" style="width: 100px; height: 100px; margin: 0 .2rem;" alt="">
                </td>
                <td>{{$testi->nama}}</td>
                <td>{{$testi->komentar}}</td>
                <td><a class="btn btn-warning btn-sm btn-edit" data-id="{{$testi->id}}" href="#">Edit</a>
                    <a class="btn btn-danger btn-sm btn-delete delete-confirm" data-id="{{$testi->id}}" href="#">Hapus</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('add.testimony')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="text-center">
                            <img src="{{ asset('image') }}/image-preview.png" alt="Image Preview" style="width: 50%; height:auto;"
                                id="preview">
                        </div>
                        <div class="custom-file mt-3">
                            <input id="foto" class="custom-file-input" type="file" name="foto"
                                onchange="loadFile(event)">
                            <label for="my-input" class="custom-file-label" id="labelimg">Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama"
                            aria-describedby="nama" placeholder="Ahmad">
                    </div>
                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                            <textarea class="form-control" name="komentar" placeholder="..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit-testi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Testimoni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="" id="form-edit">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-update">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
@stop
@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    function loadFile(event){
        //mengubah foto
        var reader = new FileReader();
        reader.readAsDataURL(event.target.files[0]);
        reader.onload = function(){
        output.src = reader.result;
        }
        //mengubah label
        var file = document.getElementById('foto');
        var output = document.getElementById('preview');
        var file = document.getElementById('labelimg').innerHTML = file.files[0].name
    };
</script>
<script>
        $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        // console.log(id)
        $.ajax({
            url: '/dashboard/testimoni/' + id + '/edit',
            method: "GET",
            success: function (data) {
                // console.log(data)
                $('#modal-edit-testi').modal('show')
                $('#modal-edit-testi').find('.modal-body').html(data)
            },
            error: function (error) {
                console.log(error)
            }
        })
    })

    $('.btn-update').on('click', function (e) {
        e.preventDefault();
        let id = $('#form-edit').find('#id_data').val()
        let formData = $('#form-edit').serialize()
        // console.log(id)
        console.log(formData)
        $.ajax({
            url: '/dashboard/testimoni/' + id + '/update',
            method: "POST",
            data: formData,
            success: function (data) {
                // console.log(data)
                $('#modal-edit-testi').find('.modal-body').html(data)
                $('#modal-edit-testi').modal('hide')
                window.location.assign('/dashboard/testimoni')
                Swal.fire('Success','Testimoni berhasil diupdate','success')

            },
            error: function (err) {
                console.log(err.responseJSON)
                let err_log = err.responseJSON.errors;
                if(err.status == 422){
                    $('#modal-edit').find('[name="foto"]').prev().html('<span style="color: red;">Foto | '+err_log.kontak[0]+'</span>')
                }
            }

        })
    })
    $('.btn-delete').on('click', function () {
        let id = $(this).data('id')
        console.log(id)
        $.ajax({
            url: '/dashboard/testimoni/' + id + '/delete',
            method: 'GET',
            type: 'DELETE',
            cache: false,
            success: function (data) {
                console.log(data)
                window.location.assign('/dashboard/testimoni')
                Swal.fire('Success','Testimoni berhasil dihapus','success')
            },
            error: function (err) {
                console.log(err.responseJSON)
            }

        })
    })
</script>
@stop
