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
                    <form action="{{ route('article.store') }}" method="post" class="mb-5">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title_en" class="form-label">@lang('Title') (EN)</label>
                            <input type="text" class="form-control" id="title_en" name="title[en]" value="{{ old('title.en') }}">
                        </div>
                        @if($errors->has('title.en'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('title.en') }}
                            </div>            
                        @endif
                        <div class="mb-3">
                            <label for="title_fr" class="form-label">@lang('Title') (FR)</label>
                            <input type="text" class="form-control" id="title_fr" name="title[fr]" value="{{ old('title.fr') }}">
                        </div>
                        @if($errors->has('title.fr'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('title.fr') }}
                            </div>            
                        @endif

                        <div class="mb-3">
                            <label for="content_en" class="form-label">@lang('Content') (EN)</label>
                            <textarea class="form-control" id="content_en" name="content[en]">{{ old('content.en') }}</textarea>
                        </div>
                        @if($errors->has('content.en'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('content.en') }}
                            </div>            
                        @endif
                        <div class="mb-3">
                            <label for="content_fr" class="form-label">@lang('Content') (FR)</label>
                            <textarea class="form-control" id="content_fr" name="content[fr]">{{ old('content.fr') }}</textarea>
                        </div>                     
                        @if($errors->has('content.fr'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('content.fr') }}
                            </div>            
                        @endif
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category') (FR)</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                                        {{ $category->getTranslation('category', $locale) }}
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('category_id') }}
                                </div>            
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('Save')</button>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection