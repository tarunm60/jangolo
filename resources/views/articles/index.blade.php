@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @foreach($articles as $article)
                <a href="/edsa-Larawork/articles/{{$article->id}}">
                    {{$article->title}}
                </a> <br>

            @endforeach
        </div>

    </div>

@endsection