@extends('layouts.nav')
@section('content')
    <div class="container">
        <h3 class="text-center mt-3"><b class="text-danger">create new category</b></h3>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1"> inter the name of category:</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">cancel</a>
            </form>
    </div>
@endsection

