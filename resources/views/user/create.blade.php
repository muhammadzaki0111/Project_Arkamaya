@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Tambah Data User</span>
            </h3>
            <div class="d-flex">
                <a href="/user" class="btn btn-sm ml-3 btn-danger">Kembali</a>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-5">
        <div class="card">
            <div class="card-title text-center bg-secondary">
                <h3>Tambah Data User</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="name">Nama</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-10">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>

                    <div class="col-2 mx-auto">
                        <button type="submit" class="btn btn-success w-100">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
