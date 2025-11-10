<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }

        img{
    border: solid;
    padding: 10px;
    border-radius: 5px;
    width: 80px;
    position: absolute;
    top:10px;
    right:10px
}
    </style>
</head>
<body>
    <div class="card-body border-0 ">
        <p class="card-text fs-5"><strong>@lang('Title') :</strong>{{ is_array($article->title) ? $article->title[app()->getLocale()] : $article->title }} ({{ app()->getLocale() }})</p>
        <p class="card-text fs-5"><strong>@lang('Content') :</strong> {{ is_array($article->content) ? $article->content[app()->getLocale()] : $article->content }} ({{ app()->getLocale() }})</p>                
        <p class="card-text fs-5"><strong>@lang('Created_At') :</strong> {{ $article->created_at  }}</p>                
        <p class="card-text fs-5"></strong> 
            <strong>Category: </strong>{{$article->category ? $article->category->category[app()->getLocale()] ??  $article->category->category['en'] : ''}}
        </p>                
    </div>
    <hr>     
</body>
</html>