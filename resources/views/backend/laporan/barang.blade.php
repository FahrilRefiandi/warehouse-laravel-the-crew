@extends('backend.componens.layoutLaporan')

@section('title', 'Laporan Barang')

@section('content')

{{-- Menampilkan Judul --}}
<div class=" container text-center mt-4 border-top border-bottom mb-5 p-3 ">
    <h3 class="mb-2"> <b> Laporan Data dan Stok Barang. </b></h1>
    <h5>Dicetak oleh {{Auth::user()->nama}} Pada <u>{{ \Carbon\Carbon::parse(now())->isoFormat('dddd,DD MMMM YYYY H:m ') }}</u> </h5>
</div>
{{-- Menampilkan Judul --}}

<div class="">
{{-- Menampilkan Table Barang --}}
<div class="table-responsive">
    <table class="table">
        <thead class="bg-dark text-light" >
          <tr>
            <th scope="col w-10">#</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Stok</th>
            <th scope="col">Kategori</th>
            <th scope="col">Diupdate</th>
          </tr>
        </thead>
        <tbody>
            {{-- @php
                dd($data);
            @endphp --}}
            @foreach ($data as $item)
            <tr>
                <th>{{$loop->iteration}}.</th>
                <td>{{$item->kode_barang}}</td>
                <td>{{$item->nama_barang}}</td>
                <td>{{$item->stok .' '. $item->satuan}}</td>
                <td>{{$item->jenis}}</td>
                <td>{{  \Carbon\Carbon::parse( $item->updated_at)->isoFormat('H:m,DD-MM-YYYY')}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
{{-- Menampilkan Table Barang --}}
</div>
<script>

    print();
    window.onafterprint = window.close;
</script>

@endsection
