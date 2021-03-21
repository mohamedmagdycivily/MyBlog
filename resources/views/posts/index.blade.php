@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>

    <table class="table  mt-5 container">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope='col'>slug</th>
            <th scope="col">posted by</th>
            <th scope="col">created at</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->user ? $post->user->name : 'user not found'}}</td>
            <td>{{$post->created_at}}</td>
            <td class="col"  style="display: flex;" >

                <a style="margin-right: 5px;" href="{{ route('posts.show', [ 'post' => $post['id']]) }}" class="btn btn-info">View</a>

                <a style="margin-right: 5px;" href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-primary">Edit</a>

                <form method="post" action="{{ route('posts.destroy', ['post' => $post['id']]) }}">
                  @csrf
                  {{ method_field("DELETE") }}
                  <input type="submit" onclick="return confirm ('are you sure?')" class="btn btn-danger" value="Delete"> 
                </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$posts->links('posts.pagination')}}
</div>
@endsection
    