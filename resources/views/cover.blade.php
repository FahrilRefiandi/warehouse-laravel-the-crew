
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/cover.css')}}" />
    <title>SIM Warehouse The Crew</title>
    @laravelPWA
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #3bd1ff">
      <div class="container">
        <a class="navbar-brand" href="#">Warehouse</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
           @if (Auth::user())
            <a class="nav-link" href="/dashboard">Dashboard</a>
           @else
            <a class="nav-link" href="/login">Login</a>
            <a class="nav-link" href="/register">Register</a>
           @endif
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <section class="p-5 mb-4 rounded-3 text-center broton">
      <img src="{{asset('asset/image/user.png')}}" alt="Warehouse" width="200" />
      <h1 class="display-4">Warehouse</h1>
      <p class="lead">Management System Warehouse</p>
    </section>
    <!-- akhir jumbotron -->



            <!-- wave -->
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#3bd1ff"
          fill-opacity="1"
          d="M0,128L80,149.3C160,171,320,213,480,218.7C640,224,800,192,960,170.7C1120,149,1280,139,1360,133.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"
        ></path>
      </svg>
      <!-- wave -->
      <!-- Footer -->
      <footer class="text-center text-white" style="background-color: #3bd1ff">
        <!-- Grid container -->
        <div class="container p-4"></div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0)">
          <!-- Copyright © 2022 -->
          Copyright © 2022
          <a class="text-decoration-none" style="color: #415751" " target="__blank"> <b>The Crew.</b></a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->

    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
