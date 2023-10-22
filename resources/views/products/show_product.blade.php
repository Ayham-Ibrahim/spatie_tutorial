@extends('layouts.nav')
@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-2">back to Products page</a>
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <h6 class="card-text" ><strong>{{$product->category->name}}</strong></h6>
                <p><strong style="color: red;">Price: {{$product->price}}</strong></p>
                <p><strong >description: {{$product->desc}}</strong></p>
            </div>
        </div>
    </div>
@endsection
