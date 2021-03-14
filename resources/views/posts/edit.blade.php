@extends('layouts.app')
<!-- route('posts.store') -->
<!-- route('posts.update', ['post' => $post]) -->
@section('content')
<form method="POST" action="{{ route('posts.update', ['post' => $post['id']] ) }}">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" value="{{$post['title']}}">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label" >Description</label>
      <textarea class="form-control" name="description">{{$post['description']}}</textarea>
    </div>

    <div class="mb-3">
      <label for="post_creator" class="form-label">Post Creator</label>
      <select class="form-control" name="user_id">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
  </form>

@endsection