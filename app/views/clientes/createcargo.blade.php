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
    {{ HTML::link(URL::to('clientes/crearcontacto'), 'Empresa',array('id'=>'c')) }}
    {{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'d')) }}
</div>


@stop

@section('espacio_trabajo')

<div id="boton"  >
    {{ HTML::link(URL::to('clientes/crearcontacto'), 'crear contacto',array('id'=>'a_ver')) }}

</div>
{{ Session::get('mensaje') }}
<h1 class="subheader">Agregar Cargo</h1>

{{Form::open(array('url'=>'clientes/crearcargo/', 'method' => 'POST'))}}

    <div class="form-group">
        {{ Form::label('nombre', 'Cargo') }}
        {{ Form::text('nombre') }}
        {{$errors->first('nombre')}}
    </div>

{{Form::submit('Agregar contacto')}}

{{Form::close()}}
{{$xmlEntry}}


@stop