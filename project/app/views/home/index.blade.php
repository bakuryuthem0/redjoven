@extends('layouts.default')

@section('content')
<div class="hide-on-large-only bg-index">
    <img src="{{ asset('images/logo.png') }}" class="responsive-img logo-devices">

</div>
<div class="row relative collage hide-on-med-and-down">
    <div class="words depth-3 autonomia" data-stellar-ratio="1.3"><img src="{{ asset('images/words/autonomia.png') }}"></div>
    <div class="words depth-2 identidad_nacional" data-stellar-ratio="1.5"><img src="{{ asset('images/words/identidad_nacional.png') }}"></div>
    <div class="words depth-1 construyendo_pais" data-stellar-ratio="1.7"><img src="{{ asset('images/words/construyendo_pais.png') }}"></div>
    <div class="words depth-3 justicia" data-stellar-ratio="1.2"><img src="{{ asset('images/words/justicia.png') }}"></div>
    <div class="words depth-2 derechos_economicos" data-stellar-ratio="1.5"><img src="{{ asset('images/words/derechos_economicos.png') }}"></div>
    <div class="words depth-3 convivencia" data-stellar-ratio="1.4"><img src="{{ asset('images/words/convivencia.png') }}"></div>
    <div class="words depth-1 derechos_sociales" data-stellar-ratio="1.3"><img src="{{ asset('images/words/derechos_sociales.png') }}"></div>
    <div class="words depth-1 ciudadania" data-stellar-ratio="3."><img src="{{ asset('images/words/ciudadania.png') }}"></div>
    <div class="words depth-3 dialogo" data-stellar-ratio="1.3"><img src="{{ asset('images/words/dialogo.png') }}"></div>
    <div class="words depth-1 cambio_social" data-stellar-ratio="1.2"><img src="{{ asset('images/words/cambio_social.png') }}"></div>
    <div class="words depth-3 liderazgo_juvenil" data-stellar-ratio="1.4"><img src="{{ asset('images/words/liderazgo_juvenil.png') }}"></div>

    <div class="words depth-2 valores_democraticos" data-stellar-ratio="1.5"><img src="{{ asset('images/words/valores_democraticos.png') }}"></div>
    <div class="words depth-3 creatividad" data-stellar-ratio="1.3"><img src="{{ asset('images/words/creatividad.png') }}"></div>
    <div class="words depth-1 pensamiento_critico" data-stellar-ratio="1.5"><img src="{{ asset('images/words/pensamiento_critico.png') }}"></div>

    <!--medio-->
    <div class="words depth-1 integridad" data-stellar-ratio="1.3"><img src="{{ asset('images/words/integridad.png') }}"></div>
    <div class="words depth-3 paz" data-stellar-ratio="1.2"><img src="{{ asset('images/words/paz.png') }}"></div>
    <div class="words depth-2 inclusion" data-stellar-ratio="1.5"><img src="{{ asset('images/words/inclusion.png') }}"></div>
    <div class="words depth-4 logote" data-stellar-ratio="1.9"><img src="{{ asset('images/words/logo_grande.png') }}"></div>
    <div class="words depth-2 cooperacion" data-stellar-ratio="1.5"><img src="{{ asset('images/words/cooperacion.png') }}"></div>
    <div class="words depth-1 progreso" data-stellar-ratio="1.4"><img src="{{ asset('images/words/progreso.png') }}"></div>
    <div class="words depth-2 cultura_paz" data-stellar-ratio="1.5"><img src="{{ asset('images/words/cultura_paz.png') }}"></div>
    <!--fondo-->
    <div class="words depth-1 servicio_comunitario" data-stellar-ratio="1.2"><img src="{{ asset('images/words/servicio_comunitario.png') }}"></div>
    <div class="words depth-1 derechos_culturales" data-stellar-ratio="1.6"><img src="{{ asset('images/words/derechos_culturales.png') }}"></div>
    <div class="words depth-3 libertad_expresion" data-stellar-ratio="1.9"><img src="{{ asset('images/words/libertad_expresion.png') }}"></div>
    <div class="words depth-3 pluralidad" data-stellar-ratio="1.6"><img src="{{ asset('images/words/pluralidad.png') }}"></div>
    <div class="words depth-3 paz_social" data-stellar-ratio="1.7"><img src="{{ asset('images/words/paz_social.png') }}"></div>
    <div class="words depth-1 emprendimiento" data-stellar-ratio="1.3"><img src="{{ asset('images/words/emprendimiento.png') }}"></div>
    <div class="words depth-2 desarrollo_integral" data-stellar-ratio="1.5"><img src="{{ asset('images/words/desarrollo_integral.png') }}"></div>
    <div class="words depth-1 democracia" data-stellar-ratio="1.4"><img src="{{ asset('images/words/democracia.png') }}"></div>
    <div class="words depth-2 venezolanidad" data-stellar-ratio="1.5"><img src="{{ asset('images/words/venezolanidad.png') }}"></div>
    <div class="words depth-1 justicia_social" data-stellar-ratio="1.6"><img src="{{ asset('images/words/justicia_social.png') }}"></div>
    <div class="words depth-1 participacion_ciudadana" data-stellar-ratio="1.3"><img src="{{ asset('images/words/participacion_ciudadana.png') }}"></div>
    <div class="words depth-2 formacion" data-stellar-ratio="1.5"><img src="{{ asset('images/words/formacion.png') }}"></div>
    <div class="words depth-2 honestidad" data-stellar-ratio="1.4"><img src="{{ asset('images/words/honestidad.png') }}"></div>
    <div class="words depth-3 identidad" data-stellar-ratio="1.3"><img src="{{ asset('images/words/identidad.png') }}"></div>
    <div class="words depth-2 derechos_humanos" data-stellar-ratio="1.4"><img src="{{ asset('images/words/derechos_humanos.png') }}"></div>
    <div class="words depth-3 esencia_epekeina" data-stellar-ratio="1.5"><img src="{{ asset('images/words/esencia_epekeina.png') }}"></div>
    <div class="words igualdad" data-stellar-ratio="1.3"><img src="{{ asset('images/words/igualdad.png') }}"></div>
    <div class="words desarrollo_humano" data-stellar-ratio="1.3"><img src="{{ asset('images/words/desarrollo_humano.png') }}"></div>
