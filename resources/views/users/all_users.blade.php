
@extends('layouts.nav')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    <div class="container mt-4">
        <h3 style="margin-bottom: 25px;text-align: center;">Users table</h3>
        @if(Session::get('sucsses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('sucsses')}}
            </div>
        @endif
        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('message')}}
            </div>
        @endif
        @if(Session::get('del'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session::get('del')}}
            </div>
        @endif
        @can('add new user')
            <a href="{{ route('users.create') }}" class="btn btn-primary">add new user</a>
        @endcan
            <div class="row" style="margin-top:10px;">
                <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">Role</th>
                        <th scope="col">status</th>
                        <th scope="col"  class="text-center">edit</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- user's role  --}}
                            <td>
                                @if($user->getRoleNames()->isNotEmpty())
                                    @foreach($user->getRoleNames() as $role)
                                        <label>{{ $role }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if ($user->status == 'active')
                                    <span class="label text-success d-flex">
                                        <div class="dot-label bg-success ml-1" style="width: 7px;border-radius: 50%;height: 7px;align-items: stretch;margin-top: 8px;margin-right: 7px;"></div>{{ $user->status }}
                                    </span>
                                @else
                                    <span class="label text-danger d-flex">
                                        <div class="dot-label bg-danger ml-1" style="width: 7px;border-radius: 50%;height: 7px;align-items: stretch;margin-top: 8px;margin-right: 7px;"></div>{{ $user->status }}
                                    </span>
                                @endif
                            </td>
                            <td  class="text-center" style="display: block ruby;">
                                @can('edit user')
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">edit</a>
                                @endcan

                                @can('show user detail')
                                    <a href="{{ route('users.show',$user->id) }}" class="btn btn-secondary">show</a>
                                @endcan

                                @can('delete user')
                                    <form action="{{ route('users.destroy',$user->id) }}" method="post" class="mb-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
    </div>
    @endsection
</body>
</html>
