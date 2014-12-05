@extends('plantilla.base')

@section('titulo')
	Cerverus
@stop

@section('head')
	{{HTML::style('css/style.css');}}
@stop

@section('logo')
	{{ HTML::link(URL::to('/'), '',array('id'=>'a_logo')) }}  
	<div id ="ima">
    	{{ HTML::image('img/logo.png','', array ('id' => 'img')) }}
	</div>
@stop

@section('perfil')
	{{ HTML::link(URL::to('perfil/personal/'), '',array('id'=>'a_perfil')) }}  
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

@section('cuerpo_estado')
	<p>Novedades</p>
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
			<li><a id="a" href="http://localhost/vistas/public/clientes/crear">Clientes</a></li>
			<li><a id="b" href="http://localhost/vistas/public/prospectos/crear">Prospecto</a></li>
			<li><a class="current" id="c" href="http://localhost/vistas/public/clientes/crearcontacto">Empresa</a></li>
			<li><a id="d" href="http://localhost/vistas/public/cuentas/ver">Administrar</a></li>
			<li><a id="e" href="http://localhost/vistas/public/logout">Cerrar Sesion</a></li>
@stop

@section('espacio_trabajo')
<ul>{{ HTML::link(URL::to('clientes/crearcargo'), 'crear cargo') }}</ul>
{{ Session::get('mensaje') }}
<h1 class="subheader">Agregar Contacto</h1>

{{Form::open(array('url'=>'clientes/vincularcontacto/', 'method' => 'POST','files'=> true))}}
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

    <div class="form-group">
        {{ Form::label('foto', 'foto') }}
        {{ Form::file('foto') }}
        {{$errors->first('foto')}}
    </div>

{{Form::submit('Agregar contacto')}}

{{Form::close()}}

@stop