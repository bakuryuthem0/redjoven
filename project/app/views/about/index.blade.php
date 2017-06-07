@extends('layouts.default')
@section('content')
<div class="row no-padding">
    <div class="col s12 m6 dark-blue-bg title-container">
        <i class="left fa fa-info-circle fa-4x hide-on-med-and-down"></i>
        <h3 class="right">¿Quiénes Somos?</h3>
    </div>
</div>
<div class="row contenedor relative rel">
    <div class="col s12">
        <div class="col s12 m6 no-padding about-text-container">
            <div class="col s12 formulario text-justify">
                    <p class="text-justify"><strong>Ciudadanos</strong> que proponemos un nuevo esquema de participación en el que jóvenes son concebidos como protagonistas de procesos y decisiones. Anzoátegui, Apure, Aragua, Dto. Capital (Caracas), Falcón, Guárico, Monagas, Mérida, Miranda, Portuguesa y Zulia son foco de diálogo y debate social para <strong>alentar el desarrollo del país y la convivencia democrática</strong>.</p> 
            </div>
            <div class="col s12 formulario text-justify">
                    <h5>Nuestra filosofía</h5>
                    <p class="text-justify">Motivar el ejercicio ciudadano para superar la barrera de la pasividad y la apatía. <strong>Fomentamos que los jóvenes dialoguen con la democracia</strong> en todas sus dimensiones, como única vía para conjugar, en colectivo, la dimensión crítica, participativa y autónoma</p>
            </div>
            <div class="col s12 formulario text-justify">
                    <p class="text-justify"><strong>Nos inspiramos en Venezuela, en la valoración de lo que somos, de nuestra esencia</strong>, en el reconocimiento de la venezolanidad. Nosotros <strong>creemos en la gente, apostamos por la gente</strong>; por ese principio de vida, de salvación, de fuerza y esperanza activa, construye, propone y se mueve para superar obstáculos. </p>
            </div>
            <div class="col s12 formulario text-justify">
                    <p class="text-justify">Asumimos a los jóvenes como agentes de cambio e influencia social. Hoy día es necesario el reencuentro con el país bueno para poder integrar toda esa fuerza que existe de querer soñar con una mejor Venezuela. Lo valioso, lo que dura y lo que es transcendental no es fácil de conseguir, necesitamos un esfuerzo de sacrifico, de renuncia y de diálogo para llegar a un estado superior. </p>
            </div>
            <div class="col s12 formulario text-justify">
                <ul class="news-cat">
                        <li><h5>Qué hacemos</h5></li>
                        <li>Fomentamos el liderazgo juvenil comunitario </li>
                        <li>Promovemos el ejercicio de ciudadanía activa </li>
                        <li>Impulsamos la cultura del emprendimiento en jóvenes</li>
                        <li>Estimulamos la libre expresión y participación a través de la infociudadanía.</li>
                    </ul>
            </div>
        </div>
        <div class="col s12 m6 rel about-img-container hide-on-med-and-down">
            <table class="about-table">
                <tr>
                    <td>
                    </td>
                    <td>
                        <img src="{{ asset('images/about/2.jpg') }}" class="about-img">
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('images/about/1.jpg') }}" class="about-img">
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <img src="{{ asset('images/about/3.jpg') }}" class="about-img">
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <div class="col-xs-12">
        <div class="right hide-on-med-and-down">
            <a href="{{ URL::to('/') }}" class="waves-effect waves-light">
                <img src="{{ asset('images/logo.png') }}" class="responsive-img logo">
            </a>
        </div>
    </div>
</div>
@stop

@section('postscript')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.about-img-container').height($('.about-text-container').height());
    });
</script>
@stop