@extends('layouts.app')
@section('title')
    {{ __('list') . ' ' . __('cs') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ __('list') . ' ' . __('cs') }}</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-info">
            <i class="fa-light fa-plus"></i> {{__('addCs')}}
        </a>
    </div>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th style="width: 20%">{{ __('cat_name') }}</th>
                <th>{{ __('desc') }}</th>
                <th style="width: 20%">{{ __('func') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->cat_name }}</td>
                    <td>{{ $category->cat_desc }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            <a href="{{ route('categories.edit', $category->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            @csrf
                            @method("DELETE")
                            <button type="submit" style="border: none; background: none" onclick="return confirm('{{__('delCs')}}')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
