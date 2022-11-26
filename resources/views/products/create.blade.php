@extends('layouts.app')
@section('content')

<h1>Create a product</h1>

<form method="POST" action="{{route('products.store')}}">
    @csrf
    <div class="form-row">
        <label for="">Title</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
    </div>
    <div class="form-row">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
    </div>
    <div class="form-row">
        <label for="">Price</label>
        <input type="number" min="1.00" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
    </div>
    <div class="form-row">
        <label for="">Stock</label>
        <input type="number" min="0" class="form-control" name="stock">
    </div>
    <div class="form-row">
        <label for="">Status</label>
        <select class="form-select" name="status" value="{{ old('status') }}">
            <option value="" selected>Select...</option>
            <option {{ old('status') == 'available' ? 'selected' : ''}} value="available">Available</option>
            <option {{ old('status') == 'unavailable' ? 'selected' : ''}} value="unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Create</button>
    </div>
</form>
@endsection