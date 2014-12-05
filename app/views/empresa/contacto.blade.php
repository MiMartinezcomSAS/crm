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


@section('prospecto')
	<p>Prospecto</p>
@stop

@section('prospecto_body')
	<p>lista de prospectos</p>
@stop

@section('navegacion')
	<div id="menu">
			{{ HTML::link(URL::to('clientes/crear'), 'Clientes',array('id'=>'a')) }}
			{{ HTML::link(URL::to('prospectos/crear'), 'Prospecto',array('id'=>'b')) }}
			{{ HTML::link(URL::to('empresa/inicio'), 'Empresa',array('id'=>'curret')) }}
			{{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'d')) }}
	</div>

			
@stop

@section('espacio_trabajo')

    @if(count($contactos)>0)
        @foreach($contactos as $contacto)
         {{ HTML::image('contacto/'.$contacto->foto,'', array ('class' => 'img')) }}
            <p>Nombre:{{$contacto->nombre}}</p>
            <p>Apellido:{{$contacto->apellido}}</p>
            <p>Cargo:{{$contacto->id_cargo}}</p>
            <p>Telefono:{{$contacto->tel}}</p>
            <p>Movil:{{$contacto->movil}}</p>
            <p>Empresa:{{$contacto->empresa}}</p>
        @endforeach
    @else
        no hay contactos relacionados con esta empresa agregue un contacto {{ HTML::link(URL::to('clientes/crearcontacto'), 'Crear contacto',array('id'=>'a_crear')) }}
    @endif

@stop