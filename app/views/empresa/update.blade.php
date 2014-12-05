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

	@if($user->empresa==0)
		

        <h1 class="subheader">Actualizar Prospecto</h1>
        {{ Session::get('mensaje') }}
        {{Form::open(array('url'=>'empresa/update/'.$user->correo, 'method' => 'POST','files'=> true))}}

        <div class="form-group">
            {{ Form::label('logo', 'Logo:') }}
            {{ Form::file('logo') }}
            {{$errors->first('logo')}}
        </div>

        <div class="form-group">
            {{ Form::label('nombre_empresa', 'Nombre de la empresa:'.$user->nombre_empresa) }}
            {{ Form::text('nombre_empresa') }}
            {{$errors->first('nombre_empresa')}}
        </div>

        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            {{ Form::select('estado', $estado1, $user->estado, array('class' => 'estado')) }}
        </div>

        <div class="form-group">
            {{ Form::label('nit', 'Nit') }}
            {{ Form::text('nit', Input::old('nit') ? Input::old('nit') : $user->nit) }}
            {{$errors->first('nit')}}
        </div>

        <div class="form-group">
            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion', Input::old('direccion') ? Input::old('direccion') : $user->direccion) }}
            {{$errors->first('direccion')}}
        </div>

        <div class="form-group">
            {{ Form::label('tel', 'Telefono') }}
            {{ Form::text('tel', Input::old('tel') ? Input::old('tel') : $user->tel) }}
            {{$errors->first('telefono')}}
        </div>

        <div class="form-group">
            {{ Form::label('ext', 'Ext') }}
            {{ Form::text('ext', Input::old('ext') ? Input::old('ext') : $user->ext) }}
            {{$errors->first('ext')}}
        </div>

        <div class="form-group">
            {{ Form::label('correo', 'Correo:'.$user->correo) }}
            {{ Form::text('correo') }}
            {{$errors->first('correo')}}
        </div>

        <div class="form-group">
            {{ Form::label('correo2', 'Correo opcional:'.$user->correo2) }}
            {{ Form::text('correo2') }}
            {{$errors->first('correo2')}}
        </div>

        <div class="form-group">
            {{ Form::label('movil', 'Movil') }}
            {{ Form::text('movil', Input::old('movil') ? Input::old('movil') : $user->movil) }}
            {{$errors->first('movil')}}
        </div>

        <div class="form-group">
            {{ Form::label('propietario_cliente', 'Propietario del cliente') }}
            {{ Form::select('propietario_cliente', $propietario, $user->propietario_cliente, array('class' => 'propietario_cliente')) }}
        </div>

        <div class="form-group">
            {{ Form::label('pag_web', 'pagina web') }}
            {{ Form::text('pag_web', Input::old('pag_web') ? Input::old('pag_web') : $user->pag_web) }}
            {{$errors->first('pag_web')}}
        </div>

        <div class="form-group">
            {{ Form::label('fax', 'Fax') }}
            {{ Form::text('fax', Input::old('fax') ? Input::old('fax') : $user->fax) }}
            {{$errors->first('fax')}}
        </div>

        <div class="form-group">
            {{ Form::label('fuente', 'fuente del cliente') }}
            {{ Form::text('fuente', Input::old('fuente') ? Input::old('fuente') : $user->fuente) }}
            {{$errors->first('fuente')}}
        </div>

        <div class="form-group">
            {{ Form::label('pais', 'Pais') }}
            {{ Form::text('pais', Input::old('pais') ? Input::old('pais') : $user->fax) }}
            {{$errors->first('pais')}}
        </div>

        <div class="form-group">
            {{ Form::label('ciudad', 'Ciudad') }}
            {{ Form::text('ciudad', Input::old('ciudad') ? Input::old('ciudad') : $user->ciudad) }}
            {{$errors->first('ciudad')}}
        </div>

        <div class="form-group">
            {{ Form::label('maps', 'ubicacion') }}
            {{ Form::text('maps', Input::old('maps') ? Input::old('maps') : $user->maps) }}
            {{$errors->first('maps')}}
        </div>

        <div class="form-group">
            {{ Form::label('skype', 'Skype') }}
            {{ Form::text('skype', Input::old('skype') ? Input::old('skype') : $user->skype) }}
            {{$errors->first('skype')}}
        </div>

        {{Form::submit('Actualizar cliente')}}

        {{Form::close()}}


	@else

		 <h1 class="subheader">Actualizar Cliente</h1>
        {{ Session::get('mensaje') }}
        {{Form::open(array('url'=>'empresa/update/'.$user->correo, 'method' => 'POST','files'=> true))}}

        <div class="form-group">
            {{ Form::label('logo', 'Logo:') }}
            {{ Form::file('logo') }}
            {{$errors->first('logo')}}
        </div>

        <div class="form-group">
            {{ Form::label('nombre_empresa', 'Nombre de la empresa:'.$user->nombre_empresa) }}
            {{ Form::text('nombre_empresa') }}
            {{$errors->first('nombre_empresa')}}
        </div>

        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            {{ Form::select('estado', $estado, $user->estado, array('class' => 'estado')) }}
        </div>

        <div class="form-group">
            {{ Form::label('nit', 'Nit') }}
            {{ Form::text('nit', Input::old('nit') ? Input::old('nit') : $user->nit) }}
            {{$errors->first('nit')}}
        </div>

        <div class="form-group">
            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion', Input::old('direccion') ? Input::old('direccion') : $user->direccion) }}
            {{$errors->first('direccion')}}
        </div>

        <div class="form-group">
            {{ Form::label('tel', 'Telefono') }}
            {{ Form::text('tel', Input::old('tel') ? Input::old('tel') : $user->tel) }}
            {{$errors->first('telefono')}}
        </div>

        <div class="form-group">
            {{ Form::label('ext', 'Ext') }}
            {{ Form::text('ext', Input::old('ext') ? Input::old('ext') : $user->ext) }}
            {{$errors->first('ext')}}
        </div>

        <div class="form-group">
            {{ Form::label('correo', 'Correo:'.$user->correo) }}
            {{ Form::text('correo') }}
            {{$errors->first('correo')}}
        </div>

        <div class="form-group">
            {{ Form::label('correo2', 'Correo opcional:'.$user->correo2) }}
            {{ Form::text('correo2') }}
            {{$errors->first('correo2')}}
        </div>

        <div class="form-group">
            {{ Form::label('movil', 'Movil') }}
            {{ Form::text('movil', Input::old('movil') ? Input::old('movil') : $user->movil) }}
            {{$errors->first('movil')}}
        </div>

        <div class="form-group">
            {{ Form::label('propietario_cliente', 'Propietario del cliente') }}
            {{ Form::select('propietario_cliente', $propietario, $user->propietario_cliente, array('class' => 'propietario_cliente')) }}
        </div>

        <div class="form-group">
            {{ Form::label('pag_web', 'pagina web') }}
            {{ Form::text('pag_web', Input::old('pag_web') ? Input::old('pag_web') : $user->pag_web) }}
            {{$errors->first('pag_web')}}
        </div>

        <div class="form-group">
            {{ Form::label('fax', 'Fax') }}
            {{ Form::text('fax', Input::old('fax') ? Input::old('fax') : $user->fax) }}
            {{$errors->first('fax')}}
        </div>

        <div class="form-group">
            {{ Form::label('fuente', 'fuente del cliente') }}
            {{ Form::text('fuente', Input::old('fuente') ? Input::old('fuente') : $user->fuente) }}
            {{$errors->first('fuente')}}
        </div>

        <div class="form-group">
            {{ Form::label('pais', 'Pais') }}
            {{ Form::text('pais', Input::old('pais') ? Input::old('pais') : $user->fax) }}
            {{$errors->first('pais')}}
        </div>

        <div class="form-group">
            {{ Form::label('ciudad', 'Ciudad') }}
            {{ Form::text('ciudad', Input::old('ciudad') ? Input::old('ciudad') : $user->ciudad) }}
            {{$errors->first('ciudad')}}
        </div>

        <div class="form-group">
            {{ Form::label('maps', 'ubicacion') }}
            {{ Form::text('maps', Input::old('maps') ? Input::old('maps') : $user->maps) }}
            {{$errors->first('maps')}}
        </div>

        <div class="form-group">
            {{ Form::label('skype', 'Skype') }}
            {{ Form::text('skype', Input::old('skype') ? Input::old('skype') : $user->skype) }}
            {{$errors->first('skype')}}
        </div>

        <div class="form-group">
            {{ Form::label('fecha_pago', 'Fecha de pago:'.$user->fecha_pago) }}
            {{Form::input('date', 'fecha_pago') }}
            {{$errors->first('fecha_pago')}}
        </div>

        <div class="form-group">
            {{ Form::label('fecha_expedicion', 'Fecha de expedicion:'.$user->fecha_expedicion) }}
             {{Form::input('date', 'fecha_expedicion') }}
            {{$errors->first('fecha_expedicion')}}
        </div>

        {{Form::submit('Actualizar cliente')}}

        {{Form::close()}}

	@endif



	
@stop