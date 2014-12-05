@extends('../plantilla.base')


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
			{{ HTML::link(URL::to('prospectos/crear'), 'Prospecto',array('id'=>'b')) }}
			{{ HTML::link(URL::to('empresa/inicio'), 'Empresa',array('id'=>'c')) }}
			{{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'curret')) }}
	</div>

			
@stop

@section('espacio_trabajo')
		<div id="boton"  >
             {{ HTML::link(URL::to('perfil/actualizar'), 'Actualizar Datos',array('id'=>'a_ver')) }}
                 
        </div>
        <div id="boton">
            {{ HTML::link(URL::to('cuentas/cambiar/'.Auth::user()->id), 'Cambiar contraseña',array('id'=>'a_cambiar')) }} 
        </div>
		<div id="perfil_titulo">
		   
		    <div id="perfil_contenido">
		    	 <h1>Datos personales</h1>
		    	{{ HTML::image('imgs/'.Auth::user()->foto,'',array('id'=>'perfil_foto')) }}
		    	<div id="subir_foto">
		    		{{ Form::open(array('url' => 'perfil/personal/'.Auth::user()->id,'files' => true)) }}
			        {{ Form::file('foto') }}
			        {{ Form::submit('subir foto') }}
			        {{ Form::close()}}
		    	</div>
		       


		    </div>
		    <div id="perfil_contenido1">
		    	<h3>Encargado: {{ Auth::user()->encargado;}}</h3>
			    <h3>Nombre: {{ Auth::user()->nombre;}}</h3>
			    <h3>Apellido: {{ Auth::user()->apellido;}}</h3>
			    <h3>correo: {{ Auth::user()->correo;}}</h3>
			    <h3>telefono: {{ Auth::user()->tel;}}</h3>
			    <h3>direccion: {{ Auth::user()->direccion;}}</h3>
		    </div>


	</div>

@stop
