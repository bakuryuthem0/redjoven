@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 col-md-8 col-md-offset-2 box box-bordered">
    <h2>Nueva imagen.</h2>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
    @endif
      <div class="col-xs-12 no-padding">
        <div class="alert alert-warning">
          <p><i class="fa fa-exclamation-triangle"></i> Debe seleccionar la sede y el tipo de actividad antes de subir las imagenes. Estas se subiran automaticamente, por lo que debe estar antento de cual sede y cual actividad a seleccionado.</p>
        </div>
      </div>
      <div class="col-xs-12 no-padding formulario">
        <label>Sede</label>
        <select class="form-control gallery-sede gallery-select" name="sede">
          <option value="">Seleccione una sede</option>
          @foreach($sedes as $s)
            <option value="{{ $s->id }}">{{ ucfirst($s->nombre) }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-xs-12 no-padding formulario">
        <select class="form-control gallery-activity gallery-select actividad" name="actividad">
          <option value="">Seleccione una actividad.</option>
          @foreach($cat as $a)
            <option value="{{ $a->id }}">{{ $a->nombre }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-xs-12 no-padding">
        <div class="alert alert-info">
          <p><i class="fa fa-exclamation-triangle"></i> Agregue al marco maximo 6 imagenes a la vez.</p>
        </div>
      </div>
      <div class="col-xs-12 no-padding formulario">
		    <form class="valign-wrapper hidden dropzone-container" method="POST" action="{{ URL::to('administrador/nueva-imagen/galeria/enviar') }}" enctype="multipart/form-data">
            <div class="dz-message center-block">Arrastre las imagenes que desea subir.</div>
            <input type="hidden" name="sede" class="sede">
            <input type="hidden" name="actividad" class="actividad">
        </form>
      </div>
	</div>
</div>
@stop

@section('postscript')
{{ HTML::style('https://rawgit.com/enyo/dropzone/master/dist/dropzone.css') }}

<script type="text/javascript" src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    var base = $('.baseUrl').val();
    var dropzone = $(".dropzone-container").dropzone(
      { 
        method        : "POST",
        addRemoveLinks:true,
      }
    );
    dropzone.addClass('dropzone');
    dropzone.on('sending', function(event) {
      $('.gallery-select').addClass('disabled').attr('disabled',true);
    });
    dropzone.on('success', function(event) {
      $('.gallery-select').removeClass('disabled').attr('disabled',false);
    });
  });
</script>
@stop