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
			{{ HTML::link(URL::to('empresa/inicio'), 'Empresa',array('id'=>'c')) }}
			{{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'d')) }}
	</div>

			
@stop

@section('espacio_trabajo')

	 @if(count($clientes)>0)

        @foreach($clientes as $cliente)
            {{ HTML::image('empresa/'.$cliente->logo,'', array ('class' => 'img')) }}
            <p>Nombre:{{$cliente->nombre_empresa}}</p>
            <p>Estado:{{$cliente->estado}}</p>
            <p>Nit:{{$cliente->nit}}</p>
            <p>Direccion:{{$cliente->direccion}}</p>
            <p>Telefono:{{$cliente->tel}}</p>
            <p>Ext:{{$cliente->ext}}</p>
            <p>Correo:{{$cliente->correo}}</p>
            <p>Correo opcional:{{$cliente->correo2}}</p>
            <p>Movil:{{$cliente->movil}}</p>
            <p>Encargado del cliente:{{$cliente->propietario_cliente}}</p>
            <p>Pagina web:{{$cliente->pag_web}}</p>
            <p>Fax:{{$cliente->fax}}</p>
            <p>Fuente:{{$cliente->fuente}}</p>
            <p>Pais:{{$cliente->pais}}</p>
            <p>Ciudad:{{$cliente->ciudad}}</p>
            <p>Maps:{{$cliente->maps}}</p>
            <p>Skype:{{$cliente->skype}}</p>
        @endforeach
    @else
    	no tienes clientes 
    @endif
	
@stop