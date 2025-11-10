@php
    $locale = app()->getLocale(); 
@endphp

@extends('layouts.layout')
@section('title', __('Add Post'))
@section('content')
    <h3 class="mt-5 mb-5 text-center">@lang('New_Article')</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Add_Article')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('article.update', $article->id) }}" method="post" class="mb-5">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">                            
                            <label for="title">{{ __('Title') }} ({{ strtoupper(app()->getLocale()) }})</label>
                            <input type="text" class="form-control" id="title" name="title[{{ app()->getLocale() }}]"
                                value="{{ old('title.' . app()->getLocale(), $article->title[app()->getLocale()] ?? '') }}">
                        </div>
                        @if($errors->has('title'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('title') }}
                            </div>            
                        @endif                         
                        <div class="mb-3">
                            <label for="content">{{ __('Content') }} ({{ strtoupper(app()->getLocale()) }})</label>
                            <textarea class="form-control" id="content" name="content[{{ app()->getLocale() }}]" rows="4">
                                {{ old('content.' . app()->getLocale(), $article->content[app()->getLocale()] ?? '') }}
                            </textarea>
                        </div>
                        @if($errors->has('content'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('contentn') }}
                            </div>            
                        @endif                                         
                       
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category')</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)                                
                                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category[app()->getLocale()] ?? $category->category['en'] }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('category_id') }}
                                </div>            
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Update')</button>
                        <a href="{{ route('article.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection