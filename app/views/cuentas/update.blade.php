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

@section('javascript')
    {{ HTML::script('js/script.js'); }}
@stop


@section('espacio_trabajo')
    <div id="boton"  >
        {{ HTML::link(URL::to('cuentas/ver'), 'Ver usuarios',array('id'=>'a_ver')) }}

    </div>
    <div id="boton">
        {{ HTML::link(URL::to('cuentas/crear'), 'Crear usuario',array('id'=>'a_crear')) }}
    </div>


<h1 class="subheader">Actualiza un usuario</h1>
    {{ Session::get('mensaje') }}
    @if($errors->has())
    <div class="alert-box alert">
        @foreach ($errors->all('<p>:message</p>') as $message)
        {{ $message }}
        @endforeach

    </div>
    @endif

    <table>
        {{ Form::open(array('url' => 'cuentas/actualizar/'.$user->id)) }}

        <tr>
            <td>
                {{ Form::label('nombre', 'Nombre') }}
            </td>
            <td>
                {{ Form::text('nombre', Input::old('nombre') ? Input::old('nombre') : $user->nombre) }}
                {{$errors->first('nombre')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('apellido', 'Apellido') }}
            </td>
            <td>
                {{ Form::text('apellido', Input::old('apellido') ? Input::old('apellido') : $user->apellido) }}
                {{$errors->first('apellido')}}
            </td>
        </tr>


        <tr>
            <td>
                {{ Form::label('correo', 'Correo') }}
            </td>
            <td>
                {{ Form::text('correo', Input::old('correo') ? Input::old('correo') : $user->correo) }}
                {{$errors->first('correo')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('tel', 'Telefono') }}
            </td>
            <td>
                {{ Form::text('tel', Input::old('tel') ? Input::old('tel') : $user->tel) }}
                {{$errors->first('tel')}}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('direccion', 'Direccion') }}
            </td>
            <td>
                {{ Form::text('direccion', Input::old('direccion') ? Input::old('direccion') : $user->direccion) }}
                {{$errors->first('direccion')}}
            </td>
        </tr>



        <tr>
            <td>
                {{ Form::label('role_id', 'Cargo') }}
            </td>
            <td>
                 {{ Form::select('role_id', $cargos, $user->role_id, array('class' => 'selectrole')) }}
            </td>
        </tr>

        <tr>
            <td>
                <div id="textos">
                    {{Form::label('encargado','Encargado')}}
                </div>
            </td>
            <td>
                {{ Form::select('encargado', $encargados, $user->encargado, array('class' => 'selectrole')) }}
            </td>
        </tr>

        <tr>
            <td>

            </td>
            <td>
                {{ Form::submit('Actualizar Usuario') }}
            </td>
        </tr>


        {{ Form::close() }}

    </table>
@stop