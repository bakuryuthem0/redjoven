@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 center-block box box-bordered">
    <h2>Ver galerias.</h2>
    <a href="{{ URL::previous() }}">Volver</a>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
    @endif
		<div class="col-xs-12">
      @foreach($gallery as $g)
        <div class="col-xs-12 col-md-3 formulario rel">
            <div><button type="button" class="close btn-elim-gallery" value="{{ $g->id }}" data-toggle="modal" href="#modal-id">&times;</button></div>
            <img src="{{ asset('images/gallery/'.$g->sede_id.'/'.$g->image) }}" class="img-responsive">
        </div>
      @endforeach
    </div>
    <div class="clearfix"></div>
	</div>
</div>
<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Eliminar imagen</h4>
      </div>
      <div class="modal-body">
        <div class="alert responseAjax">
          <p></p>
        </div>
        <p>¿Seguro desa eliminar esta imagen?. Esta acción es irreversible.</p>
      </div>
      <div class="modal-footer">
        <img src="{{ asset('images/ajax-loader.gif') }}" class="miniLoader">
        <button type="button" class="btn btn-danger btn-modal-elim-gallery">Eliminar</button>
      </div>
    </div>
  </div>
</div>
@stop
