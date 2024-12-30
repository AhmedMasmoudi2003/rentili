<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
      body {
        background-image: url('{{ asset('images/background.jpg') }}');
          background-size: cover;
          background-position: center;
          min-height: 100vh;
          margin: 0;
          justify-content: center;
          align-items: center;
        }
        .bg-body-tertiary {
            background-color: #2b2b2b !important;
        }
        .navbar-brand{
            color: white;
        }
        .navbar-brand:hover{
            color: rgb(193, 255, 193);
        }
        .container {
          position: relative;
          z-index: 1; /* Ensure content is above the pseudo-element */
          border-radius: 10px;
          margin-top: 20px;
          padding: 20px;
          background-color: rgba(255, 255, 255, 0); /* Transparent background for text */
        }

        .container::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          backdrop-filter: blur(10px);
          -webkit-backdrop-filter: blur(10px); /* For Safari */
          background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent background */
          border-radius: 10px;
          z-index: -1; /* Position behind the content */
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
          <!-- Brand -->
          <a class="navbar-brand" href="#">Rentili</a>
  
          <!-- Toggler for Mobile View -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarNav">
              <!-- Left Links -->
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link text-white" href="#">Home</a>
                  </li>
  
                  <!-- Appartments Dropdown -->
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarAppartments" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Appartments
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarAppartments">
                          <li><a class="dropdown-item" href="{{ route('appartments.index') }}">View All Appartments</a></li>
                          <li><a class="dropdown-item" href="{{ route('appartments.create') }}">Add New Appartment</a></li>
                      </ul>
                  </li>
  
                  <!-- Clients Dropdown -->
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarClients" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Clients
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarClients">
                          <li><a class="dropdown-item" href="{{ route('clients.index') }}">View All Clients</a></li>
                          <li><a class="dropdown-item" href="{{ route('clients.create') }}">Add New Client</a></li>
                      </ul>
                  </li>
              </ul>
  
              <!-- Search Form -->
              <form class="d-flex" role="search" action="{{ route('appartments.search') }}" method="POST">
                  @csrf
                  <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-success" type="submit">Search</button>
              </form>
          </div>
      </div>
  </nav>
  


    <main class="mt-5 container">
      @yield('content')
    </main>
    @if (session('success'))
      <div class="alert alert-success mt-auto">
        {{ session('success') }}
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger mt-auto">
        {{ session('error') }}
      </div>
    @endif
  </body>
</html>