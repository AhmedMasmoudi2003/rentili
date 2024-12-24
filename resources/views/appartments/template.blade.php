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
          background-image: url('images/background.jpg'); /* Replace with your image */
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
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="d-flex flex-row align-items-start gap-2">
                <a class="navbar-brand">Rentili</a>
                <a class="navbar-brand" href="">Home</a>
                <a class="navbar-brand" href="">About</a>
            </div>
            @yield('search')
        </div>
      </nav>
      <main class="container">
        @yield('content')
      </main>
</body>
</html>