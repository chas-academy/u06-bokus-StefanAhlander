@extends('layout')

@section('title')
  Recommendations
@endsection

@section('content')
  <h1 class="text-center">Recommendations</h1>
  <h2 class="text-center">From the New York Times Bestseller List</h2>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Excerpt</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
<!-- Iterate over the books-collection and render the results. -->
@foreach($books as $book)
        <tr>
          <td><strong>{{ $book->title }}</strong></td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->description }}</td>
          <td><a href="{{ $book->amazon_product_url }}" target="_blank"><i class="fas fa-book-open"></i> More...</a></td>
        </tr>
@endforeach
      </tbody>
    </table>

    <a href="https://developer.nytimes.com/"><img src="{{ asset('img/poweredby_nytimes_200c.png') }}" alt="New York Times Logo"></a>
@endsection