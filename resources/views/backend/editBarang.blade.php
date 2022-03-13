@extends('backend.componens.layout')

@section('title',"Edit data barang $data->nama_barang " )
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit data barang.</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit data barang {{ $data->nama_barang }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- bagian edit -->

                    {{-- Form --}}
                    <form action="/barang/{{$data->id}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('kode_barang') is-invalid  @enderror" id="kode_barang" name="kode_barang" placeholder="a" value="{{ $data->kode_barang }}" onkeyup="myFunction()" >
                            <label for="kode_barang">Kode barang</label>
                            @error('kode_barang')
                                <small class="text-danger" style="margin-left: 8px;" > {{$message}} </small>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_barang') is-invalid  @enderror" id="nama_barang" name="nama_barang" placeholder="a" value="{{ $data->nama_barang }}">
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
                                        <option @if ($item->id == $data->jenis_id) selected @endif value="{{$item->id}}">{{$item->jenis}}</option>
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
                                <input type="number" class="form-control @error('stok') is-invalid  @enderror" id="stok" name="stok" placeholder="a" value="{{ $data->stok }}">
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
                                        <option  @if ($item->id == $data->satuan_id) selected @endif value="{{$item->id}}">{{$item->satuan}}</option>
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
                            <input type="number" class="form-control  @error('harga_beli') is-invalid  @enderror" id="harga_beli" name="harga_beli" placeholder="a" value="{{ $data->harga_beli }}">
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
                            <input type="number" class="form-control @error('harga_jual') is-invalid  @enderror" id="harga_jual" name="harga_jual" placeholder="a" value="{{ $data->harga_jual }}">
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
                                        <option  @if ($item->id == $data->supplier_id) selected @endif value="{{$item->id}}">{{$item->nama_supplier}}</option>
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

                        <nav class="navbar navbar-light">
                            <div class="container-fluid justify-content-center ">
                                <a href="/barang" class="btn btn-danger me-2"> Kembali </a>
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
