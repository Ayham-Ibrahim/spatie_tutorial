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

    @can('create product')
        <a href="{{ route('products.create') }}" class="btn btn-primary">create new product</a>
    @endcan

    <a href="{{ route('categories.index') }}" class="btn btn-primary">back</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">category</th>
            <th scope="col">price</th>
            <th scope="col">description</th>
            <th scope="col">edit</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($products as $product )
            <tr>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <th scope="row">{{ $loop->index }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->desc }}</td>
                    <td>
                        @can('edit product')
                            <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">edit</a>
                        @endcan
                        @can('show product')
                            <a href="{{ route('products.show',$product->id) }}" class="btn btn-secondary">show</a>
                        @endcan

                        @can('delete product')
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
