@extends('layouts.app')
@section('title')
    {{ __('addCs') }}
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        <h2>{{ $title }}</h2>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-arrow-rotate-left"></i> {{ __('list') . ' ' . __('cs') }}
        </a>
    </div>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3 form-group">
            <label for="cat_name" class="form-label">{{ __('cat_name') }}</label>
            <input type="text" class="form-control" style="padding: 0.5em" name="cat_name" id="cat_name" placeholder="Ex: Nike ...">
            @error('cat_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-group">
            <label for="cat_desc" class="form-label">{{ __('desc') }}</label>
            <input type="text" class="form-control" style="padding: 0.5em" name="cat_desc"  id="cat_desc">
            @error('cat_desc')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">{{ __('save') }}</button>
    </form>
@endsection
