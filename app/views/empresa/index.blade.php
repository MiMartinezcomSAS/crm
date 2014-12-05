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
                
    @if(count($prospectos)>0)
    
        @foreach($prospectos as $prospecto)
            {{ HTML::image('empresa/'.$prospecto->logo,'', array ('class' => 'img')) }}
            <p>Nombre:{{$prospecto->nombre_empresa}}</p>
            <p>Estado:
                        @if($prospecto->estado==1)
                            contizacion ordinaria y anexo
                        @endif 
                        @if($prospecto->estado==2)
                            portafolio y propuesta
                        @endif 
                        @if($prospecto->estado==3)
                            primera llamada
                        @endif 
                        @if($prospecto->estado==4)
                            contizacion especifica
                        @endif 
                        @if($prospecto->estado==5)
                            segunda llamada
                        @endif 
                        @if($prospecto->estado==6)
                            negociacion
                        @endif 
                        @if($prospecto->estado==7)
                            contrato
                        @endif 
            </p>
            <p>Nit:{{$prospecto->nit}}</p>
            <p>Direccion:{{$prospecto->direccion}}</p>
            <p>Telefono:{{$prospecto->tel}}</p>
            <p>Ext:{{$prospecto->ext}}</p>
            <p>Correo:{{$prospecto->correo}}</p>
            <p>Correo opcional:{{$prospecto->correo2}}</p>
            <p>Movil:{{$prospecto->movil}}</p>
            <p>Encargado del cliente:{{$prospecto->propietario_cliente}}</p>
            <p>Pagina web:{{$prospecto->pag_web}}</p>
            <p>Fax:{{$prospecto->fax}}</p>
            <p>Fuente:{{$prospecto->fuente}}</p>
            <p>Pais:{{$prospecto->pais}}</p>
            <p>Ciudad:{{$prospecto->ciudad}}</p>
            <p>Maps:{{$prospecto->maps}}</p>
            <p>Skype:{{$prospecto->skype}}</p>
                <H1>CONTACTOS</H1>
            @if(count($contactos1))
            <div id="accordionHTML5" class="accordion">

                @foreach($contactos1 as $contacto1)

                <details>
                    <summary><h2>{{$contacto1->nombre}}</h2></summary>
                    <p> {{ HTML::image('contacto/'.$contacto1->foto,'', array ('class' => 'img')) }}</p>

                    <p>Nombre:{{$contacto1->nombre}}</p>
                    <p>Apellido:{{$contacto1->apellido}}</p>
                    <p>Correo:{{$contacto1->correo}}</p>
                    <p>Cargo:
                        @if(count($cargos))
                             @foreach($cargos as $cargo)
                                @if($contacto1->id_cargo==$cargo->id)
                                    {{$cargo->nombre}}
                                @endif
                             @endforeach
                        @else
                            no hay cargos cree uno {{ HTML::link(URL::to('clientes/crearcargo'), 'crear cargo') }}
                        @endif
                    </p>
                    <p>Telefono:{{$contacto1->tel}}</p>
                    <p>Movil:{{$contacto1->movil}}</p>
                    <p>Empresa:{{$contacto1->empresa}}</p>
                    {{ HTML::link(URL::to('empresa/updatecontacto/'.$contacto1->id), 'actualizar contacto',array('id'=>'a')) }}
                </details>
      

                @endforeach
                </div>
            @else
                <p>no hay contactos     </p>
            @endif

           <!-- {{ HTML::link(URL::to('empresa/contacto/'.$prospecto->nombre_empresa), 'ver contactos',array('id'=>'a')) }}-->
            {{ HTML::link(URL::to('empresa/crearcontacto/'.$prospecto->id), 'Crear contacto',array('id'=>'a_crear')) }}
            {{ HTML::link(URL::to('empresa/update/'.$prospecto->correo), 'actualizar',array('id'=>'a')) }}
        @endforeach
    @endif

    @if(count($clientes)>0)

        @foreach($clientes as $cliente)
            {{ HTML::image('empresa/'.$cliente->logo,'', array ('class' => 'img')) }}
            <p>Nombre:{{$cliente->nombre_empresa}}</p>
            <p>Estado:
                @if($cliente->estado==1)
                    activo
                @endif 
                @if($cliente->estado==2)
                    mensual
                @endif 
                @if($cliente->estado==3)
                    moroso
                @endif 
                @if($cliente->estado==4)
                    eliminado
                @endif 
            </p>
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
            <p>Fecha pago:{{$cliente->fecha_pago}}</p>
            <p>Fecha expedicion:{{$cliente->fecha_expedicion}}</p>

            <H1>CONTACTOS</H1>
             @if(count($contactos2))
            <div id="accordionHTML5" class="accordion">

                @foreach($contactos2 as $contacto2)

                <details>
                    <summary><h2>{{$contacto2->nombre}}</h2></summary>
                    <p> {{ HTML::image('contacto/'.$contacto2->foto,'', array ('class' => 'img')) }}</p>
                    <p>Nombre:{{$contacto2->nombre}}</p>
                    <p>Apellido:{{$contacto2->apellido}}</p>
                    <p>Correo:{{$contacto2->correo}}</p>
                    <p>Cargo:
                        @if(count($cargos))
                             @foreach($cargos as $cargo)
                                @if($contacto2->id_cargo==$cargo->id)
                                    {{$cargo->nombre}}
                                @endif
                             @endforeach
                        @else
                            no hay cargos cree uno {{ HTML::link(URL::to('clientes/crearcargo'), 'crear cargo') }}
                        @endif
                    </p>
                    <p>Telefono:{{$contacto2->tel}}</p>
                    <p>Movil:{{$contacto2->movil}}</p>
                    <p>Empresa:{{$contacto2->empresa}}</p>
                    <p> {{ HTML::link(URL::to('empresa/updatecontacto/'.$contacto2->id), 'actualizar contacto',array('id'=>'a')) }}</p>
                </details>
      

                @endforeach
                </div>
            @else
                <p>no hay contactos  </p>
            @endif
           <!-- {{ HTML::link(URL::to('empresa/contacto/'.$cliente->nombre_empresa), 'ver contactos',array('id'=>'a')) }}-->
           {{ HTML::link(URL::to('empresa/crearcontacto1/'.$cliente->id), 'Crear contacto',array('id'=>'a_crear')) }}
            {{ HTML::link(URL::to('empresa/update/'.$cliente->correo), 'actualizar',array('id'=>'a')) }}
        @endforeach
    @endif

@stop