</div>
<div class="row relative yellow-bg" id="program">
    <div class="col-xs-12 col-md-6 col-lg-5">
        <div class="col-xs-12 no-padding">
            <h2 class="text-left title program-title">Programas</h2>
            <h2 class="text-left title program-subtitle"></h2>
        </div>
        <div class="col-xs-12 no-padding program-text-container">
            <p class="text-justify program-text">Promovemos iniciativas de capacitación ciudadana para que jóvenes dispongan de herramientas que les permitan interactuar en un país con miras al desarrollo y a la mejora de la competitividad nacional. Ofrecemos un plan de formación integral y transformador para el cambio social y construcción de una sociedad crítica y autónoma.</p>
            <p class="text-justify program-subtext"></p>
        </div>
        <div class="col-xs-12 no-padding rel">
            <div class="program-container">
                <a class="program" data-title="Modelo Asamblea Nacional" data-texto="Programa que revela las competencias, responsabilidades y derechos de los parlamentos, además de la importancia que representan en un estado democrático. Un espacio para que los jóvenes conozcan y transiten en el camino de  la legislación. " href="#!" data-image="">
                    <img src="{{ asset('images/programas/logo_man.jpg') }}" class="img-responsive">
                </a>
            </div>
            <div class="program-container">
                <a class="program" data-title="Torneo Deportivos" data-texto="Organizamos y promovemos actividades deportivas en comunidades populares para el provecho del tiempo libre de la juventud. La ejercitación física la combinamos con  valores como la  tolerancia, respeto y trabajo en equipo para  que sean tangibles en las comunidades. Descubrimos y respaldamos talentos locales." href="#!" data-image="">
                    <img src="{{ asset('images/programas/logo_dep.png') }}" class="img-responsive">
                </a>
            </div>
            <div class="program-container">
                <a class="program" data-title="Papagayos por La Paz" data-texto="Jornada recreacional para fomentar la cultura de paz. Generamos estrategias que promuevan valores, rescaten la convivencia,  impulsen la creatividad y rescate el uso y conocimiento de los juegos tradicionales." href="#!" data-image="">
                    <img src="{{ asset('images/programas/logo_pap.jpg') }}" class="img-responsive">
                </a>
            </div>
            <div class="program-container">
                <a class="program" data-title="Ecologismo por Mi País" data-texto="Hacemos conexión con tierra, ambiente y reciclaje, porque son medulares en el presente y futuro. Con diversas estrategias promovemos educación, valores y sentido común en cuanto al cuido de nuestra fauna, flora y espacios verdes. " href="#!" data-image="">
                    <img src="{{ asset('images/programas/logo_eco.png') }}" class="img-responsive">
                </a>
            </div>
            <div class="program-container">
                <a class="program" data-title="Foros y Academias RJV" data-texto="Brindamos jornadas especiales de formación para lograr enriquecer el intelecto de nuestros jóvenes. Tomamos temáticas que representen crecimiento y desarrollo. La teoría y la practicidad se conjugan para que los resultados sean tangibles en las comunidades. " href="#!" data-image="">
                    <img src="{{ asset('images/programas/logo_aca.png') }}" class="img-responsive">

                </a>
            </div>
            <div class="go-back waves-effect waves-light hidden">
                <i class="fa fa-reply fa-3x" aria-hidden="true"></i>
                <p>Volver</p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 right program-aside rel">
        <img src="" class="image-program gallery img-responsive center-block">
    </div>
    <div class="sub-logo hide-on-med-and-down">
        <a href="{{ URL::to('/') }}" class="waves-effect waves-light">
            <img src="{{ asset('images/logo_blanco.png') }}" class="responsive-img logo">
        </a>
    </div>
