<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link rel="shortcut icon" href="{{ IMAGE_PATH.'jangolo-favicon.ico' }}"/>
        <title>{{ LOGONAME }} Shop</title>
        {{ Html::style('css/bootstrap.min.css') }}
        {{ Html::style('/css/font-awesome.min.css') }}
        {{ Html::style('css/ionicons.min.css') }}
        {{ Html::style('css/owl.carousel.css') }}
        {{ Html::style('css/owl.theme.css') }}
        {{ Html::style('css/prettyPhoto.css') }}
        {{ Html::style('css/settings.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/custom.css') }}
        @yield('style')
        <link href="//fonts.googleapis.com/css?family=Great+Vibes%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <script type="text/javascript" src="{{ asset('jss/jquery.min.js') }}"></script>
    <body class="sidebar-mini fixed">
        <div class="site">
        @include('layout_new.header')
            <div class="main">
                @yield('content')
            </div>
            @include('layout_new.footer')
        </div>
         
        <script type="text/javascript">
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        </script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDwtb7cR_XBPEvxtQ_Yq3_xKsOWQroCTPA&amp;sensor=false"></script>
        <script type="text/javascript" src="{{ asset('jss/jquery-migrate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/modernizr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/jquery.countdown.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/jquery.prettyPhoto.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/jquery.prettyPhoto.init.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/imagesloaded.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/isotope.pkgd.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/jquery.isotope.init.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/script.js') }}"></script>
        @yield('script')
        <script type="text/javascript" src="{{ asset('jss/jquery.themepunch.tools.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/jquery.themepunch.revolution.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.actions.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.kenburn.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.migration.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.parallax.min.js') }}"></script>

        
    </body>
        <script type="text/javascript" src="{{ asset('jss/extensions/revolution.extension.video.min.js') }}"></script>
</html>