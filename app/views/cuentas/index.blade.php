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
       <div id="boton-activo"  >
             {{ HTML::link(URL::to('cuentas/ver'), 'Ver usuarios',array('id'=>'a_ver')) }}  
                 
        </div>
        <div id="boton">
            {{ HTML::link(URL::to('cuentas/crear'), 'Crear usuario',array('id'=>'a_crear')) }} 
        </div>
         


<div class="row">

        @if(count($users) > 0)

        @foreach($users as $user)
        <div class="admin_contenedor">
            {{ HTML::image('imgs/'.$user->foto,'una imagen', array ('id' => 'admin_foto')) }}
            <div class="admin_datos">
            <ul>Username: {{ $user->username }}</ul>
            <ul>Nombre: {{ $user->nombre }}</ul>
            <ul>Apellido: {{ $user->apellido }}</ul>
            <ul>Correo: {{ $user->correo }}</ul>
            @if ($user->role_id == '1')
            <ul>Cargo: Super Administrador </ul>
            @endif
            @if ($user->role_id == '2')
            <ul>Cargo: Administrador</ul>
            @endif
            @if ($user->role_id == '3')
            <ul>Cargo: Vendedor</ul>
            @endif
            <ul>Encargado: {{ $user->encargado }}</ul>
            </div>
            <div id="link">

                        <ul>{{ HTML::link(URL::to('cuentas/actualizar/'.$user->id), 'Actualizar usuario') }}</ul>
                        <ul>{{ HTML::link(URL::to('cuentas/borrar/'.$user->id), 'Borrar usuario') }}</ul>
                        <ul>{{ HTML::link(URL::to('cuentas/cambiar/'.$user->id), 'cambiar contraseña') }}</ul>
                        <ul>{{ HTML::link(URL::to('cuentas/cliente/'.$user->username), 'ver clientes') }}</ul>
            </div>
            </div>

        @endforeach

        @endif



    
</div>
@stop