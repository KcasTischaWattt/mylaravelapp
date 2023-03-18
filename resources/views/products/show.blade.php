@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <img width="100" height="100" src="{{ $product->img_link }}" alt="изображение товара">
            <p>Цена: {{$product->price}}</p>
            <p>Описание: {{$product->description}}</p>
            <a href="{{route('products.index', $product->id)}}">
                <button class="btn btn-primary">Назад</button>
            </a>
        </div>
    </div>
@endsection
