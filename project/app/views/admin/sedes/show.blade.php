@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 center-block box box-bordered">
    <h2>Sedes.</h2>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('success') }}
    </div>
    @endif
		<div class="col-xs-12">
      <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Asignar</th>
              <th class="text-center">Ver asignaciones</th>
              <th class="text-center">Editar</th>
              <th class="text-center">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sedes as $s)
            <tr>
              <td class="text-center">{{ $s->id }}</td>
              <td class="text-center">{{ $s->nombre }}</td>
              <td class="text-center">
                <a target="_blank" href="{{ URL::to('administrador/mostrar-sedes/asignar-nuevo/'.$s->id) }}" class="btn btn-success btn-xs">Asignar</a>
              </td>
              <td class="text-center">
                <a target="_blank" href="{{ URL::to('administrador/mostrar-sedes/ver-asignados/'.$s->id) }}" class="btn btn-primary btn-xs">Ver <span class="badge">{{ $s->assignment_count->first()->aggregate }}</span></a>
              </td>
              <td class="text-center">
                <a target="_blank" href="{{ URL::to('administrador/editar-sede/'.$s->id) }}" class="btn btn-warning btn-xs">Editar</a>
              </td>
              <td class="text-center"><button value="{{ $s->id }}" class="btn btn-danger btn-xs btn-elim-sede" data-toggle="modal" data-target="#elimSede">Eliminar</button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="clearfix"></div>
	</div>
</div>
<div class="modal fade" id="elimSede">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Eliminar Sede</h4>
      </div>
      <div class="modal-body">
        ¿Seguro desea realizar esta accion?, tenga en cuenta que es irreversible.
        <div class="alert responseAjax">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p></p>
        </div>
      </div>
      <div class="modal-footer">
        <img src="{{ asset('images/ajax-loader.gif') }}" class="miniLoader">
        <button type="button" class="btn btn-danger btn-modal-elim-sede">Eliminar</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('postscript')
  {{ HTML::style('plugins/datatables/dataTables.bootstrap.css') }}
  {{ HTML::script('plugins/datatables/jquery.dataTables.min.js') }}
  {{ HTML::script('plugins/datatables/dataTables.bootstrap.min.js') }}
  <script>
    $(function () {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
      });
    });
  </script>

@stop