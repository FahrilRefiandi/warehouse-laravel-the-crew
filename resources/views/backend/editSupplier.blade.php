@extends('backend.componens.layout')

@section('title',"Edit data supplier $data->nama_supplier " )
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit data supplier.</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/supplier">Data Supplier</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Data Supplier {{ $data->nama_supplier }}</li>
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
                    <form action="/supplier/{{$data->id}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" id="nama_supplier" name="nama_supplier" placeholder="a" value="{{ $data->nama_supplier }}"  onkeyup="myFunction()">
                            <label for="nama_supplier">Nama Supplier</label>
                            @error('nama_supplier')
                                <small class="text-danger" style="margin-left: 8px;"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control  @error('alamat_supplier') is-invalid @enderror" style="height: 100px" placeholder="Alamat Supplier" name="alamat_supplier" id="alamat_supplier"> {{$data->alamat_supplier}} </textarea>
                            <label for="alamat_supplier">Alamat Supplier</label>
                            @error('alamat_supplier')
                                        <small class="text-danger" style="margin-left: 8px;"> {{ $message }} </small>
                                    @enderror
                        </div>



                        <div class="form-floating mb-3">
                            <input type="text" class="form-control  @error('kontak_supplier') is-invalid @enderror"
                                id="kontak_supplier" name="kontak_supplier" placeholder="a" value="{{ $data->kontak_supplier }}">
                            <label for="kontak_supplier">Kontak Supplier</label>
                            @error('kontak_supplier')
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
