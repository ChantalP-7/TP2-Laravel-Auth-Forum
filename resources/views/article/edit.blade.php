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
                    <form action="{{ route('article.update') }}" method="post" class="mb-5">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title_en" class="form-label">@lang('Title') (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title[en]"
                                value="{{ old('title.en', $article->getTranslation('title', 'en')) }}">
                            
                        </div>
                        @if($errors->has('title.en'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('title.en') }}
                            </div>            
                        @endif
                         <div class="mb-3">
                            <label for="title_fr" class="form-label">@lang('Title') (FR)</label>
                            <input type="text" class="form-control" id="title_fr" name="title[fr]"
                                value="{{ old('title.fr', $article->getTranslation('title', 'fr')) }}">
                            
                        </div>
                        @if($errors->has('title.fr'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('title.fr') }}
                            </div>            
                        @endif
                        <div class="mb-3">
                            <label for="content_en" class="form-label">@lang('Content') (EN)</label>
                            <textarea class="form-control" id="content_en" name="content[en]" rows="4">{{ old('content.en', $article->getTranslation('content', 'en')) }}</textarea>
                            
                        </div>
                        @if($errors->has('content.en'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('content.en') }}
                            </div>            
                        @endif
                        <div class="mb-3">
                            <label for="content_fr" class="form-label">@lang('Content') (FR)</label>
                            <textarea class="form-control" id="content_fr" name="content[fr]" rows="4">{{ old('content.fr', $article->getTranslation('content', 'fr')) }}</textarea>
                            
                        </div>                    
                        @if($errors->has('content.fr'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('content.fr') }}
                            </div>            
                        @endif
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category')</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->getTranslation('category', app()->getLocale()) }}
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
                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-secondary">@lang('Cancel')</a>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection