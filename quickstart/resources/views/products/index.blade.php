@extends('layouts.app')
@section('title')
    {{ __('list') . ' ' . __('ps') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('list') . ' ' . __('ps') }}</h2>
        <a href="{{ route('products.create') }}" class="btn btn-info">
            <i class="fa-light fa-plus"></i> {{ __('addPs') }}
        </a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th>{{ __('product_name') }}</th>
            <th>{{ __('desc') }}</th>
            <th>{{ __('price') }}</th>
            <th>{{ __('amount') }}</th>
            <th>{{ __('cs') }}</th>
            <th>{{ __('func') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_desc }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->amount }}</td>
                <td>{{ $product->category->cat_name }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        @csrf
                        @method("DELETE")
                        <button type="submit" style="border: none; background: none" onclick="return confirm('{{ __('delPs') }}')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
