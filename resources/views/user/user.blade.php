@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Data User</span>
            </h3>
            <div class="d-flex">

                <a href="/user/create" class="btn btn-sm ml-3 btn-info">Tambah Data</a>

            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="w-50 mx-auto mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Info</strong> {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="row container mx-auto my-5">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4 text-center">Data Pengguna</h4>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>


                                        <td>
                                            <a href="{{ url('user') }}/{{ $item->id }}/edit" class="btn btn-success">Edit</a>

                                            <form action="{{ url('user') }}/{{ $item->id }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
