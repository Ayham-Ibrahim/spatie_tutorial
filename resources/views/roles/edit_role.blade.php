@extends('layouts.nav')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3"><b class="text-danger">edit the  role</b></h3>
        <form action="{{ route('roles.update',$role->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="exampleInputEmail1"> inter the name of role:</label>
              <input type="text" name="name" class="form-control" value="{{ $role->name }}">
            </div>
            <p class="mt-3"><b>please choose the permissions of this role</b></p>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="flexCheckDefault"  {{ in_array($permission->id, $rolePermissions) ? ' checked' : '' }} >
                    <label class="form-check-label" for="flexCheckDefault">
                     {{$permission->name}}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">cancel</a>
        </form>
    </div>
@endsection
