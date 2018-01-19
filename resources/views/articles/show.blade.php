@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <h2>{{$article->title}}</h2>
            <p>{{$article->description}}</p>
        </div>

    </div>

@endsection