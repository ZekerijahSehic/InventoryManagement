@extends('layout/layout')
@section('content')
<form action="/products/{{$product->id}}" method="post" class="create-form">
    <h3>Edit Product</h3>
    @csrf
    @method('put')
    <div class="create-group">
        <label for="name">Name</label>
        @if($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
    </div>
    <div class="create-group">
        <label for="price">Price</label>
        @if($errors->has('price'))
            <p class="text-danger">{{ $errors->first('price') }}</p>
        @endif
        <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
    </div>
    <div class="create-group">
        <label for="quantity">Quantity</label>
        @if($errors->has('quantity'))
            <p class="text-danger">{{ $errors->first('quantity') }}</p>
        @endif
        <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
    </div>
    <div class="create-group">
        <label for="description">Description</label>
        @if($errors->has('description'))
            <p class="text-danger">{{ $errors->first('description') }}</p>
        @endif
        <textarea name="description" id="description" rows="5" class="form-control">{{ $product->description }}</textarea>
    </div>
    <div class="create-group">
        <label for="category_id">Category</label>
        @if($errors->has('category_id'))
            <p class="text-danger">{{ $errors->first('category_id') }}</p>
        @endif
        <select name="category_id" id="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn-full btn-add">Save</button>
</form>
@endsection

