<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title }}</title>
        <!-- meta -->
        <meta name="description" content="Red Joven Venezuela. Formando ciudadanos, transformando futuro es una organización sin fines de lucro, la cual trabaja para crear consiencia social y critica en los jovenes de las comunidades de venezuela" />
        <meta name="keywords" content="red,joven,venezuela,red joven,joven venezuela,Red Joven Venezuela. Formando ciudadanos, transformando futuro, trabajo social, juventud, venezuela" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:url"                content="{{ Request::url() }}" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="{{ $title }}" />
        <meta property="og:description"        content=" | Red Joven Venezuela. Formando ciudadanos, transformando futuro" />
        @if(isset($articulo) && isset($articulo->imagenes->first()->image))
            <meta property="og:image"          content="{{ asset('images/pubImages/'.$articulo->imagenes->first()->image) }}" />
        @else
            <meta property="og:image"          content="http://redjovenvenezuela.com/images/logo.png" />
        @endif
        <meta property="fb:app_id" content="1642849222710880">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('plugins/navicon/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css?v=1.5') }}">

    </head>
    <body>
        <div class="overly-preload valign-wrapper">
            <div class="preload-container center-block">
                <div class="preloader-wrapper big active">
                  <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>

                  <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>

                  <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>

                  <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div><div class="gap-patch">
                      <div class="circle"></div>
                    </div><div class="circle-clipper right">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="row no-margin">
            <div class="overly waves-effect waves-light"></div>
            <div class="col-xs-10 col-md-3 header z-depth-3">
                <div class="rel col-xs-12 no-padding">
                    <a href="{{ URL::to('/') }}" class="waves-effect waves-light">
                        <img src="{{ asset('images/logo_blanco.png') }}" class="responsive-img logo">
                    </a>
                </div>
                <nav>
                    <ul class="nav">
                        <li class=""><a href="{{ URL::to('quienes-somos') }}" class="waves-effect waves-light">Quienes Somos</a></li>
                        <li><a href="{{ URL::to('biblioteca-virtual') }}" class="waves-effect waves-light">Biblioteca Virtual</a></li>
                        <li class=""><a href="{{ URL::to('noticias') }}" class="waves-effect waves-light">Noticias</a></li>
                        <li class=""><a href="{{ URL::to('galeria') }}" class="waves-effect waves-light">Galería</a></li>
                        <li class=""><a href="{{ URL::to('contactenos') }}" class="waves-effect waves-light">Contactenos</a></li>
                    </ul>
                </nav>
                <div class="social-network text-center">
                    <a href="https://www.facebook.com/Red-Joven-Venezuela-257996761249550/?fref=ts" target="_blank"><i class="fa fa-facebook-official fa-3x" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/RedJovenVzla" target="_blank"><i class="fa fa-twitter-square fa-3x twitter" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/redjovenvzla/" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>

                </div>
            </div>
            <div class="nav-holder">
                <button type="button" role="button" aria-label="Toggle Navigation" class="waves-effect waves-light lines-button arrow arrow-left">
                  <span class="lines"></span>
                </button>
                <p class="text-center arrow-left">Menu</p>
            </div>
        </div>
        @yield('content')
        <footer>
            <p class="text-center">&copy; Todos los derechos reservados. <strong>Red Joven Venezuela. Formando ciudadanos, transformando futuro</strong> 2016</p>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-2.1.4.min.js"><\/script>')</script>
        <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('js/materialize.min.js') }}"></script>
        <script src="{{ asset('plugins/niceScroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/nav/jquery.nav.js') }}"></script>
        {{ HTML::script('plugins/pulsate/jQuery.pulsate.js') }}


        <script src="{{ asset('js/custom.js') }}"></script>
        @yield('postscript')
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            console.log(navigator.userAgent)
            $('html').niceScroll();
            $.stellar();
            $('.overly-preload').addClass('hidden');
        });
        </script>
    </body>
</html>
