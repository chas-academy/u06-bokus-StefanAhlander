<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>
    @yield('title')
  </title>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <ul class="navbar-nav">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item {{ Request::is('search') ? 'active' : '' }}">
          <a class="nav-link" href="/search">Search</a>
        </li>
        <li class="nav-item {{ Request::is('buy') ? 'active' : '' }}">
          <a class="nav-link" href="/buy">Buy</a>
        </li>
        <li class="nav-item {{ Request::is('clear') ? 'active' : '' }}">
          <a class="nav-link" href="/clear">Clear</a>
        </li>
      </ul>
    </nav>
  </div>

  @yield('content')
</body>
</html>