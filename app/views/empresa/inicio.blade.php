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
<div class="cuerpo2">
        <div id="titulos">
            @yield('clientes')
        </div>

            @if(count($users)>0)
            
            @foreach($users as $user)
            @if(Auth::user()->role_id<3)
                <div id="titulos_body">
                {{ HTML::link(URL::to('empresa/ver/'.$user->correo), '',array('id'=>'select-titulos')) }}
                <ul>{{ HTML::image('empresa/'.$user->logo,'', array ('class' => 'img')) }}
                    Nombre:  {{ $user->nombre_empresa }}
                    Estado:
                    @if($user->estado==1)
                        {{ HTML::image('icon/8.png','', array ('class' => 'icon')) }}
                    @endif 
                    @if($user->estado==2)
                        {{ HTML::image('icon/4.png','', array ('class' => 'icon')) }}
                    @endif 
                    @if($user->estado==3)
                        {{ HTML::image('icon/2.png','', array ('class' => 'icon')) }}
                    @endif 
                    @if($user->estado==4)
                        {{ HTML::image('icon/1.png','', array ('class' => 'icon')) }}
                    @endif 
                </ul>

            </div>
            @else
                @if($user->propietario_cliente==Auth::user()->username)
                    <div id="titulos_body">
                        {{ HTML::link(URL::to('empresa/ver/'.$user->correo), '',array('id'=>'select-titulos')) }}
                        <ul>{{ HTML::image('empresa/'.$user->logo,'', array ('class' => 'img')) }}
                            Nombre:  {{ $user->nombre_empresa }}
                            Estado:
                            @if($user->estado==1)
                                {{ HTML::image('icon/8.png','', array ('class' => 'icon')) }}
                            @endif 
                            @if($user->estado==2)
                                {{ HTML::image('icon/4.png','', array ('class' => 'icon')) }}
                            @endif 
                            @if($user->estado==3)
                                {{ HTML::image('icon/2.png','', array ('class' => 'icon')) }}
                            @endif 
                            @if($user->estado==4)
                                {{ HTML::image('icon/1.png','', array ('class' => 'icon')) }}
                            @endif 
                        </ul>

                    </div>
                @endif
            @endif

            @endforeach
            @else
            <p>No hay clientes</p>
            @endif

    </div>

    <div class="cuerpo2">
        <div id="titulos">
            @yield('prospecto')
        </div>
          @if(count($prospectos)>0)
            @foreach($prospectos as $prospecto)
            @if(Auth::user()->role_id<3)
             <div id="titulos_body">
                    {{ HTML::link(URL::to('empresa/ver/'.$prospecto->correo), '',array('id'=>'select-titulos')) }}
                    <ul>{{ HTML::image('empresa/'.$prospecto->logo,'', array ('class' => 'img')) }}
                        Nombre: {{ $prospecto->nombre_empresa }}
                        Estado: 
                        @if($prospecto->estado==1)
                            {{ HTML::image('icon/2.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==2)
                            {{ HTML::image('icon/3.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==3)
                            {{ HTML::image('icon/4.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==4)
                            {{ HTML::image('icon/5.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==5)
                            {{ HTML::image('icon/6.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==6)
                            {{ HTML::image('icon/7.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==7)
                            {{ HTML::image('icon/8.png','', array ('class' => 'icon')) }}
                        @endif 
                    </ul>

                </div>
            @else
                 @if($prospecto->propietario_cliente==Auth::user()->username)
                     <div id="titulos_body">
                    {{ HTML::link(URL::to('empresa/ver/'.$prospecto->correo), '',array('id'=>'select-titulos')) }}
                    <ul>{{ HTML::image('empresa/'.$prospecto->logo,'', array ('class' => 'img')) }}
                        Nombre: {{ $prospecto->nombre_empresa }}
                        Estado: 
                        @if($prospecto->estado==1)
                            {{ HTML::image('icon/2.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==2)
                            {{ HTML::image('icon/3.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==3)
                            {{ HTML::image('icon/4.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==4)
                            {{ HTML::image('icon/5.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==5)
                            {{ HTML::image('icon/6.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==6)
                            {{ HTML::image('icon/7.png','', array ('class' => 'icon')) }}
                        @endif 
                        @if($prospecto->estado==7)
                            {{ HTML::image('icon/8.png','', array ('class' => 'icon')) }}
                        @endif 
                    </ul>
                </div>
                 @endif
            @endif

            @endforeach
            @else
            <p>No hay prospectos</p>
            @endif
    </div>
	
@stop