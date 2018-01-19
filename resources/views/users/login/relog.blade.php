@extends('layout.farm')

@section('content')
    <div xmlns="http://www.w3.org/1999/html" style="margin-bottom: 30px" ng-app="jangolo"
         ng-controller="registerCtrl">

        <div class="row">
            {!! view('users.login.login', compact('message')) !!}
            {!! view('users.login.register', compact('errors')) !!};
        </div>

    </div>
@endsection

