
@extends('layouts.admin')
Use

@section('content')
    <h1>Users</h1>

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
      <p>These are all the users</p>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>updated</th>
          </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)


          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->role)
                    {{$user->role->name}}
                @endif
            </td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
            @endforeach
        @endif
        </tbody>
      </table>
    </div>

    </body>
    </html>

@endsection

