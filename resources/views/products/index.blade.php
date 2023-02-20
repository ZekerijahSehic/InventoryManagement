@extends('layout/layout')
@extends('layout/header')
@section('content')
    @foreach($products as $product)
        <div class="product-box">
            <div>
                <div>
                    <p class="product-title"> {{ $product->name }}</p>
                </div>
                <div>
                    <p> <span> Category: </span>{{ $product->category->name }}</p>
                </div>
                <div>
                    <p> <span> Description: </span> <br> {{ $product->description }}</p>
                </div>
                <div>
                    <p> <span> Price: </span> {{ $product->price }} EUR </p>
                </div>
{{--                @if(auth()->check() && (auth()->user()->hasRole('administrator') ||  auth()->user()->hasRole('manager')) )--}}
                    <div>
                        <button type="submit" class="btn-small btn-edit">
                            <a href="/products/{{$product->id}}/edit " class="">Edit</a>
                        </button>
                        <form action="/products/{{$product->id}}" method="post" style="display: inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-small btn-delete">Delete</button>
                        </form>
                    </div>
{{--                @endif--}}
            </div>
        </div>
    @endforeach
@endsection



