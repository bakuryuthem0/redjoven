@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 col-md-10 center-block box box-bordered">
    <h2>Asignar usuario a sede: {{ $sede->nombre }}.</h2>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
    @endif
		<form class="" method="POST" action="{{ URL::to('administrador/mostrar-sedes/asignar-nuevo/'.$sede->id.'/enviar') }}" enctype="multipart/form-data">
      <div class="col-xs-12 input-group no-padding">
        <div class="formulario col-xs-12 ">
          <label for="inputPassOld" class="text-left control-label">Usuario: </label>
          <select name="user" class="form-control">
            <option value="">Seleccione una opción...</option>
            @foreach($users as $u)
              <option value="{{ $u->id }}" @if(Input::old('user') == $u->id) selected @endif>{{ ucfirst(strtolower($u->username)) }}</option>
            @endforeach
          </select>
          @if($errors->has('user'))
            @foreach($errors->get('user') as $err)
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