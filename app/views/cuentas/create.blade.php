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

@section('javascript')
    {{ HTML::script('js/script.js'); }}
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
        <div id="boton-activo">
            {{ HTML::link(URL::to('cuentas/crear'), 'Crear usuario',array('id'=>'a_crear')) }} 
        </div>
         


    <table>

        {{ Form::open(array('name'=>'formu','url' => 'cuentas/crear/', 'method' => 'POST','files' => true)) }}

        <tr>
            <td>
                {{ Form::label('username', 'Username') }}
            </td>
            <td>
                {{ Form::text('username', Input::old('username')) }}
                {{$errors->first('username')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('nombre', 'Nombre') }}
            </td>
            <td>
                {{ Form::text('nombre', Input::old('nombre')) }}
                {{$errors->first('nombre')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('apellido', 'apellido') }}
            </td>
            <td>
                {{ Form::text('apellido', Input::old('apellido')) }}
                {{$errors->first('apellido')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('correo', 'correo') }}
            </td>
            <td>
                {{ Form::text('correo', Input::old('correo')) }}
                {{$errors->first('correo')}}
            </td>
        </tr>


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
                {{ Form::label( 'telefono') }}
            </td>
            <td>
                {{ Form::text('tel') }}
                {{$errors->first('tel')}}
                {{$errors->first('tel')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('direccion', 'direccion') }}
            </td>
            <td>
                {{ Form::text('direccion', Input::old('direccion')) }}
                {{$errors->first('direccion')}}
            </td>
        </tr>


        <tr>
            <td>

                {{ Form::label('role_id', 'cargo') }}

            </td>
            <td>
                {{ Form::select('role_id', $cargos, null, array('class' => 'selectrole')) }}

            </td>
        </tr>

   <tr>
        <tr>
            <td>
                <div id="textos">
                {{Form::label('encargado','Encargado')}}
                </div>
            </td>
            <td>
                {{ Form::select('encargado', $encargados, null, array('class' => 'selectrole')) }}
            </td>
        </tr>

        


        <tr>
            <td>

            </td>
            <td>
                {{ Form::submit('Crear usuario') }}
            </td>
        </tr>

        {{ Form::close() }}

    </table>


@stop