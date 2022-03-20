@extends('backend.componens.layout')

@section('title', 'Rincian Pesanan ' . $toko->nama_toko)
@section('content')

@php
if($toko->status == 0){
    $bg="bg-secondary";
    $ketStatus="Belum ada respon.";
}elseif ($toko->status == 1) {
    $bg="bg-danger";
    $ketStatus="Pesanan dibatalkan.";
}elseif ($toko->status == 2) {
    $bg="bg-success";
    $ketStatus="Pesanan sedang diproses.";
}elseif ($toko->status == 3) {
    $bg="bg-warning";
    $ketStatus="Pesanan sedang dalam perjalanan.";
}else {
    $bg="bg-danger";
    $ketStatus="Error";
}
@endphp

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Rincian Pesanan {{ $toko->nama_toko }}/{{ $toko->kode_pesanan }}</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/pesanan">Pesanan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rincian Pesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-2 ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- bagian edit -->



                        @if (session('sukses'))
                            <div class="alert alert-success d-flex align-items-center  alert-dismissible" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ session('sukses') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif


                        @if (session('gagal'))
                            <div class="alert alert-danger d-flex align-items-center  alert-dismissible" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    {{ session('gagal') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif


                        @if (Auth::user()->level != 0)
                        <nav class="navbar navbar-light">
                            <div class="container-fluid">
                            <form method="POST" action="/update-status-pesanan/{{ $toko->id }}" class="d-flex float-left ">
                                @csrf
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option selected value="{{ $toko->status }}">{{$ketStatus}}</option>
                                    <option value="1">Pesanan Dibatalkan.</option>
                                    <option value="2">Pesanan Sedang Diproses.</option>
                                    <option value="3">Pesanan Sedang Dalam Perjalanan.</option>
                                  </select>
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Simpan</button>
                            </form>
                        </div>
                    </div>
                    @endif

                    @if ($toko->status <= 1 && Auth::user()->level ==0 )
                            <nav class="navbar navbar-light">
                                <div class="container-fluid justify-content-end ">
                                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Tambah Barang
                                    </button>
                                </div>
                            </nav>
                    @endif





                        {{-- table --}}
                        <div class="table-responsive mt-3">
                            <table class="table table-hover" id="example">
                                <thead class="table-dark">
                                    <tr class="text-light">
                                        <th class="text-light" style="width: 20px">#</th>
                                        <th class="text-light">Barang</th>
                                        <th class="text-light">Jenis</th>
                                        <th class="text-light">Jumlah Pesan</th>
                                        <th class="text-light">Dibuat</th>
                                        <th class="text-light text-center ">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->jumlah_beli }} <strong
                                                    class="text-info">{{ $item->satuan }}</strong></td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd D MMMM YYYY') }}
                                            </td>
                                            <td class="text-center">
                                                <form action="/delete-rincian-pesanan/{{ $item->id }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->barang_id }}" name="barang_id">
                                                    <input type="hidden" value="{{ $toko->id }}" name="pesanan_id">
                                                    <input type="hidden" value="{{ $item->jumlah_beli }}"
                                                        name="jumlah_beli">
                                                    <button class="btn btn-danger btn-icon  rounded-2"
                                                        onclick="return confirm('Yakin pesanan {{ $item->nama_barang }} akan dibatalkan.? ') "
                                                        type="submit"> <i class="mdi mdi-delete text-light"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- table --}}
                        <!-- bagian edit -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Tambah --}}
    <!-- Modal -->
    @if ($toko->status <= 1 && Auth::user()->level == 0 )
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form --}}
                        <form action="/pesanan/{{ $idToko }}" method="post">
                            @csrf

                            {{-- <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('kode_pesanan') is-invalid  @enderror" id="kode_pesanan" name="kode_pesanan" placeholder="a" value="{{ $kodePesan }}" readonly>
                    <label for="kode_pesanan">Kode barang</label>
                    @error('kode_pesanan')
                        <small class="text-danger" style="margin-left: 8px;" > {{$message}} </small>
                    @enderror
                </div> --}}

                            <div class="form-floating mb-3">
                                <select class="form-select  @error('barang') is-invalid @enderror" id="floatingSelectGrid"
                                    aria-label="Floating label select example" name="barang">
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                                <label for="nama_barang">Barang</label>
                                @error('barang')
                                    <small class="text-danger" style="margin-left: 8px;"> {{ $message }} </small>
                                    @section('modal')
                                        <script>
                                            var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
                                            document.onreadystatechange = function() {
                                                myModal.show();
                                            };
                                        </script>
                                    @endsection
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control @error('jumlah_beli') is-invalid @enderror"
                                    id="jumlah_beli" name="jumlah_beli" placeholder="a" value="{{ old('jumlah_beli') }}">
                                <label for="jumlah_beli">Jumlah Beli</label>
                                @error('jumlah_beli')
                                    <small class="text-danger" style="margin-left: 8px;"> {{ $message }} </small>
                                    @section('modal')
                                        <script>
                                            var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
                                            document.onreadystatechange = function() {
                                                myModal.show();
                                            };
                                        </script>
                                    @endsection
                                @enderror
                            </div>



                            {{-- form --}}

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif
    {{-- Tambah --}}


    <script>
        function myFunction() {
            var x = document.getElementById("kode_barang");
            x.value = x.value.toUpperCase();
        }
    </script>


@endsection
