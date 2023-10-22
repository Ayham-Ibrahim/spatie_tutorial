@extends('layouts.nav')
@section('content')
    <div class="container">
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

    <h3 class="text-center mt-3"><b class="text-danger">my categories</b></h3>
      @can('create category')
        <a href="{{ route('categories.create') }}" class="btn btn-primary">create new category</a>
      @endcan
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">edit</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category )
            <tr>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <th scope="row">{{ $loop->index }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        @can('edit category')
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary">edit</a>
                        @endcan

                        @can('show products of category')
                            <a href="{{ route('categories.show',$category->id) }}" class="btn btn-secondary">show</a>
                        @endcan

                        @can('delete category')
                            <button type="submit" class="btn btn-danger">delete</button>
                        @endcan
                    </td>
                </form>
            </tr>
            @endforeach

        </tbody>
      </table>
 </div>
@endsection
