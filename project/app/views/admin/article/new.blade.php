@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 col-md-8 col-md-offset-2 box box-bordered">
    <h2>Nuevo Artículo.</h2>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
    @endif
		<form class="" method="POST" action="{{ URL::to('administrador/nuevo-articulo/enviar') }}" enctype="multipart/form-data">
      <div class="col-xs-12 input-group no-padding">
        <div class="formulario col-xs-12 col-md-6">
          <label for="inputPassOld" class="text-left control-label">Ante-Titulo <small>(Opcional)</small></label>
          <input type="text" name="pretitle" class="form-control" placeholder="Ante-Titulo" required value="{{ Input::old('pretitle') }}">
          @if($errors->has('pretitle'))
            @foreach($errors->get('pretitle') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12 col-md-6">
          <label for="inputPassOld" class="text-left control-label">Titulo</label>
          <input type="text" name="title" class="form-control" placeholder="Titulo" required value="{{ Input::old('title') }}">
          @if($errors->has('title'))
            @foreach($errors->get('title') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12 col-md-6">
          <label for="inputPassOld" class="text-left control-label">Sede</label>
          <select name="sede" class="form-control @if(Auth::user()->role > 2) disabled @endif" @if(Auth::user()->role > 2 && Auth::user()->role != 6) disabled @endif>
            <option>Seleccione una opción...</option>
            @if(Auth::user()->role > 2 && Auth::user()->role != 6)
                <option value="{{ $sedes->id }}" selected>{{ $sedes->nombre }}</option>
            @else
              @foreach($sedes as $s)
                <option value="{{ $s->id }}" @if(Input::old('sede') == $s->id) selected @endif>{{ $s->nombre }}</option>
              @endforeach
            @endif
          </select>
          @if($errors->has('sede'))
            @foreach($errors->get('sede') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12 col-md-6">
          <label for="inputPassOld" class="text-left control-label">Categoria</label>
          <select name="cat" class="form-control">
            <option>Seleccione una opción...</option>
            @foreach($cat as $c)
              <option value="{{ $c->id }}" @if(Input::old('cat') == $c->id) selected @endif>{{ $c->nombre }}</option>
            @endforeach
          </select>
          @if($errors->has('cat'))
            @foreach($errors->get('cat') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12">
          <label>Fecha</label>
          <div class="input-group">
            <input type="text" class="form-control " name="date" id="datepicker" value="{{ Input::old('date') }}" placeholder="Fecha...">
            <span class="input-group-btn">
              <button class="btn btn-default fecha" type="button"><i class="fa fa-calendar"></i></button>
            </span>
            <div id="datepicker"></div>
          </div><!-- /input-group -->
          @if($errors->has('date'))
            @foreach($errors->get('date') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12">
          <label>Descripción</label>
          <textarea name="desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ Input::old('desc') }}</textarea>
          @if($errors->has('desc'))
            @foreach($errors->get('desc') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="col-xs-12 formulario">
          <div clas="col-xs-12 no-padding">
            <label>Imagen: </label>
          </div>
          <div class="col-xs-12 no-padding">
            <div class="col-xs-12 col-md-6 formulario no-padding-half">
              <input type="file" name="file[]">
            </div>
            <div class="col-xs-12 col-md-6 formulario no-padding-half new-img to-clone">
              <button type="button" class="close dimiss-cloned">&times;</button>
              <input type="file" name="">
            </div>
          </div>
          <div class="col-xs-12 no-padding">
            <button type="button" class="btn btn-primary btn-clone" data-target="new-img" data-name="file[]">
              Agregar Imagen
            </button>
          </div>
        </div>
      </div>
      <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-send-new-product">Enviar</button>
      </div>
    </form>
	</div>
</div>
@stop

@section('postscript')
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".textarea").wysihtml5();
    $('.btn-send-new-product').on('click', function(event) {
      $(this).attr('disabled',true);
      $('form').submit()
    });
    $("#datepicker").datepicker({
      inline: false,
      showAnim: 'fadeIn',
      dateFormat: 'yy-m-d',
    });
    $('.fecha').on('click', function(event) {
      $('#datepicker').datepicker("show");
    });
  });
</script>
@stop