@extends('backend.componens.layoutLaporan')

@section('title', 'Laporan Pesanan')

@section('content')

{{-- Menampilkan Judul --}}
<div class=" container text-center mt-4 border-top border-bottom mb-5 p-3 ">
    <h3 class="mb-2"> <b> Laporan Toko dan Pesanan . </b></h1>
    <h5>Dicetak oleh {{Auth::user()->nama}} Pada <u>{{ \Carbon\Carbon::parse(now())->isoFormat('dddd,DD MMMM YYYY H:m ') }}</u> </h5>
</div>
{{-- Menampilkan Judul --}}

<div class="">
{{-- Menampilkan Table Barang --}}
<div class="table-responsive">
    <table class="table">
        <thead class="bg-dark text-light" >
          <tr>
            <th scope="col" style="width: 20px">#</th>
            <th scope="col" colspan="2" >Nama Toko</th>
            <th scope="col" colspan="2" >Status</th>
            <th scope="col">Dibuat</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($tokos as $toko)
            <tr class="bg-secondary"  >
                <th>{{$loop->iteration}}.</th>
                <td colspan="2"> <b>{{$toko->nama_toko}} </b> </td>
                {{-- status --}}
                @php
                if($toko->status == 0){
                    $bg="bg-warning";
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
                {{-- status --}}
                <td colspan="2" > <small class="{{$bg}} text-light px-1 py-1 rounded-2">{{$ketStatus}}</small> </td>
                <td> <b>{{  \Carbon\Carbon::parse( $toko->updated_at)->isoFormat('H:m,DD-MM-YYYY')}} </b> </td>
                <tr>
                    <th  colspan="1"></th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Beli</th>
                    <th colspan="2" ></th>
                </tr>
                @foreach ($pesanans as $pesanan)
                    @if ($pesanan->toko_id == $toko->id)
                        <tr>
                            <td class="border-0"   colspan="1" ></td>
                            <td class="border-0" >{{$pesanan->kode_barang}}</td>
                            <td class="border-0" >{{$pesanan->nama_barang}}</td>
                            <td class="border-0" >{{$pesanan->stok.' '.$pesanan->satuan}}</td>
                        </tr>
                        @else
                        <tr>
                            <td class="border-0"  colspan="1" ></td>
                            <td class="border-0" >Belum ada pesanan.</td>
                            <td class="border-0" >Belum ada pesanan.</td>
                            <td class="border-0" >Belum ada pesanan.</td>
                        </tr>
                    @endif
                @endforeach
                <tr class="border-top" >
                    <td colspan="4"></td>
                    <td> <b>Alamat. </b></td>
                    <td > <b>{{$toko->alamat}}</b></td>
                </tr>
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
