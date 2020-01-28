@extends('layout')

@section('title')
  Search results
@endsection

@section('content')
  <h1 class="text-center">Search results</h1>

  <form method="POST" action="/cart">
  @csrf
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Book Id</th>
          <th>Author</th>
          <th>Title</th>
          <th>Price</th>
          <th>Buy</th>
        </tr>
      </thead>
      <tbody>
<!-- Iterate over the books-collection and render the results. -->
@foreach($books as $book)
        <tr>
          <td>{{ $book->id }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->price }}</td>
          <td>
            <button type="button" class="btn btn-secondary btn-sm subtract_book">-</button>
            <input type="text" class="text-center" name="{{ $book->id }}" value="0" size="1">
            <button type="button" class="btn btn-secondary btn-sm add_book">+</button>
          </td>
        </tr>
@endforeach

      </tbody>
    </table>
<!-- Check if the book-collection is not empty. If content render add to cart button. -->
@if($books->count() > 0)
    <button class="btn btn-primary" type="submit">Add to cart</button>
@endif
  </form>
@endsection
<!-- Load javascript to handle adding and subtracting books. Load script defered so that the page has time to render before the
      script is run. -->
  <script src="/js/main.js" defer></script>