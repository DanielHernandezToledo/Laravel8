<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
public function __construct(){
    $this->middleware('auth');
}

    public function index(){
        $products = Product::all();
        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(ProductRequest $request){

        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status,
        // ]);
        $product = Product::create($request->validated());
        //session()->flash('success', "The new product with id {$product->id} was created");
        return redirect()
        ->route('products.index')
        ->withSuccess("The new product with id {$product->id} was created");
        //->with('success', 'lo mismo de arriba');
    }

    public function show(Product $product){
        //$product = Product::findOrFail($product);

        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit(Product $product){
        return view('products.edit')->with([
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, Product $product){
        // $product = Product::find($product);

        $product->update($request->validated());
        return redirect()
        ->route('products.index')
        ->withInput($request->validated())
        ->withSuccess("The product with id {$product->id} was updated");
    }

    public function destroy(Product $product){
        // $product = Product::find($product);
        // $product->delete();
        $product->delete();
        return redirect()
        ->back()
        ->withSuccess("The product with id {$product->id} was deleted");
    }


}
