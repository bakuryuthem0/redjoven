@extends('layouts.default')
@section('content')
<div class="row no-padding">
    <div class="col s12 m10 light-blue-bg title-container">
        <h3 class="right"><i class="left fa fa-newspaper-o fa-4x"></i> {{ $articulo->title }}</h3>
    </div>
</div>
<div class="row contenedor relative">
    <div class="col s12 m9">
        <div class="col s12">
            <div class="col-xs-12">
                <ul class="pgwSlideshow">
                    @if(count($articulo->imagenes) > 1)
                        @foreach($articulo->imagenes as $i)
                            <li><img src="{{ asset('images/news/'.$i->image) }}" class="center-block img-responsive news-images fancybox" data-fancybox-gallery="gallery"></li>
                        @endforeach
                    @else
                      @if(isset($articulo->imagenes->first()->image))
                          <li><img src="{{ asset('images/news/'.$articulo->imagenes->first()->image) }}" class="center-block img-responsive"></li>
                      @endif
                    @endif
                </ul>
              </div>
            </div>
            <div class="col-xs-12">
                <hr>
            </div>
            <div class="col-xs-12 text-justify-all">
                {{ $articulo->descripcion }}
            </div>
            <div>
                    <a class="twitter-share-button"
                      href="https://twitter.com/share"
                      data-url="{{ Request::url() }}"
                      data-hashtags="RedJovenVenezuela"
                      data-text="Nuestas noticias"
                      target="popup" onclick="window.open('../html-link.htm','name','width=600,height=400')">
                    Tweet
                    </a>
                    <script>window.twttr = (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0],
                      t = window.twttr || {};
                    if (d.getElementById(id)) return t;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js, fjs);
                   
                    t._e = [];
                    t.ready = function(f) {
                      t._e.push(f);
                    };
                   
                    return t;
                  }(document, "script", "twitter-wjs"));</script>
                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7&appId=1642849222710880";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
            </div>
        </div>
        <div class="col s12 m3 news-aside">
            @if(isset($cat_id))
                {{ View::make('partials.sideNav')->with('cat',$cat)->with('id',$id)->with('cat_id',$cat_id) }}
            @else
                {{ View::make('partials.sideNav')->with('cat',$cat)->with('id',$articulo->sede_id) }}
            @endif
        </div>
    </div>
</div>
@stop

@section('postscript')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fancybox/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}" />

    <script type="text/javascript" src="{{ asset('plugins/fancybox/source/jquery.fancybox.js?v=2.1.5') }}"></script>


    <script type="text/javascript" src="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/pgwslide/pgwslideshow.min.css') }}">

    <script type="text/javascript" src="{{ asset('plugins/pgwslide/pgwslideshow.min.js') }}"></script>
<script type="text/javascript">
	 $(document).ready(function(){
	    $('aside ul').pushpin({ 
	    	top: $('aside').offset().top
	   	});
      $('.fancybox').fancybox();
      $('.pgwSlideshow').pgwSlideshow({
        maxHeight: 500,
      });
	  });
</script>
@stop