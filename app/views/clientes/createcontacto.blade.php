@extends('plantilla.base')

@section('titulo')
    Cerverus
@stop

@section('head')
    {{HTML::style('css/style.css');}}
@stop

@section('logo')
    <div id ="ima">
        {{ HTML::image('img/logo.png','', array ('id' => 'img')) }}
    </div>
@stop

@section('perfil')

    {{ HTML::image('imgs/'.Auth::user()->foto,'',array('id'=>'foto1')) }}
    <div id="conten">
        <p id="perfil">{{ Auth::user()->nombre;}}</p>
        @if (Auth::user()->role_id == '1')
        <span>super administrador</span>
        @endif
        @if (Auth::user()->role_id == '2')
        <span>Administrador</span>
        @endif
        @if (Auth::user()->role_id == '3')
        <span>Vendedor</span>
        @endif
    </div>


@stop

@section('estado')
    <p>Boton de busqueda</p>
@stop

@section('detalles')
    <p>detalles</p>
@stop

@section('cuerpo_detalles')
    <p>aqui va informacion del estado del cliente o prospecto</p>
@stop

@section('clientes')
    <p>clientes</p>
@stop

@section('clientes_body')
    <p>lista de clientes</p>
@stop

@section('prospecto')
    <p>Prospecto</p>
@stop

@section('prospecto_body')
    <p>lista de prospectos</p>
@stop

@section('navegacion')
    <div id="menu">
            {{ HTML::link(URL::to('clientes/crear'), 'Clientes',array('id'=>'a')) }}
            {{ HTML::link(URL::to('prospectos/crear'), 'Prospecto',array('id'=>'curret')) }}
            {{ HTML::link(URL::to('empresa/inicio'), 'Empresa',array('id'=>'c')) }}
            {{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'d')) }}
    </div>

            
@stop

@section('espacio_trabajo')

    <div id="boton"  >
        {{ HTML::link(URL::to('prospectos/crear'), 'Crear prospecto',array('id'=>'a_ver')) }}

    </div>
    <div id="boton-activo">
        {{ HTML::link(URL::to('clientes/crearcontacto'), 'Crear contacto',array('id'=>'a_crear')) }}
    </div>

<ul>{{ HTML::link(URL::to('clientes/crearcargo'), 'crear cargo') }}</ul>

<h1 class="subheader">Agregar Contacto</h1>

{{Form::open(array('url'=>'clientes/crearcontacto', 'method' => 'POST','files'=> true))}}
    <div class="form-group">
        {{ Form::label('nombre', 'Nombre') }}
        {{ Form::text('nombre') }}
        {{$errors->first('nombre')}}
    </div>

    <div class="form-group">
        {{ Form::label('apellido', 'Apellido') }}
        {{ Form::text('apellido') }}
        {{$errors->first('apellido')}}
    </div>

    <div class="form-group">
        {{ Form::label('id_cargo', 'Cargo') }}
        {{ Form::select('id_cargo', $cargos, null, array('class' => 'id_cargo')) }}
    </div>

    <div class="form-group">
        {{ Form::label('correo', 'Correo') }}
        {{ Form::text('correo') }}
        {{$errors->first('correo')}}
    </div>

    <div class="form-group">
        {{ Form::label('tel', 'Telefono') }}
        {{ Form::text('tel') }}
        {{$errors->first('tel')}}
    </div>

    <div class="form-group">
        {{ Form::label('movil', 'Movil') }}
        {{ Form::text('movil') }}
        {{$errors->first('movil')}}
    </div>

    <div class="form-group">
        {{ Form::label('empresa', 'Empresa') }}
        {{ Form::select('empresa', $empresas, null, array('class' => 'empresa')) }}
    </div>

{{Form::submit('Agregar contacto')}}

{{Form::close()}}

@stop