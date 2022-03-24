<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @laravelPWA
    <title>WAREHOUSE The Crew.</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top nav-uk ">
        <div class="container">
          <a class="navbar-brand" href="#">The Crew.</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              @if (Auth::user())
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">Dashboard</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    <!-- navbar -->

    <!-- cover -->
    <div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
        <!-- Overlay -->

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item slides active">
            <div class="slide-1">
                <div class="overlay"></div>
            </div>
            <div class="hero">
              <hgroup class="typewriter" >
                  <h1 class="typing" >Warehouse The Crew.</h1>
                  <h3 class="typing" >Anda memiliki masalah stok barang.? Order di kami yuk.🙂</h3>
                  <h4 class="typing" >Jangan khawatir,disini semua ada loh.</h4>
              </hgroup>
              <div class="">
                  <small class="me-3" ><u>Belum punya akun kan.?</u> </small>
                  <a href="/register" class="btn btn-hero  btn-lg" role="button">Daftar disini dong.</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- cover -->

    <!-- fitur -->

  <div class="container px-4 py-5" data-aos="fade-up" id="icon-grid">
    <h2 class="pb-2 border-bottom">Fitur Warehouse The Crew.</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
      <div class="col d-flex align-items-start">
        <i class="fa-solid fa-box-open flex-shrink-0 me-3" style="width: 1.75em;height:1.75em " ></i>
        <div>
            <h4 class="fw-bold mb-0">Menambahkan data barang.</h4>
          <p>Data barang berupa nama barang,stok,jenis barang,DLL.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <i class="fa-solid fa-cart-shopping flex-shrink-0 me-3" style="width: 1.75em;height:1.75em " ></i>
        <div>
          <h4 class="fw-bold mb-0"> Pengelola toko dapat melakukan pesanan.</h4>
          <p>Dengan mengisi data toko,alamat dan barang pesanan, pesanan akan diantar ke alamat toko.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <i class="fa-brands fa-buromobelexperte flex-shrink-0 me-3" style="width: 1.75em;height:1.75em " ></i>
        <div>
          <h4 class="fw-bold mb-0">Laporan barang dan stok.</h4>
          <p>Memudahkan pengelola gudang membuat laporan stok barang.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <i class="fa-solid fa-users-gear flex-shrink-0 me-3" style="width: 1.75em;height:1.75em " ></i>
        <div>
          <h4 class="fw-bold mb-0">Laporan Pesanan.</h4>
          <p>Memudahkan pengelola gudang membuat laporan pesanan.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <i class="fa-solid fa-users-gear flex-shrink-0 me-3" style="width: 1.75em;height:1.75em " ></i>
        <div>
          <h4 class="fw-bold mb-0">Reset password.</h4>
          <p>Bagi pengguna yang lupa password kami menghadirkan fitur ini untuk mengatasi masalah anda.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <i class="fa-solid fa-table flex-shrink-0 me-3" style="width: 1.75em;height:1.75em " ></i>
        <div>
          <h4 class="fw-bold mb-0">Data terbaru.</h4>
          <p>Data yang ada merupakan data terbaru dari kami.</p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <i class="fa-solid fa-arrow-up-from-bracket flex-shrink-0 me-3" style="width: 1.75em;height:1.75em "></i>
        <div>
          <h4 class="fw-bold mb-0">Update setiap saat.</h4>
          <p>Jangan khawatir jika fitur yang anda butuhkan belum ada.kami update setiap saat kok.😊</p>
        </div>
      </div>
    </div>
  </div>
    <!-- fitur -->

    <!-- team -->
    <section id="team" class="team-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading text-center" data-aos="zoom-in" >
                        <h2>Our <span>Team.</span></h2>
                        <h4>Anggota tim <span  >The Crew</span> dan pembagian tugas. </h4>
                    </div>
                </div>
            </div>
                <div class="row team-items">

                    <div class="col-3 single-item" data-aos="fade-right" data-aos-offset="400" >
                        <div class="item">
                            <div class="thumb"data-aos="fade-right">
                                <img class="img-fluid" src="{{asset('images/team/fahril.jpg')}}" alt="Fahril Refiandi">
                                <div class="overlay">
                                    <h4>FAHRIL REFIANDI.</h4>
                                    <p>
                                        The Crew Team.
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="twitter">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/farilannd"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="bg-dark rounded-circle">
                                                <a href="#"><i class="fab fa-tiktok"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-user"></i></a>
                                </span>
                                <h4>FAHRIL REFIANDI</h4>
                                <span>Project Manager</span>
                                <span>Programmer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 single-item" data-aos="fade-right" data-aos-offset="400" >
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">
                                <div class="overlay">
                                    <h4>Dara Ilma Deudoena.</h4>
                                    <p>
                                        The Crew Team.
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="instagram">
                                                <a href="https://www.instagram.com/daradona_/"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-user"></i></a>
                                </span>
                                <h4>Dara Ilma Deudoena.</h4>
                                <span>Web Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 single-item" data-aos="fade-left" data-aos-offset="400"  >
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">
                                <div class="overlay">
                                    <h4>Tegar Try B.D</h4>
                                    <p>
                                          The Crew Team
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-user"></i></a>
                                </span>
                                <h4>Tegar Try B.D</h4>
                                <span>Web Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 single-item" data-aos="fade-left" data-aos-offset="400" >
                        <div class="item">
                            <div class="thumb">
                                <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">
                                <div class="overlay">
                                    <h4>Tita Arum Sheila Santik</h4>
                                    <p>
                                        The Crew Team.
                                    </p>
                                    <div class="social">
                                        <ul>
                                            <li class="instagram">
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="vimeo">
                                                <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <span class="message">
                                    <a href="#"><i class="fas fa-user"></i></a>
                                </span>
                                <h4>Tita Arum Sheila Santik</h4>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- team -->


    <!-- footer -->
    <div class="container" data-aos="fade-up" >
        <footer class="row row-cols-5 py-5 my-5 border-top">
          <div class="col">
            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
              <img src="{{asset('images/logo/logo coder.png')}}" class="bi me-2" width="" height=""><use xlink:href="#bootstrap"/></img>
            </a>
            <!-- <p class="text-muted">Copyright &copy; 2021 Fahril Refiandi</p> -->
          </div>

          <div class="col">

          </div>

          <div class="col">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>

          <div class="col">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>

          <div class="col">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
            </ul>
          </div>
        </footer>
      </div>

      <div class="container mb-2 justify-content-center border-bottom">
          <h6 class=" text-muted text-center mb-3">Copyright &copy; 2022. The Crew <span>Warehouse Management System.</span> </h6>
      </div>
    <!-- footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });
      </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/cover.js') }}"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
