@extends('layout.farm')

@section('title', 'Page Title')



@section('content')
    <p>
        @foreach($users as $user)
            {{$user->email}}<br>

        @endforeach
    </p>
@endsection

