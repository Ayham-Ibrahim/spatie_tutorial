
@extends('layouts.nav')

@section('content')
    <div class="container mt-4">
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
        <h3 style="margin-bottom: 25px;text-align: center;">roles table</h3>
        @can('role-create')
            <a href="{{ route('roles.create') }}" class="btn btn-primary">add new role</a>
        @endcan
            <div class="row" style="margin-top:10px;">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">edit</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $index => $role)
                        <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td>{{ $role->name }}</td>
                            <td style="display: block ruby;">
                                @can('role-edit')
                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary">edit</a>
                                @endcan

                                @can('role-show')
                                    <a href="{{ route('roles.show',$role->id) }}" class="btn btn-secondary">show</a>
                                @endcan

                                @can('role-delete')
                                    <form action="{{ route('roles.destroy',$role->id) }}" method="post">
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

