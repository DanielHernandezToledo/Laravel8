<div class="card">
    <img class="card-emg-top" src="{{ asset($product->images->first()->path) }}" height="500">
    <div class="card-body">
        <h4 class="card-title">${{$product->price}}</h4>
        <h4 class="card-title">{{$product->title}}</h4>
        <h4 class="card-text">{{$product->description}}</h4>
        <h4 class="card-title">{{$product->stock}} left</h4>
        <form action="{{route('products.carts.store', ['product' => $product->id])}}" class="d-inline" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Add To Cart</button>
        </form>
    </div>
</div>
