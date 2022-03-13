@extends('backend.componens.layout')

@section('title',"Barang")
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Barang</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Barang</li>
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



                    @if (session('sukses'))
                    <div class="alert alert-success d-flex align-items-center  alert-dismissible" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                          {{session('sukses')}}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>

                    @endif

                    <nav class="navbar navbar-light">
                        <div class="container-fluid justify-content-end ">
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">
                                Tambah data
                            </button>
                        </div>
                      </nav>



                    {{-- table --}}
                    <div class="table-responsive mt-3">
                        <table class="table table-hover" id="example" >
                            <thead class="table-dark">
                                <tr class="text-light" >
                                  <th class="text-light" style="width: 20px">#</th>
                                  <th class="text-light">Kode Barang</th>
                                  <th class="text-light">Nama Barang</th>
                                  <th class="text-light">Stok</th>
                                  <th class="text-light">Harga Jual</th>
                                  <th class="text-light">Diperbarui</th>
                                  <th class="text-light text-center ">Aksi</th>

                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($data as $item)
                                  <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->stok}} <strong class="text-info" >{{ $item->satuan}}</strong> </td>
                                    <td>{{ number_format($item->harga_jual,0,',','.') }} <strong class="text-danger" >IDR</strong> </td>
                                    <td>{{ \Carbon\Carbon::parse($item->updated_at)->isoFormat('dddd D MMMM YYYY') }}</td>
                                    <td class="text-center" >
                                        <a href="/barang/{{ $item->id }}" class="btn btn-warning btn-md  rounded-2" > <i class="mdi mdi-lead-pencil"></i> </a>
                                        <form action="/barang/{{ $item->id }}" method="post" class="d-inline" >
                                            @method("DELETE")
                                        @csrf
                                        <input type="hidden" value="{{ $item->nama_barang }}" name="nama_barang">
                                        <button class="btn btn-danger btn-icon  rounded-2" onclick="return confirm('Yakin data {{ $item->nama_barang }} akan dihapus.? ') " type="submit"> <i class="mdi mdi-delete text-light"></i> </button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            {{-- form --}}
            <form action="/barang" method="post">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('kode_barang') is-invalid  @enderror" id="kode_barang" name="kode_barang" placeholder="a" value="{{ old('kode_barang') }}" onkeyup="myFunction()">
                    <label for="kode_barang">Kode barang</label>
                    @error('kode_barang')
                        <small class="text-danger" style="margin-left: 8px;" > {{$message}} </small>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nama_barang') is-invalid  @enderror" id="nama_barang" name="nama_barang" placeholder="a" value="{{ old('nama_barang') }}">
                    <label for="nama_barang">Nama Barang</label>
                    @error('nama_barang')
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

                <div class="form-floating mb-3">
                    <select class="form-select  @error('jenis') is-invalid  @enderror" id="floatingSelectGrid" aria-label="Floating label select example" name="jenis">
                        @foreach ($jenisBarang as $item)
                                <option value="{{$item->id}}">{{$item->jenis}}</option>
                            @endforeach
                      </select>
                    <label for="nama_barang">Jenis</label>
                    @error('jenis')
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


                <div class="row g-2 mb-3 ">
                    <div class="col-md">
                      <div class="form-floating">
                        <input type="number" class="form-control @error('stok') is-invalid  @enderror" id="stok" name="stok" placeholder="a" value="{{ old('stok') }}">
                        <label for="stok">Stok</label>
                        @error('stok')
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
                    </div>
                    <div class="col-md">
                      <div class="form-floating">
                        <select class="form-select  @error('satuan') is-invalid  @enderror" id="floatingSelectGrid" aria-label="Floating label select example" name="satuan">
                            @foreach ($satuan as $item)
                                <option value="{{$item->id}}">{{$item->satuan}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelectGrid">Satuan</label>
                        @error('satuan')
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
                    </div>
                  </div>

                <div class="form-floating mb-3">
                    <input type="number" class="form-control  @error('harga_beli') is-invalid  @enderror" id="harga_beli" name="harga_beli" placeholder="a" value="{{ old('harga_beli') }}">
                    <label for="harga_beli">Harga Beli</label>
                    @error('harga_beli')
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

                <div class="form-floating mb-3">
                    <input type="number" class="form-control @error('harga_jual') is-invalid  @enderror" id="harga_jual" name="harga_jual" placeholder="a" value="{{ old('harga_jual') }}">
                    <label for="harga_jual">Harga Jual</label>
                    @error('harga_jual')
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

                <div class="form-floating mb-3">
                    <select class="form-select  @error('supplier') is-invalid  @enderror" id="floatingSelectGrid" aria-label="Floating label select example" name="supplier">
                        @foreach ($supplier as $item)
                                <option value="{{$item->id}}">{{$item->nama_supplier}}</option>
                            @endforeach
                      </select>
                    <label for="nama_barang">Supplier</label>
                    @error('supplier')
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
