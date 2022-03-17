@extends('backend.componens.layout')

@section('title',"Edit jenis barang $data->jenis")
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Jenis Barang.</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/jenis-barang">Jenis Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Jenis Barang {{ $data->satuan }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- bagian edit -->

                    {{-- Form --}}
                    <form action="/jenis-barang/{{$data->id}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" name="jenis_barang" placeholder="a" value="{{ $data->jenis }}"  onkeyup="myFunction()">
                            <label for="jenis_barang">Jenis Barang</label>
                            @error('jenis_barang')
                                <small class="text-danger" style="margin-left: 8px;"> {{ $message }} </small>
                            @enderror
                        </div>


                        <nav class="navbar navbar-light">
                            <div class="container-fluid justify-content-center ">
                                <a href="/jenis-barang" class="btn btn-danger me-2"> Kembali </a>
                                <button type="submit" class="btn btn-success"> Simpan </button>
                            </div>
                          </nav>

                        </form>

                    {{-- form --}}

                    {{-- Form --}}

                    <!-- bagian edit -->
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
