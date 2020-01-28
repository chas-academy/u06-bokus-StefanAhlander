@extends('layout')

@section('title')
  Shopping cart
@endsection

@section('content')
  <h1 class="text-center">Your shopping cart</h1>

  <form method="GET" action="/check_out">
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
        <tr>
          <td><strong>Total</strong></td>
          <td></td>
          <td></td>
          <td></td>
          <td><strong>{{ $total }} SEK</strong></td>
        </tr>
      </tbody>
    </table>
<!-- Check to see if there are books in the cart. If so render buy button. -->
@if(count($books) > 0)
    <button class="btn btn-primary" type="submit">Buy</button>
@endif 
  </form>
@endsection
