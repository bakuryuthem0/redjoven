@extends('layouts.default')
@section('content')
<div class="row no-padding">
    <div class="col s12 m6 yellow-bg title-container">
        <i class="left fa fa-picture-o fa-4x hide-on-med-and-down"></i>
        <h3 class="right">Galería</h3>
    </div>
</div>
<div class="row contenedor relative">
    <div class="col s12">
        <ul class="portfolio-filter text-center">
            <li><a class="filter btn btn-default btn-fitler waves-effect active" href="#!" data-filter="*">Todos</a></li>
            @foreach($cat as $c)
                <li><a class="filter btn btn-default btn-fitler waves-effect" href="#!" data-filter=".act{{ $c->id }}">{{ $c->nombre }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col s12 relative grid">
        <?php $j = 0;?>
        @foreach($img as $i)
            @if($j < 10)
            <div class="col-xs-12 col-md-3 actividad act{{ $i->cat_id }}">
                <a class="fancybox" data-fancybox-group="gallery{{ $i->cat_id }}"><img src="{{ asset('images/gallery/'.$i->sede_id.'/'.$i->image) }}" class="img-responsive"></a>
            </div>
            @else
            <div class="col-xs-12 col-md-3 actividad act{{ $i->cat_id }}">
                <a class="fancybox" data-fancybox-group="gallery{{ $i->cat_id }}"><img data-original="{{ asset('images/gallery/'.$i->sede_id.'/'.$i->image) }}" class="img-responsive lazy"></a>
            </div>
            @endif
            <?php $j++;?>
        @endforeach
        @if($sede == 11)
        <div class="col-xs-12 col-md-3 actividad act1">
            <a class="fancybox" data-fancybox-group="gallery">
                <video src="">Tu navegador no soporta videos.</video>
            </a>
        </div>
        @elseif($sede == 10)
            <div class="col-xs-12 col-md-3 actividad act1">
                <a class="fancybox" data-fancybox-group="gallery">
                    <video src="">Tu navegador no soporta videos.</video>
                </a>
            </div>
        @endif
    </div>
</div>
@stop

@section('postscript')
{{ HTML::script('plugins/isotope/isotope.pkgd.min.js') }}
{{ HTML::script('plugins/isotope/cells-by-column.js') }}
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fancybox/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}" />

<script type="text/javascript" src="{{ asset('plugins/fancybox/source/jquery.fancybox.js?v=2.1.5') }}"></script>


<script type="text/javascript" src="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>

<script type="text/javascript" src="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}"></script>

<script type="text/javascript" src="{{ asset('plugins/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6') }}"></script>

<script type="text/javascript" src="{{ asset('plugins/lazyload/jquery.lazyload.min.js') }}"></script>

<script src="{{ asset('plugins/imagesLoad/imagesloaded.pkgd.min.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.grid').isotope({
            event : 'loaded',
        });
        $('.filter').on('click', function(event) {
            var btn = $(this);
            $('.grid').isotope({filter: btn.data('filter')});
            $('.filter.active').removeClass('active');
            btn.addClass('active');
        });
        $('.fancybox').fancybox();
        var $imgs = $('.lazy')
        $imgs.lazyload({
            threshold : 400,
            effect : "fadeIn",
            failure_limit: Math.max($imgs.length - 1, 0),
            event: 'scroll',
            appear: function(){
                console.log('loaded image');
                $('.grid').imagesLoaded().progress( function() {
                  $('.grid').isotope('layout');
                });
            }
        });
    });
</script>
@stop