@extends('layouts.default')
@section('content')
<div class="row no-padding">
    <div class="col s12 m6 light-blue-bg title-container">
        <i class="left fa fa-library fa-4x fa-title"></i>
        <h3 class="left">Biblioteca Virtual</h3>
    </div>
</div>
<div class="row contenedor relative">
    <div class="col s12 ">
        <div class="col s12">
            <form method="GET" action="{{ URL::to('biblioteca-virtual?').$paginatorFilter }}">
                <div class="col s12 no-padding">
                    <h1 class="text-center">Filtros</h1>
                    <div class="col s12 m8">
                        <input type="text" name="busq" class="form-control" placeholder="Palabras claves" @if(isset($busq)) value="{{ $busq }}" @endif>
                    </div>
                    <div class="col s9 m3">
                        <select name="type" class="form-control">
                            <option value="">Tipo de documento</option>
                            <option value="libros" @if(isset($type) && $type == "libros") selected @endif>Libros</option>
                            <option value="articulos-de-investigacion" @if(isset($type) && $type == "articulos-de-investigacion") selected @endif>Articulos de investigacion</option>
                            <option value="informes" @if(isset($type) && $type == "informes") selected @endif>Informes</option>
                        </select>
                    </div>
                    <div class="col s3 m1">
                        <button class="btn btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            @if(count($files) < 1)
                <div class="col s12 formulario"><h2>No se han encontrado resultados para la busqueda.</h2></div>
            @else
                <hr>
                <div class="col s12 formulario"><h1 class="">Resultados.</h1></div>
            @endif
            @foreach($files as $f)
                <div class="col s12 library-container">
                    <h2 class="hist-title library">{{ ucfirst(strtolower($f->title)) }}</h2>
                    @if(!empty($f->description))
                        <p class="text-justify">
                            {{ $f->description }}
                        </p>
                    @endif
                    <span>
                        @if(!empty($f->autor))
                            <span><i class="fa fa-pencil"></i> {{ $f->autor }}</span>
                        @endif
                        @if(!empty($f->publication_date))
                            <span><i class="fa fa-calendar"></i> {{ $f->publication_date }}</span>
                        @endif
                    </span>
                    <a href="{{ URL::to('biblioteca/descargar/'.$f->id) }}" target="_blank" class="pull-right download-btn">Descargar</a>
                </div>
                <div class="clearfix"></div>
                <hr>
            @endforeach
            @if(count($files) > 6)
            <div class="blog-pagination">
                <nav role="navigation">
                    <?php  $presenter = new Illuminate\Pagination\BootstrapPresenter($files); ?>
                    @if ($files->getLastPage() > 1)
                        <ul class="pagination">
                        <?php
                            $beforeAndAfter = 3;
                            $currentPage = $files->getCurrentPage();
                            $lastPage = $files->getLastPage();
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
                                echo '<li class="disabled"><a href="#">&laquo; Primera</a></li>';
                            }
                            else
                            {
                                $url = $files->getUrl(1);
                                echo '<li><a class="" href="'.$url.$paginatorFilter.'">&laquo; Primera</a></li>';
                            }
                            if (($currentPage-1) < $start) {
                                echo '<li class="disabled"><a href="#">&laquo;</a></li>';   
                            }else
                            {
                                echo '<li><a href="'.$files->getUrl($currentPage-1).$paginatorFilter.'">&laquo;</a></li>';
                            }
                            for($i = $start; $i<=$end;$i++)
                            {
                                if ($currentPage == $i) {
                                    echo '<li class="active"><a href="#">'.$i.'</a></li>';
                                }else
                                {
                                    echo '<li><a href="'.$files->getUrl($i).$paginatorFilter.'">'.$i.'</a></li>';
                                }
                            }
                            if (($currentPage+1) > $end) {
                                echo '<li class="disabled"><a href="#">&raquo;</a href="#"></li>' ;
                            }else
                            {
                                echo '<li><a href="'.$files->getUrl($currentPage+1).$paginatorFilter.'">&raquo;</a></li>';
                            }
                            if ($currentPage >= $lastPage)
                            {
                                echo '<li class="disabled"><a href="#">Última &raquo;</a></li>';
                            }
                            else
                            {
                                $url = $files->getUrl($lastPage);
                                echo '<li><a class="" href="'.$url.$paginatorFilter.'">Última &raquo;</a></li>';
                            }
                        ?>
                        </ul>
                    @endif
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>
@stop