</div>
<div class="row relative half-bg no-padding" id="sedes">
    <div class="col-xs-6 hide-on-large-only">
        <h2 class="title">Nuestras Sedes</h2>
        <ul>
        @foreach($sedes as $s)
            <li class="state" data-title="{{ $s->nombre }}" data-subtitle="{{ $s->titulo }}" data-text="{{ $s->descripcion }}" data-url="{{ URL::to('noticias/'.$s->id) }}" data-url-text="Ver Noticias" data-subsedes=""><a href="#!" class="waves-effect waves-light"><i class="fa fa-arrow-circle-right"></i> {{ $s->nombre }}</a></li>
        @endforeach
        </ul>
    </div>
    <div class="col-xs-12 col-md-6 red-bg hide-on-med-and-down">
        <h2 class="text-left sedes-title title">Nuestras Sedes</h2>
    </div>
    {{ View::make('partials.map')->with('sedes',$sedes) }}
    <!--<div class="col-xs-12 col-md-9 no-padding">
        <div class="col-xs-12"><h2 class="text-left title">Sedes</h2></div>
    </div>
    -->
    <div class="col-xs-6 col-md-4 map-info">
        <div class="col-xs-12 no-padding"><h2 class="text-right map-title"></h2></div>
        <div class="col-xs-12 no-padding"><h3 class="text-right map-subtitle"></h3></div>
        <div class="col-xs-12 no-padding"><p class="text-right map-text"></p></div>
        <div class="col-xs-12 no-padding"><ul class="text-right map-subsedes"></ul></div>
        <div class="col-xs-12 no-padding text-right"><h4><a href="#!" class="map-link btn btn-news" data-toggle="tooltip" data-title="Noticias" data-placement="left"></a></h4></div>
    </div>
    <div class="sub-logo hide-on-med-and-down" data-stellar-ratio="1.3">
        <a href="{{ URL::to('/') }}" class="waves-effect waves-light">
            <img src="{{ asset('images/logo_blanco.png') }}" class="responsive-img logo">
        </a>
    </div>
