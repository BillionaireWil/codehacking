@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
      <h2>Basic Table</h2>
      <p>This table displays all the posts</p>
      <table class="table">
        <thead>
          <tr>
              <th>Post Id</th>
              <th>Photo</th>
              <th>User</th>
              <th>Category</th>
              <th>Title</th>
              <th>Body</th>
              <th>Created at</th>
              <th>Updated at</th>



          </tr>
        </thead>
        <tbody>

        {{--If the post variable has something then it will display the table--}}
        @if($posts)
            @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                  <td><img height="50" src="{{$post->photo ? $post->photo->file :  'http://placehold.it/400x400'}}  " alt=""></td>
                  <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
            @endforeach
        @endif

        </tbody>
      </table>
    </div>

    </body>
    </html>


@endsection