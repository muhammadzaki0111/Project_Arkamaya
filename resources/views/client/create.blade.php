@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">New Client</span>
        </h3>
        <div class="d-flex">
            <a href="/client" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>

<div class="container mx-auto mt-5">
    <div class="card">
        <div class="card-title text-center bg-secondary">
            <h3>New Client</h3>
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
            <form action="/client" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-2 my-autio">
                        <label for="client_name">Client Name</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="client_name" name="client_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="client_address">Client Address</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="client_address" name="client_address">
                    </div>
                </div>
                <div class="col-2 mx-auto">
                    <button type="submit" class="btn btn-success w-100">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
