@extends('layout')

@section('title')
  Search
@endsection

@section('content')
  <h1 class="text-center">Search</h1>
  <div class="col-lg-6 mx-auto">
    <form class="well form-horizontal" method="GET" action="/search_results">
      <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" placeholder="Input author name">
      </div>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Input book title">
      </div>
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>
@endsection
