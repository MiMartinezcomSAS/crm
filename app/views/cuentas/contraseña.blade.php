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
        {{ HTML::link(URL::to('prospectos/crear'), 'Prospecto',array('id'=>'b')) }}
        {{ HTML::link(URL::to('empresa/inicio'), 'Empresa',array('id'=>'c')) }}
        {{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'curret')) }}
    </div>


@stop

@section('espacio_trabajo')
    <div id="boton"  >
        {{ HTML::link(URL::to('cuentas/ver'), 'Ver usuarios',array('id'=>'a_ver')) }}

    </div>
    <div id="boton">
        {{ HTML::link(URL::to('cuentas/crear'), 'Crear usuario',array('id'=>'a_crear')) }}
    </div>


<h1 class="subheader">Cambio de contraseña</h1>
    {{ Session::get('mensaje') }}

    <table>
        {{ Form::open(array('url' => 'cuentas/cambiar/'.$user->id)) }}
        <tr>
            <td>
                {{ Form::label('password') }}
            </td>
            <td>
                {{ Form::password('password') }}
                {{$errors->first('password')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('confirmar password') }}
            </td>
            <td>
                {{ Form::password('confirmar_password') }}
                {{$errors->first('confirmar_password')}}
            </td>
        </tr>


        <tr>
            <td>

            </td>
            <td>
                {{ Form::submit('Actualizar Contraseña') }}
            </td>
        </tr>

        {{ Form::close() }}

    </table>
@stop