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
            {{ HTML::link(URL::to('clientes/crear'), 'Clientes',array('id'=>'curret')) }}
            {{ HTML::link(URL::to('prospectos/crear'), 'Prospecto',array('id'=>'b')) }}
            {{ HTML::link(URL::to('empresa/inicio'), 'Empresa',array('id'=>'c')) }}
            {{ HTML::link(URL::to('cuentas/ver'), 'Administrar',array('id'=>'d')) }}
    </div>

            
@stop

@section('espacio_trabajo')


        <h1 class="subheader">Crear nuevo Cliente</h1>
        {{ Session::get('mensaje') }}
        {{Form::open(array('url'=>'clientes/crear/', 'method' => 'POST','files'=> true))}}

        <div class="form-group">
            {{ Form::label('nombre_empresa', 'Nombre de la empresa') }}
            {{ Form::text('nombre_empresa') }}
            {{$errors->first('nombre_empresa')}}
        </div>

        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            {{ Form::select('estado', $estado, null, array('class' => 'estado')) }}
        </div>

        <div class="form-group">
            {{ Form::label('nit', 'Nit') }}
            {{ Form::text('nit') }}
            {{$errors->first('nit')}}
        </div>

        <div class="form-group">
            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion') }}
            {{$errors->first('direccion')}}
        </div>

        <div class="form-group">
            {{ Form::label('tel', 'Telefono') }}
            {{ Form::text('tel') }}
            {{$errors->first('telefono')}}
        </div>

        <div class="form-group">
            {{ Form::label('ext', 'Ext') }}
            {{ Form::text('ext') }}
            {{$errors->first('ext')}}
        </div>

        <div class="form-group">
            {{ Form::label('correo', 'Correo') }}
            {{ Form::text('correo') }}
            {{$errors->first('correo')}}
        </div>

        <div class="form-group">
            {{ Form::label('correo2', 'Correo opcional') }}
            {{ Form::text('correo2') }}
            {{$errors->first('correo2')}}
        </div>

        <div class="form-group">
            {{ Form::label('movil', 'Movil') }}
            {{ Form::text('movil') }}
            {{$errors->first('movil')}}
        </div>

        <div class="form-group">
            {{ Form::label('propietario_cliente', 'Propietario del cliente') }}
            {{ Form::select('propietario_cliente', $propietario, null, array('class' => 'propietario_cliente')) }}
        </div>

        <div class="form-group">
            {{ Form::label('pag_web', 'pagina web') }}
            {{ Form::text('pag_web') }}
            {{$errors->first('pag_web')}}
        </div>

        <div class="form-group">
            {{ Form::label('fax', 'Fax') }}
            {{ Form::text('fax') }}
            {{$errors->first('fax')}}
        </div>

        <div class="form-group">
            {{ Form::label('fuente', 'fuente del cliente') }}
            {{ Form::text('fuente') }}
            {{$errors->first('fuente')}}
        </div>

        <div class="form-group">
            {{ Form::label('pais', 'Pais') }}
            {{ Form::text('pais') }}
            {{$errors->first('pais')}}
        </div>

        <div class="form-group">
            {{ Form::label('cuidad', 'Cuidad') }}
            {{ Form::text('ciudad') }}
            {{$errors->first('ciudad')}}
        </div>

        <div class="form-group">
            {{ Form::label('maps', 'ubicacion') }}
            {{ Form::text('maps') }}
            {{$errors->first('maps')}}
        </div>

        <div class="form-group">
            {{ Form::label('skype', 'Skype') }}
            {{ Form::text('skype') }}
            {{$errors->first('skype')}}
        </div>

        <div class="form-group">
            {{ Form::label('fecha_pago', 'Fecha de pago') }}
            {{Form::input('date', 'fecha_pago') }}
            {{$errors->first('fecha_pago')}}
        </div>

        <div class="form-group">
            {{ Form::label('fecha_expedicion', 'Fecha de expedicion') }}
            {{Form::input('date', 'fecha_expedicion') }}
            {{$errors->first('fecha_expedicion')}}
        </div>

        {{Form::submit('Crear cliente')}}

        {{Form::close()}}

@stop
