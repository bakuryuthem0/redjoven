<aside>
	<ul class="news-cat">
		<li><h5>@if(isset($id)) Categorias: @else Sedes: @endif </h5></li>
		@foreach($cat as $c)
			@if(isset($id))
				<li @if(isset($cat_id) && $cat_id == $c->id) class="active" @endif><a href="{{ URL::to('noticias/'.$id.'/'.$c->id) }}">{{ $c->nombre }}</a></li>
			@else
				<li @if(isset($cat_id) && $cat_id == $c->id) class="active" @endif><a href="{{ URL::to('noticias/'.$c->id) }}">{{ $c->nombre }}</a></li>
			@endif
		@endforeach
	</ul>
</aside>