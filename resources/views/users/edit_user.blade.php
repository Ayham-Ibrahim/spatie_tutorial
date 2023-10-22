@extends('layouts.nav')

@section('content')
<div class="container mt-4">
    <h2 style="text-align:center;color:red;"><b>edit user's information</b></h2>
    @if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>whoops!</strong> there were some problems with your input.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
    @endif
    <form class="row g-3" action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Username</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" aria-label="First name">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="inputPassword4"  class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password"  name="confirm-password" class="form-control" id="inputPassword4">
        </div>
       
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" name="status" class="form-select">
            <option value="active" selected>active</option>
            <option value="disable">disable</option>
          </select>
        </div>
        <div class="col-md-4">  
          <label for="inputState" class="form-label">role</label>
          <select name="role_name[]" class="form-control" multiple>
            @foreach($roles as $key => $role)
                 <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>
        
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
          <a href="{{ route('users.index') }}" class="btn btn-secondary">cancel</a>
        </div>
      </form>
    </div>
@stop
