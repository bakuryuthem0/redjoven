@extends('layouts.default')
@section('content')
<div class="row no-padding">
    <div class="col s12 m6 light-blue-bg title-container">
        <i class="left fa fa-newspaper-o fa-4x fa-title"></i>
        <h3 class="left">Noticias</h3>
    </div>
</div>
<div class="row contenedor relative">
    <div class="col s12 ">
        <div class="col s12 m9">
        	@foreach($articulos as $a)
           	<div class="col-xs-12 news-container no-padding hoverable">
           		<div class="col-xs-12 col-md-3 img-news-container">
           			<a href="{{ URL::to('noticia/leer/'.$a->id) }}">
                        @if(isset($a->imagenes->first()->image))
                            <img src="{{ asset('images/news/'.$a->imagenes->first()->image) }}" class="img-responsive">
                        @else
                            <img src="{{ asset('images/logo.png') }}" class="center-block new-no-image img-responsive" alt="{{ $a->title }}">
                        @endif
                    </a>
           		</div>
           		<div class="col-xs-12 col-md-9">
           			<h5 class="news-title">{{ $a->title }}</h5>
           			@if(strlen(strip_tags($a->descripcion)) > 150)
           				<p class="text-justify text-description">{{ substr(strip_tags($a->descripcion),0,300) }}... <a href="{{ URL::to('noticia/leer/'.$a->id) }}">Leer mas</a></p>
           			@else
           				<p class="text-justify text-description">{{ strip_tags($a->descripcion) }}</p>
           			@endif
           		</div>
           	</div> 
           	<div class="col-xs-12">
           		<hr>
           	</div>
           	@endforeach
        	<div class="clearfix"></div>
            @if(count($articulos) > 0)
            <div class="blog-pagination">
                <nav role="navigation">
                    <?php  $presenter = new Illuminate\Pagination\BootstrapPresenter($articulos); ?>
                    @if ($articulos->getLastPage() > 1)
                        <ul class="pagination">
                        <?php
                            $beforeAndAfter = 3;
                            $currentPage = $articulos->getCurrentPage();
                            $lastPage = $articulos->getLastPage();
                            $start = $currentPage - $beforeAndAfter;
                            if($start < 1)
                            {
                                $pos = $start - 1;
                                $start = $currentPage - ($beforeAndAfter + $pos);
                            }
                            $end = $currentPage + $beforeAndAfter;
                            if($end > $lastPage)
                            {
                                $pos = $end - $lastPage;
                                $end = $end - $pos;
                            }
                            if ($currentPage <= 1)
                            {
                                echo '<li class="disabled"><a href="#!">&laquo; Primera</a></li>';
                            }
                            else
                            {
                                $url = $articulos->getUrl(1);
                                echo '<li><a class="" href="'.$url.'">&laquo; Primera</a></li>';
                            }
                            if (($currentPage-1) < $start) {
                                echo '<li class="disabled"><a href="#!">&laquo;</a></li>';   
                            }else
                            {
                                echo '<li><a href="'.$articulos->getUrl($currentPage-1).'">&laquo;</a></li>';
                            }
                            for($i = $start; $i<=$end;$i++)
                            {
                                if ($currentPage == $i) {
                                    echo '<li class="active"><a href="#!">'.$i.'</a></li>';
                                }else
                                {
                                    echo '<li><a href="'.$articulos->getUrl($i).'">'.$i.'</a></li>';
                                }
                            }
                            if (($currentPage+1) > $end) {
                                echo '<li class="disabled"><a href="#!">&raquo;</a></li>' ;
                            }else
                            {
                                echo '<li><a href="'.$articulos->getUrl($currentPage+1).'">&raquo;</a></li>';
                            }
                            if ($currentPage >= $lastPage)
                            {
                                echo '<li class="disabled"><a href="#!">Última &raquo;</a></li>';
                            }
                            else
                            {
                                $url = $articulos->getUrl($lastPage);
                                echo '<li><a class="" href="'.$url.'">Última &raquo;</a></li>';
                            }
                        ?>
                        </ul>
                    @endif
                </nav>
            </div>
            @else
            <div class="alert alert-info">
                No hay noticias para esta sede aun.
            </div>
            @endif
        </div>
        <div class="col s12 m3 news-aside">
            @if(isset($id))
            	@if(isset($cat_id))
            		{{ View::make('partials.sideNav')->with('cat',$cat)->with('id',$id)->with('cat_id',$cat_id) }}
            	@else
            		{{ View::make('partials.sideNav')->with('cat',$cat)->with('id',$id) }}
            	@endif
            @else
                    {{ View::make('partials.sideNav')->with('cat',$sede) }}
            @endif
        </div>
    </div>
</div>
@stop

@section('postscript')
<script type="text/javascript">
	 $(document).ready(function(){
        if($(window).width() > 991)
        {
    	    $('aside ul').pushpin({ 
    	    	top: $('aside').offset().top
    	   	});
        }
	  });
</script>
@stop