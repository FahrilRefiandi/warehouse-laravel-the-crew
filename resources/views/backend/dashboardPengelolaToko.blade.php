@extends('backend.componens.layout')

@section('title',"Dashboard")
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">Dashboard</a>
                        </li>
                        {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent ">
                <div class="card-body">

                    {{-- count --}}
                    <div class="row">

                        {{-- pesanan --}}
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 fs-4 ">
                                                Pesanan (Bulanan).</div>
                                            <div class="h5 mb-0 mt-3 font-weight-bold ">{{$pesanan}} Pesanan.</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-cart-shopping fa-3x "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (Auth::user()->level == 0)
                        {{-- terjual --}}
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-4 fs-4 ">
                                                Barang Terbeli (Bulanan)</div>
                                            <div class="h5 mb-0 mt-3 font-weight-bold ">{{$barangTerjual}} Terbeli.</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        {{-- terjual --}}
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 fs-4">
                                                Barang Terjual (Bulanan)</div>
                                            <div class="h5 mb-0 mt-3 font-weight-bold ">{{$barangTerjual}} Terjual.</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- barang --}}
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 fs-4">Barang
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold  mt-3 ">{{ $barang }} Tersedia. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-boxes-stacked fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- terkirim --}}
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 fs-4">
                                                Barang Dikirim.</div>
                                            <div class="h5 mb-0 font-weight-bold mt-3">{{ $terkirim }} Terkiirim.</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-truck-ramp-box fa-3x "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- count --}}
                    {{-- table --}}
                    <div class="row mt-5 ">
                        <div class="col">
                        <div class="card shadow-lg">
                            <div class="card-body">
                            <h4 class="card-title mb-3 ">  Pesanan {{Auth::user()->nama}}  </h4>

                            {{-- table --}}
                            <table class="table">
                                <thead>
                                  <tr class="bg-dark">
                                    <th scope="col" class="text-light">#</th>
                                    <th scope="col" class="text-light">Kode Pesanan</th>
                                    <th scope="col" class="text-light">Nama Toko</th>
                                    <th scope="col" class="text-light">Alamat</th>
                                    <th scope="col" class="text-light">Status</th>
                                    <th scope="col" class="text-light">Waktu</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderTerbaru as $item)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item->kode_pesanan }}</td>
                                        <td>{{ $item->nama_toko }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        @php
                                        if($item->status == 0){
                                            $bg="bg-secondary";
                                            $ketStatus="Belum ada respon.";
                                        }elseif ($item->status == 1) {
                                            $bg="bg-danger";
                                            $ketStatus="Pesanan dibatalkan.";
                                        }elseif ($item->status == 2) {
                                            $bg="bg-success";
                                            $ketStatus="Pesanan sedang diproses.";
                                        }elseif ($item->status == 3) {
                                            $bg="bg-warning";
                                            $ketStatus="Pesanan sedang dalam perjalanan.";
                                        }else {
                                            $bg="bg-danger";
                                            $ketStatus="Error";
                                        }
                                    @endphp
                                        <td> <small class="{{$bg}} text-light px-2 py-2 rounded-2">{{$ketStatus}}</small></td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('H:m dddd,DD MMMM YYYY') }}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            {{-- table --}}

                            </div>
                        </div>
                        </div>
                        {{-- <div class="col-sm-4">
                        <div class="card shadow-lg">
                            <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        </div> --}}
                    </div>
                    {{-- table --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
