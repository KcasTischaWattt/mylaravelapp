@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    @role('admin')
    <a href="{{route('products.create')}}">
    <button class="btn btn-success">Создать товар</button>
    </a>
    @endrole
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" class="form-control" name="search" id="search" placeholder="Поиск по названию">
        <button type="submit" class="btn">Поиск</button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Фото</th>
            <th scope="col">Категория</th>
            <th scope="col">Описание</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td><img width="100" height="100" src="{{ $product->img_link }}" alt="изображение товара"></td>
                <td>{{ $product->category->name  }}</td>
                <td>{{ $product->description  }}</td>
                <td>{{ $product->price  }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.put', $product->id) }}">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                        <button type="submit" class="btn btn-danger btn-sn">В корзину</button>
                    </form>
                    <a href="{{route('products.show', $product->id)}}">
                        <button class="btn btn-primary btn-sm">Просмотреть</button>
                    </a>
                    @role('admin')
                    <a href="{{route('products.edit', $product->id)}}">
                    <button class="btn btn-info btn-sm">Изменить</button>
                    </a>
                    <form method="POST" action="{{route('products.destroy', $product->id)}}">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                    @endrole
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
