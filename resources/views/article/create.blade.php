@extends('layouts.app')
@section('title', 'Add Post')
@section('content')
    <h3 class="mt-5 mb-5 text-center">@lang('New_article')</h3>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('Add_Article')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('article.store')}}" method="post" class="mb-5">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('Title')</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                            @if($errors->has('title'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('title')}}
                                </div>            
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">@lang('Content')</label>
                            <textarea class="form-control" id="description" name="description"><ul><li>{{old('content')}}</li></ul></textarea>
                            @if($errors->has('content'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('content')}}
                                </div>            
                            @endif
                        </div>                       
                        <div class="mb-3">
                            <label for="category_id" class="form-label">@lang('Category')</label>
                            <select name="category_id" id="category_id" class="form-select">
                                @foreach($categories as $category)
                                <option value="{{$category['id']}}"  @if ($category['id'] == old('category_id')) selected @endif>{{$category['category']}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger mt-2">
                                    {{$errors->first('category_id')}}
                                </div>            
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>              
                </div>
            </div>
        </div>
    </div>
@endsection('content')