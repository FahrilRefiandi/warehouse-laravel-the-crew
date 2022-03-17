@extends('backend.componens.layout')

@section('title',"Pesanan")
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Pesanan</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
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
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                          {{session('sukses')}}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>

                    @endif

                    @if (session('gagal'))
                    <div class="alert alert-danger d-flex align-items-center  alert-dismissible" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                          {{session('gagal')}}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>

                    @endif

                    <nav class="navbar navbar-light">
                        <div class="container-fluid justify-content-end ">
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">
                                Pesan
                            </button>
                        </div>
                      </nav>



                    {{-- table --}}
                    <div class="table-responsive mt-3">
                        <table class="table table-hover" id="example" >
                            <thead class="table-dark">
                                <tr class="text-light" >
                                  <th class="text-light" style="width: 20px">#</th>
                                  <th class="text-light">Nama Toko</th>
                                  <th class="text-light">Dibuat</th>
                                  <th class="text-light text-center ">Aksi</th>

                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($data as $item)
                                  <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_toko }}</td>
                                    {{-- <td>{{ $item->nama_barang }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd D MMMM YYYY') }}</td>
                                    <td class="text-center" >
                                        <a href="/pesanan/{{ $item->id }}" class="btn btn-success btn-md  rounded-2" > Rincian Barang </a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            {{-- form --}}
            <form action="/pesanan" method="post">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('kode_pesanan') is-invalid  @enderror" id="kode_pesanan" name="kode_pesanan" placeholder="a" value="{{ $kodePesan }}" readonly>
                    <label for="kode_pesanan">Kode barang</label>
                    @error('kode_pesanan')
                        <small class="text-danger" style="margin-left: 8px;" > {{$message}} </small>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nama_toko') is-invalid  @enderror" id="nama_toko" name="nama_toko" placeholder="a" value="{{ old('nama_toko') }}">
                    <label for="nama_toko">Nama Toko</label>
                    @error('nama_toko')
                        <small class="text-danger" style="margin-left: 8px;" > {{$message}} </small>
                        @section('modal')
                        <script>
                            var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
                            document.onreadystatechange = function () {
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
  {{-- Tambah --}}
</div>


<script>
    function myFunction() {
        var x = document.getElementById("kode_barang");
        x.value = x.value.toUpperCase();
    }
    </script>


@endsection
