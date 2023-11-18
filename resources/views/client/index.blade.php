@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Data Client</h3>
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
                    <div class="d-flex">
                        <div class="mt-8">
                            <label for="filter">Filter</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="/project" method="get">
                                    <div class="form-group">
                                        <label for="keyword">Project Name</label>
                                        <input type="text" name="keyword" class="form-control" id="keyword" placeholder="">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/project" method="get">
                                    <div class="form-group">
                                        <label for="client">Client</label>
                                        <select id="client" name="pilclient" class="form-control">
                                            <option value="">All Client</option>
                                            @foreach ($tb_m_clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/project" method="get">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <div class="col-10">
                                            <select name="project_status" id="project_status" class="form-control">
                                                <option value="">All Status</option>
                                                <option value="Open">Open</option>
                                                <option value="Doing">Doing</option>
                                                <option value="Done">Done</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <a href="" class="btn btn-sm ml-3 btn-info">Search</a>
                            <a href="" class="btn btn-sm ml-3 btn-info">Clear</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body px-0 overflow-auto">
                    <div class="table-responsive">
                        <form action="/proses-form" method="post" id="deleteForm">
                            @csrf
                            <div class="input-group mb-3">
                                <a href="/client/create" class="btn btn-sm ml-3 btn-info ">New</a>
                                <button type="submit" class="btn btn-sm ml-3 btn-info " id="deleteSelectedBtn">Delete Selected</button>
                            </div>
                            <table class="table text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="selectAll">
                                        </th>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>Id </th>
                                        <th>Client Name</th>
                                        <th>Client Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tb_m_clients as $tb_client)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected_clients[]" value="{{ $tb_client->id }}">
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="/client/{{ $tb_client->id }}/edit">Edit</a>
                                            </td>
                                            <td>{{ $tb_client->id }}</td>
                                            <td>{{ $tb_client->client_name }}</td>
                                            <td>{{ $tb_client->client_address }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Check/uncheck all checkboxes
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.getElementsByName('selected_clients[]');
            for (let checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });

        // Confirm deletion when the Delete Selected button is clicked
        document.getElementById('deleteSelectedBtn').addEventListener('click', function() {
            return confirm('Are you sure you want to delete the selected clients?');
        });

        // Trigger form submission when the Delete button is clicked
        document.getElementById('deleteSelected').addEventListener('click', function() {
            document.getElementById('deleteForm').submit();
        });

    </script>

@endsection
