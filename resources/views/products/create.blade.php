@extends('layout.app')

@section('title', 'Создание карточки товара')

@section('content')
    <div class="card">
        <div class="card-header">
            Создание нового товара
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Наименование</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="mb-3">
                    <label for="img_link" class="form-label">Фото</label>
                    <input type="text" class="form-control" name="img_link" id="img_link">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>

                <div class="mb-3">
                    <label for="category_id">Категория товара: </label>
                    <select name="category_id" id="category_id">
                        <optgroup label="Категории">
                            @foreach(\App\Models\Category::pluck('name', 'id') as $id => $name)))
                            <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Создать</button>
                <a href="#">
                    <button type="button" class="btn btn-primary">Отмена</button>
                </a>
            </form>
        </div>
    </div>
@endsection
