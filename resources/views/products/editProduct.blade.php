@extends('layouts.nav')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3 class="text-center mt-3"><b class="text-danger">create new product</b></h3>
        <form action="{{ route('products.update',$product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
              <label class="mb-2" for="exampleInputEmail1"> product's name:</label>
              <input type="text" name="name" value="{{$product->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group mt-3">
              <label class="mb-2" for="exampleInputEmail1"> product's category:</label>
              <select name="category" class="form-select" aria-label="Default select example">
                @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group mt-3">
              <label class="mb-2" for="exampleInputEmail1"> price:</label>
              <input type="text" name="price" value="{{$product->price}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group mt-3">
              <label class="mb-2" for="exampleInputEmail1"> description:</label>
              <input type="text" name="description" value="{{$product->desc}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            <a href="{{route('products.index')}}" class="btn btn-secondary mt-3" style="margin-top: 10px;">cancel</a>

        </form>
    </div>
</body>
</html>

