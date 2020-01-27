@extends('layout')

@section('title')
  Shopping cart
@endsection

@section('content')
  <h1 class="text-center">Your shopping cart</h1>

  <form method="post" action="/check-out">
  @csrf
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Book Id</th>
          <th>Author</th>
          <th>Title</th>
          <th>Price</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
@foreach($books as $book)
        <tr>
          <td>{{ $book->id }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->price }}</td>
          <td>{{ $book->amount }}</td>
        </tr>
@endforeach
/** Add total */
      </tbody>
    </table>
    <button class="btn btn-primary" type="submit">Buy</button>
    
  </form>
@endsection
