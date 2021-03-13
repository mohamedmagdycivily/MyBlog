@extends('layouts.app')
<!-- route('posts.store') -->
<!-- route('posts.update', ['post' => $post]) -->
@section('content')
<form method="POST" action="{{ route('posts.update', ['post' => $post]) }}">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
  </form>

@endsection