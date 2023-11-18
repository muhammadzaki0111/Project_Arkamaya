@extends('layouts.index')
@section('content')

    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">New Project</span>
            </h3>
            <div class="d-flex">
                <a href="/project" class="btn btn-sm ml-3 btn-danger">Kembali</a>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-5">
        <div class="card">
            <div class="card-title text-center bg-secondary">
                <h3>New Project</h3>
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
                <form action="/project" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="project_name">Project Name</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control" id="project_name" name="project_name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="client_id">Client</label>
                        </div>
                        <div class="col-10">
                            <select name="client_id" id="client_id" class="form-control">
                                @foreach ($tb_m_clients as $tb_m_client)
                                    @if (old('client_id') == $tb_m_client->id)
                                        <option value="{{ $tb_m_client->id }}" selected>{{ $tb_m_client->client_name }}</option>
                                    @else
                                        <option value="{{ $tb_m_client->id }}">{{ $tb_m_client->client_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="project_start">Project Start</label>
                        </div>
                        <div class="col-10">
                            <input type="date" class="form-control" id="project_start" name="project_start">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="project_end">Project End</label>
                        </div>
                        <div class="col-10">
                            <input type="date" class="form-control" id="project_end" name="project_end">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="project_status">Project Status</label>
                        </div>
                        <div class="col-10">
                            <select name="project_status" id="project_status" class="form-control">
                                <option value="Open" {{ old('project_status') == 'Open' ? 'selected' : '' }}>Open</option>
                                <option value="Doing" {{ old('project_status') == 'Doing' ? 'selected' : '' }}>Doing
                                </option>
                                <option value="Done" {{ old('project_status') == 'Done' ? 'selected' : '' }}>Done</option>
                                <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                            </select>
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