</div>
<!--<div class="row relative funda-call valign-wrapper">
    <div class="col-xs-12"><h2 class="text-left title">Visita tambien</h2></div>
    <div class="col-xs-12">
        <div>
            <img src="{{ asset('images/allies/fundaepekeina.png') }}" class="logo center-block">
            <p class="text-justify content">
                Acompañar a las comunidades en situación de pobreza en su esfuerzo por lograr una calidad de vida digna y en la defensa de sus derechos ciudadanos, a través de un proceso integral, a nivel educativo y de organización participativa, con el fin de promover la formación intelectual y la capacitación de sus miembros, enfocados principalmente en los niños, adolescentes, jóvenes y su núcleo familiar, en conformidad con los valores de la democracia y la paz social. <strong><a href="http://fundaepekeina.org" target="_blank">Visitanos aqui</a></strong>
            </p>
        </div>
    </div>
</div>

<div class="row relative red-bg no-padding" id="paperli">

    <script type="text/javascript" src="http://widgets.paper.li/javascripts/sr.embeddable.min.js"></script>
    <script>
      Paperli.PaperFrame.Show({"id":"695e7029-41ea-4f3b-a36a-791b41f05952","width":"100%","height":document.getElementById('paperli').offsetHeight ,"background":"#ff0000","borderColor":"rgba(255,255,255,0)","fontColor":"#fff","hide":"create,logo"});
    </script>
</div>
-->
<div class="row relative dark-blue-bg" id="allies">
    <div class="col-xs-12"><h2 class="text-left title">Nuestros aliados</h2></div>
    <div class="col-xs-12 no-padding">
        <div class="col-xs-12 col-md-6">
            <p class="text-justify white-text">Generamos iniciativas que promuevan la acción solidaria. Promovemos la sinergia del trabajo en equipo bajo esquema de colaboración. Creemos que Venezuela requiere de la labor mancomunada con visión de desarrollo país. Concretamos alianzas para  el bienestar colectivo y el bien común. </p>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-xs-12 col-md-8 center-block rel">
       <div class="col-xs-12 col-sm-6 col-md-3 img-ally"><a href="http://fundaepekeina.org/" target="_blank"><img class="img-responsive" src="{{ asset('images/allies/fundaepekeina.png') }}"></a></div>
       <div class="col-xs-12 col-sm-6 col-md-3 img-ally"><a href="http://www.alimentosfusari.com/ve/" target="_blank"><img class="img-responsive" src="{{ asset('images/allies/fusari.png') }}"></a></div>
       <div class="col-xs-12 col-sm-6 col-md-3 img-ally"><a href="http://uba.edu.ve/" target="_blank"><img class="img-responsive" src="{{ asset('images/allies/uba.png') }}"></a></div>
       <div class="col-xs-12 col-sm-6 col-md-3 img-ally"><a href="#!" target="_blank"><img class="img-responsive" src="{{ asset('images/allies/zerolo.png') }}"></a></div>
       <div class="col-xs-12 col-sm-6 col-md-3 img-ally"><a href="#!" target="_blank"><img class="img-responsive" src="{{ asset('images/allies/ofigrapa.png') }}"></a></div>
    </div>
    <div class="sub-logo hide-on-med-and-down" data-stellar-ratio="1.3">
        <a href="{{ URL::to('/') }}" class="waves-effect waves-light">
            <img src="{{ asset('images/logo_blanco.png') }}" class="responsive-img logo ">
        </a>
    </div>
</div>
<div class="row submenus no-padding">
    <div class="col-xs-12 col-md-3 yellow-bg submenu">
        <div class="hoverable-card text-center waves-effect waves-light">
            <a href="#program" class="scroll"><h5>Programas</h5></a>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 light-blue-bg submenu">
        <div class="hoverable-card text-center waves-effect waves-light">
            <a href="#sedes" class="scroll"><h5>Sedes</h5></a>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 red-bg submenu">
        <div class="hoverable-card text-center waves-effect waves-light">
            <a href="#paperli" class="scroll"><h5>Periodico Digital</h5></a>
        </div>
    </div>
    <div class="col-xs-12 col-md-3 dark-blue-bg submenu">
        <div class="hoverable-card text-center waves-effect waves-light">
            <a href="#allies" class="scroll"><h5>Aliados</h5></a>
        </div>
    </div>
</div>

@stop

@section('postscript')
<script type="text/javascript">
    $(document).ready(function(){
        $('.submenus').pulsate({repeat: 6});   
        $('.map-link').tooltip();
    });

</script>

@stop