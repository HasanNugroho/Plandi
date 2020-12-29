@extends('adminlte::page')
@section('title', 'Kontak')
@section('content_header')
<div class="text2">Kontak di Pesanan</div>
@stop

@section('content')
<div class="container">
    <table class="table">
        <thead class="table-light">
            <tr>
                <th>Jenis kontak</th>
                <th>No kontak</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kontak as $k)
            <tr>
                <td>{{$k->jenis_kontak}}</td>
                <td>{{$k->kontak}}</td>
                <td><a class="btn btn-warning btn-sm btn-edit" data-id="{{$k->id}}" href="#">Edit</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kontak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="" id="form-edit">
                @csrf
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-update">Update</button>
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
<script>
    $('.btn-edit').on('click', function () {
        let id = $(this).data('id')
        $.ajax({
            url: '/dashboard/contact/' + id + '/edit',
            method: "GET",
            success: function (data) {
                // console.log(data)
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('show')
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
    $('.btn-update').on('click', function (e) {
        e.preventDefault();
        let id = $('#form-edit').find('#data_id').val()
        let formData = $('#form-edit').serialize()
        // console.log(id)
        console.log(formData)
        $.ajax({
            url: '/dashboard/contact/' + id + '/update',
            method: "POST",
            data: formData,
            success: function (data) {
                // console.log(success)
                $('#modal-edit').find('.modal-body').html(data)
                $('#modal-edit').modal('hide')
                window.location.assign('/dashboard/contact')
                Swal.fire('Success','Kontak berhasil diupdate','success')
            },
            error: function (err) {
                console.log(err.responseJSON)
                let err_log = err.responseJSON.errors;
                if(err.status == 422){
                    $('#modal-edit').find('[name="kontak"]').prev().html('<span style="color: red;">Kontak | '+err_log.kontak[0]+'</span>')
                }
            }

        })
    })
</script>
@stop
