<!DOCTYPE html>
<html lang="fr" version="1.0">
<head>
    <link rel="favicon" type="image/x-icon" href="http://www.jangolo.cm/favicon.ico">
    <link href="{{ mix('/css/all.css') }}" rel="stylesheet"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="Fx1t96dM7o8XVCFHfJ9GAXDRcMmSQ_BzjJmcVG7wRa0"/>
    <meta name="keywords" content="classifieds, marketplace, personals, Africa, Cameroon">

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{ mix('js/jquery-1.12.2.min.js') }}"></script>
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    {{--<script src="{{ mix('js/angular.min.js') }}"></script>--}}
    <script src="https://unpkg.com/vue@2.4.2/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-resource@1.3.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>
    {{--<script src="{{ mix('js/jangoloangular.js') }}"></script>--}}




</head>
<body style="background: #FFF;">
<div class="container">

    @include('layout.header.large')
    @include('layout.header.small')

    @yield('content')

    @include('layout.footer')

</div>
<script src="{{ mix('js/app.js') }}"></script>


</body>
</html>
