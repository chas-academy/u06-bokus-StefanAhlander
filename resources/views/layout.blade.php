<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/bd5bbba34e.js" crossorigin="anonymous"></script>
  <title>
    @yield('title')
  </title>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-5">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/search">Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="/cart">Buy</a>
        </li>
        <li class="nav-item">
          <form action="/cart" method="POST">
            @csrf
            <input type="hidden" name="_method" value="delete" />
            <button class="nav-link btn btn-link text-white" type="submit">Clear</button>
          </form>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="/cart"><i class="fas fa-shopping-cart"></i> {{ ($cart > 0) ? $cart : '' }}</a>
      </span>
    </nav>

  @yield('content')
  </div>
</body>
</html>