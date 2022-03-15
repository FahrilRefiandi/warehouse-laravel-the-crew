@extends('backend.componens.layout')

@section('title',"Profile ".Auth::user()->nama)
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Profil {{$data->nama}} </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
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
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3">
            <div class="card">
                <div class="card-body">
                    <div class="mt-4 text-center ">
                        @if ($data->foto_profil)
                        <img src="{{Storage::url($data->foto_profil)}}" class="rounded-circle" id="preview" width="150" height="150px" />
                        @else
                        <img src="{{Storage::url('/foto-profil/user.png')}}" class="rounded-circle" id="preview" width="150" height="150px" />
                        @endif
                        <h4 class="card-title mt-2">{{$data->nama}}</h4>
                        <h6 class="card-subtitle">{{$data->username}}</h6>

                        <form action="/update-foto-profile/{{ $data->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="file" class="form-control  @error('foto_profil') is-invalid @enderror" id="foto_profil" name="foto_profil">
                                <button class="btn btn-outline-secondary" type="submit">Simpan</button>
                              </div>
                              @error('foto_profil')
                                <div class="ml-3 text-danger">{{ $message }}</div>
                                @enderror
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" method="POST" action="/profil/{{ $data->id }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}" >
                                @error('nama')
                                    <div class="ml-3 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text"  class="form-control form-control-line @error('username') is-invalid @enderror" name="username" value="{{ $data->username }}">
                                @error('username')
                                    <div class="ml-3 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Password Lama</label>
                            <div class="col-md-12">
                                <input type="password" name="password_lama"  class="form-control form-control-line @error('password_lama') is-invalid @enderror">
                                @error('password_lama')
                                    <div class="ml-3 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Password Baru</label>
                            <div class="col-md-12">
                                <input type="password" name="password_baru" class="form-control form-control-line @error('password_baru') is-invalid @enderror">
                                @error('password_baru')
                                    <div class="ml-3 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Konfirmasi Password Baru</label>
                            <div class="col-md-12">
                                <input type="password" name="konfirmasi_password" class="form-control form-control-line @error('password_baru') is-invalid @enderror">
                                @error('password_baru')
                                    <div class="ml-3 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <nav class="navbar navbar-light">
                            <div class="container-fluid justify-content-center ">
                                <a href="/dashboard" class="btn btn-danger me-2"> Kembali </a>
                                <button type="submit" class="btn btn-success"> Simpan </button>
                            </div>
                          </nav>

                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    </div>

    <script>
        document.getElementById("foto_profil").onchange = function () {
        var reader = new FileReader();
            reader.onload = function (e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };

            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        };
      </script>

@endsection
