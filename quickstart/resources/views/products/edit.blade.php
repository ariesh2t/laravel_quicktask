@extends('layouts.app')
@section('title')
    {{ __('editPs') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('editPs') }}</h2>
        <a href="{{ route('products.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-arrow-rotate-left"></i> {{__('list') . ' ' . __('ps')}}
        </a>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="mb-3 form-group">
            <label for="product_name" class="form-label">{{ __('product_name') }}</label>
            <input type="text" class="form-control" style="padding: 0.5em" name="product_name" value="{{ $product->product_name }}" id="product_name">
            @error('product_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="product_desc" class="form-label">{{ __('desc') }}</label>
            <input type="text" class="form-control" style="padding: 0.5em" name="product_desc" value="{{ $product->product_desc }}" id="product_desc">
            @error('product_desc')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="price" class="form-label">{{ __('price') }}</label>
            <input type="number" step="0.01" min="0" class="form-control" style="padding: 0.5em" name="price" value="{{ $product->price }}" id="price">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="amount" class="form-label">{{ __('amount') }}</label>
            <input type="text" min="1" class="form-control" style="padding: 0.5em" name="amount" value="{{ $product->amount }}" id="amount">
            @error('amount')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="category" class="form-label">{{ __('cs') }}</label>
            <select class="form-select" name="category_id" aria-label="Default select example">
                <option>{{ __('selectCs') }}</option>
                @foreach($categories as $category)
                    @if($category->id == $product->category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->cat_name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                    @endif

                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">{{ __('save') }}</button>
    </form>
@endsection
