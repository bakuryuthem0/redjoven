@extends('layouts.default')
@section('content')
<div class="row no-padding">
    <div class="col s12 m6 red-bg title-container">
        <i class="left fa fa-envelope fa-4x hide-on-med-and-down"></i>
        <h3 class="right">Contáctenos</h3>
    </div>
</div>
<div class="row contenedor contact-contenedor relative">
    <div class="col s12 ">
        <div class="col s12 m6 hide-on-med-and-down">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
            @endif
        </div>
        <div class="col s12 m6 no-padding contact-container hide-on-large-only">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
            @endif
            @if(Session::has('danger'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('danger') }}
            </div>
            @endif
            <form method="POST" action="{{ URL::to('contactenos/enviar') }}">
                <div class="input-field col s11 right no-padding">
                    <i class="fa fa-user prefix"></i>
                    <input id="first_name" type="text" class="validate" name="name">
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s11 right no-padding">
                    <i class="fa fa-envelope prefix"></i>
                    <input id="first_email" type="text" class="validate" name="email">
                    <label for="first_email">Email</label>
                </div>
                <div class="col s11 right no-padding">
                    <i class="fa fa-envelope fa-2x prefix hide-on-med-and-down"></i>
                    <div class="col s11 no-padding right">
                        <label>Sede</label>
                        <select class="browser-default" name="sede">
                          <option value="" disabled selected>Elija una opción</option>
                            <option value="anzoategui">Anzoátegui </option>
                            <option value="aragua">Aragua</option>
                            <option value="apure">Apure </option>
                            <option value="caracas">Caracas</option>
                            <option value="falcon">Falcón</option>
                            <option value="guarico">Guárico</option>
                            <option value="merida">Mérida</option>
                            <option value="miranda">Miranda</option>
                            <option value="​monagas">​Monagas</option>
                            <option value="portuguesa">Portuguesa </option>
                            <option value="sucre">Sucre</option>
                            <option value="zulia">Zulia </option>
                        </select>
                    </div>
                </div>
                <div class="input-field col s11 right no-padding">
                    <i class="fa fa-envelope prefix"></i>
                    <textarea id="first_textarea" class="validate materialize-textarea" name="msg"></textarea>
                    <label for="first_email">Mensaje</label>
                </div>
                <div class="input-field col s11 right no-padding">
                    <button class="btn btn-success waves-effect waves-light" type="submit" name="action">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col s12 m6 map-container hide-on-med-and-down pull-right">
            <div class="cont-sobre">
                <img src="{{ asset('images/sobre-fondo.png') }}" class="sobre sobre-fondo">
                <div class="sobre sobre-medio"><img src="{{ asset('images/sobre-medio.png') }}" class="img-responsive"></div>
                <!--<img src="{{ asset('images/sobre-frente.png') }}" class="sobre sobre-frente">-->
                {{ View::make('partials.sobre') }}
                <div class="form">
                    <div class="lineas">
                        <form method="POST" action="{{ URL::to('contactenos/enviar') }}">
                            <div class="col-xs-12 no-padding">
                                <p>Mi nombre es:</p> 
                                <input id="first_name" type="text" class="validate contact-input name" name="name">
                            </div>
                            <div class="col-xs-12 no-padding">
                                <p>pueden escribirme a</p>
                                <input id="first_email" type="text" class="validate contact-input email" name="email" placeholder="email@ejemplo.com">
                            </div>
                            <div class="col-xs-12 no-padding">
                                <p class="select-text ">Me dirijo a</p>
                                <select class="browser-default select-contact" name="sede">
                                  <option value="" disabled selected>Elija una opción</option>
                                    <option value="anzoategui">Anzoátegui </option>
                                    <option value="aragua">Aragua</option>
                                    <option value="apure">Apure </option>
                                    <option value="caracas">Caracas</option>
                                    <option value="falcon">Falcón</option>
                                    <option value="guarico">Guárico</option>
                                    <option value="merida">Mérida</option>
                                    <option value="miranda">Miranda</option>
                                    <option value="​monagas">​Monagas</option>
                                    <option value="portuguesa">Portuguesa </option>
                                    <option value="sucre">Sucre</option>
                                    <option value="zulia">Zulia </option>
                                </select>
                            </div>
                            <div class="col-xs-12 formulario no-padding">
                                <p>Mi mensaje: </p>
                                <textarea id="first_textarea" class="validate materialize-textarea" name="msg"></textarea>
                            </div>
                            <div class="input-field  col-xs-12 text-center right no-padding">
                                <button class="btn btn-success waves-effect waves-light" type="submit" name="action">Enviar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.3383604462747!2d-67.53182168534232!3d10.234270671765032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e802373f72af945%3A0xdec364e90c2a31a5!2sUniversidad+Bicentenaria+de+Aragua!5e0!3m2!1ses-419!2sve!4v1469493601230" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
        </div>
    </div>
</div>
@stop

@section('postscript')
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#first_textarea').trigger('autoresize');
        $('.map-container').height($('.contact-container').height());
    });
</script>
@stop