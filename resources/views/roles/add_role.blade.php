@extends('layouts.nav')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3"><b class="text-danger">create new role</b></h3>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1"> inter the name of role:</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <p class="mt-3"><b>please choose the permissions of this role</b></p>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="flexCheckDefault">
                    {{-- permission[] لاننا سنخزن فيها أكثر من سماحية للدور الواحد  --}}
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

