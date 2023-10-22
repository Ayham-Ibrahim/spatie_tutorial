@extends('layouts.nav')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3"><b class="text-danger">edit the  role</b></h3>
        <form action="{{ route('roles.update',$role->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="exampleInputEmail1"><b>the name of role:</b></label>
              <p>{{ $role->name }}</p>
            </div>
            <p class="mt-3"><b> the permissions of this role</b></p>
            @foreach ($rolePermissions as $rolePermission)
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault">
                     {{$rolePermission->name}}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary mt-3">cancel</a>
        </form>
    </div>
@endsection
