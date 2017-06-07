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
        @foreach($sedes as $s)
        <a href="{{ URL::to('galeria/'.$s->id) }}">
            <div class="col-xs-12 col-md-3 gallery-container">
                <div class="list-tile mango">
                    <span class="text-center valign-wrapper tile-title"><p>Sede {{ $s->nombre }}</p></span>
                    <ul class="flip-list fourTiles" data-mode="flip-list" data-delay="2000">
                        @for($i = 0; $i < 9; $i++)
                            @if(isset($s->imgTiles[$i]))
                            <li data-speed="2000">
                                <div></div>
                                <div><img class="full" src="{{ asset('images/gallery/'.$s->id.'/'.$s->imgTiles[$i]->image) }}" alt="1" /></div>
                            </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
<div class="clearfix"></div>
@stop

@section('postscript')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/metro/MetroJs.min.css') }}">

<script type="text/javascript" src="{{ asset('plugins/metro/MetroJs.min.js') }}"></script>

<script type="text/javascript">
    $(window).load(function(){
        $(".flip-list").each(function(index, el) {
            $(el).liveTile();
        });
    });
    jQuery(document).ready(function($) {
    });
</script>
@stop