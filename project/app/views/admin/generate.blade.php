@extends('layouts.admin')

@section('content')
	<?php 
		$html = View::make('emails.boletin')->with('article',$article);
	?>
	<div class="col-xs-12 col-md-8 center-block boletin">
		{{ '<pre class="html-code">'.htmlspecialchars($html).'</pre>' }}
		<div class="formulario">
			<button class="btn btn-default btn-download" value="{{ htmlspecialchars($html) }}">Descargar</button>
		</div>
	</div>
@stop