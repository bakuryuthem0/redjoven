@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 col-md-10 center-block box box-bordered">
    <h2>Nuevo Artículo.</h2>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
    @endif
    <div class="col-xs-12 formulario">
      <div class="col-xs-12 bg-info">
        <i class="fa fa-exclamation-triangle">

        </i>
        Recuerde que los nombre de las sedes debe comenzar con la palabr <em>"Sede"</em>
      </div>
    </div>
		<form class="" method="POST" action="{{ URL::to('administrador/editar-sede/'.$sede->id.'/enviar') }}" enctype="multipart/form-data">
      <div class="col-xs-12 input-group no-padding">
        <div class="formulario col-xs-12 col-md-6">
          <label for="inputPassOld" class="text-left control-label">Nombre de la Sede</label>
          <input type="text" name="name" class="form-control" placeholder="Nombre de la Sede" required value="{{ $sede->nombre }}">
          @if($errors->has('name'))
            @foreach($errors->get('name') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12 col-md-6">
          <label for="inputPassOld" class="text-left control-label">Coordinador</label>
          <select name="coord" class="form-control">
            <option value="">Seleccione una opción...</option>
            @foreach($users as $u)
              <option value="{{ $u->id }}" @if($sede->user_id == $u->id) selected @endif>{{ ucfirst(strtolower($u->username)) }}</option>
            @endforeach
          </select>
          @if($errors->has('coord'))
            @foreach($errors->get('coord') as $err)
            <div class="clearfix"></div>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{ $err }}
            </div>
            @endforeach
          @endif
        </div>
        <div class="formulario col-xs-12">
          <label for="inputPassOld" class="text-left control-label">Descripción</label>
           <textarea name="desc" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{ $sede->descripcion }}</textarea>
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
        <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-send-new-product">Enviar</button>
        </div>
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
  });
</script>
@stop