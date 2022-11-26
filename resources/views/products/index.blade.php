@extends('layouts.app')
@section('content')
    <h1>List of Products</h1>

    <a href="{{route('products.create')}}" class="btn btn-success">Create</a>

    @empty ($products)
        
        <div class="alert alert-warning">
            The list is empty
        </div>

    @else

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->status}}</td>
                    <td class="d-flex">
                        <a href="{{route('products.show', ['product' => $product->id])}}" class="btn btn-warning">Show</a>
                        <a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-success">Edit</a>
                        <form method="POST" action="{{route('products.destroy', ['product' => $product->id])}}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty
@endsection