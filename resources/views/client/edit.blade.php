@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Update Client</span>
        </h3>
        <div class="d-flex">
            <a href="/client" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>
<div class="container mx-auto mt-5">
    <div class="card">
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
            <div class="row">
                <div class="col-lg-6 mx-2">
                  <form action="/client/{{ $tb_m_clients->id }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Client Name</label>
                      <input type="text" class="form-control @error('client_name') is-invalid @enderror" name ="client_name" id="client_name" value="{{ old('client_name',$tb_m_clients->client_name) }}">
                      @error('client_name')
                      <div class="invalid-feedback">
                        Please select a valid state.
                        {{ $message }}
                      </div>
                      @enderror
                    <div class="mb-3">
                  <label class="form-label">Client Address</label>
                  <textarea class="form-control" rows="3" name="client_address">{{ old('client_address',$tb_m_clients->client_address) }}</textarea>
                </div>
                <div class="mb-3">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
