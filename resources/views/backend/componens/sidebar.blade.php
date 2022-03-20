@php
    use App\Models\Toko;
    $countRequest=Toko::where('status','0')->count();
@endphp
<aside class="left-sidebar" data-sidebarbg="skin5" style="background-color: #2a4d69">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" style="background-color: #2a4d69">
                <!-- a href side bar -->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

               

                {{-- Pegawai Gudang --}}
                    @if (Auth::user()->level == 1)
                    <h6 style="margin-left: 10px" class="text-light mt-4 sembunyikan">Pegawai Gudang</h6>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/pesanan"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Pesanan @if ($countRequest != 0) <small class="bg-danger px-1 py-1 rounded-2 m-5">{{ $countRequest }}</small> @endif </span>
                        </a>
                    </li>

                    <h6  style="margin-left: 10px" class="text-light mt-4 sembunyikan">Management data</h6>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/barang"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/jenis-barang"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Jenis Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/satuan"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Satuan</span>
                        </a>
                    </li>               
                {{-- Pegawai gudang --}}

                {{-- Administrator --}}
                    @elseif (Auth::user()->level == 2)

                    {{-- <h6 style="margin-left: 10px" class="text-light mt-4 sembunyikan">Administrator</h6> --}}

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/pesanan"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Pesanan @if ($countRequest != 0) <small class="bg-danger px-1 py-1 rounded-2 m-5">{{ $countRequest }}</small> @endif </span>
                        </a>
                    </li>

                    <h6  style="margin-left: 10px" class="text-light mt-4 sembunyikan">Management data</h6>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/barang"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/jenis-barang"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Jenis Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/satuan"
                            aria-expanded="false">
                            <i class="mdi mdi-account-network"></i>
                            <span class="hide-menu">Satuan</span>
                        </a>
                    </li>  

                    <h6 style="margin-left: 10px" class="text-light mt-4 sembunyikan">Administrator</h6>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/users"
                            aria-expanded="false">
                            <i class="mdi mdi-human"></i>
                            <span class="hide-menu">Pengguna</span>
                        </a>
                    </li> 

                 {{--Administrator  --}}
                @else

                <h6 style="margin-left: 10px" class="text-light mt-4 sembunyikan">PENGELOLA TOKO</h6>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/pesanan"
                        aria-expanded="false">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Pesanan</span>
                    </a>
                </li>
                    
                @endif

                

                <h6 style="margin-left: 10px" class="text-light mt-4 sembunyikan">Management akun</h6>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/profil"
                        aria-expanded="false">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="sidebar-link waves-effect waves-dark sidebar-link btn">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Logout</span>
                    </button>
                    </form>
                </li>


                {{-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Blank page</span>
                    </a>
                </li> --}}
                <!-- a href side bar -->
            </ul>
        </nav>
    </div>
</aside>
