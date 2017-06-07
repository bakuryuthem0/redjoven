@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="col-xs-12 center-block box box-bordered">
    <h2>Ver galerias.</h2>
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
              <th class="text-center">Sede</th>
              <th class="text-center">Cantidad de imagenes</th>
              <th class="text-center">Ver</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sedes as $s)
            <tr>
              <td>{{ $s->id }}</td>
              <td>{{ $s->nombre }}</td>
              <td class="text-center">
                @if(isset($s->imagenesCount()->first()->aggregate))
                  {{ $s->imagenesCount()->first()->aggregate }}
                @else
                  0
                @endif
              </td>
              <td class="text-center">
                <a class="btn btn-primary btn-xs" href="{{ URL::to('administrador/ver-galeria/'.$s->id) }}">Ver</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="clearfix"></div>
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