@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Profile</h1>
@stop

@section('content')
<p>Hello {{ $user->name }}, welcome to your profile page</p>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="text3">Edit profile</div>
            </div>
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                value="{{$user->email}}" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 col-md-6">
                            <fieldset disabled>
                                <label for="disabledTextInput" class="form-label">Role</label>
                                <input type="text" id="disabledTextInput" class="form-control"
                                    placeholder="{{$user->role}}">
                            </fieldset>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="old_password">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputPassword1" class="form-label d-flex">Password
                                Baru</label>
                            <input type="password" name="password" class="form-control"
                                id="exampleInputPassword1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                @if ($user->foto)
                <img src="{{ Storage::url($user->foto)}}" style="width: 80%; height: auto;border-radius: 150px; padding:1rem;" alt="">
                @else
                <img src="/image/profile-default.png" style="width: 80%; height: auto; border-radius: 150px;padding:1rem;" alt="">
                @endif
                <div class="mb-3 mt-3">
                    <input class="form-control" type="file" id="formFile" name="foto">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    console.log('Hi!');

</script>
@stop
