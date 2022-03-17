@extends('backend.componens.layout')

@section('title',"Edit data satuan $data->satuan")
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Data Satuan.</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/satuan">Data Satuan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Satuan {{ $data->satuan }}</li>
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
                    <form action="/satuan/{{$data->id}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan" placeholder="a" value="{{ $data->satuan }}"  onkeyup="myFunction()">
                            <label for="satuan">Satuan</label>
                            @error('satuan')
                                <small class="text-danger" style="margin-left: 8px;"> {{ $message }} </small>
                            @enderror
                        </div>


                        <nav class="navbar navbar-light">
                            <div class="container-fluid justify-content-center ">
                                <a href="/supplier" class="btn btn-danger me-2"> Kembali </a>
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


<script>
function myFunction() {
    var x = document.getElementById("kode_barang");
    x.value = x.value.toUpperCase();
}
</script>

@endsection
