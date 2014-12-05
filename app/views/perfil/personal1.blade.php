!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    {{ HTML::style('css/bootstrap.css'); }}
</head>
<body>
<div class="container">
    <ul>{{ HTML::link(URL::to('/'), 'volver') }}</ul>
    <h1>Perfil de {{ Auth::user()->nombre;}}
    @if (Auth::user()->role_id == '1')
    "Super Administrador"
    @endif
    @if (Auth::user()->role_id == '2')
    "Administrador"
    @endif
    @if (Auth::user()->role_id == '3')
    "Vendedor"</h1>
    @endif
</div>
<div class="perfil">
    <h1>Datos personales</h1>
    {{ HTML::image('imgs/'.Auth::user()->foto) }}

    <div>
        {{ Form::open(array('url' => 'perfil/personal/'.Auth::user()->id, 'method' => 'POST','files' => true,'enctype'=>'multipart/form-data')) }}
        {{ Form::file('foto') }}
        {{ Form::submit('subir foto') }}
        {{ Form::close()}}
    </div>

    <h3>Encargado: {{ Auth::user()->encargado;}}</h3>
    <h3>Nombre: {{ Auth::user()->nombre;}}</h3>
    <h3>Apellido: {{ Auth::user()->apellido;}}</h3>
    <h3>correo: {{ Auth::user()->correo;}}</h3>
    <h3>telefono: {{ Auth::user()->tel;}}</h3>
    <h3>direccion: {{ Auth::user()->direccion;}}</h3>
    <li>  {{HTML::link(URL::to('cuentas/cambiar/'.Auth::user()->id), 'Cambiar contraseña') }}    </li>
    <li>  {{ HTML::link(URL::to('logout'), 'Cerrar Sesion') }}    </li>
</div>

<script src="https://code.jquery.com/jquery.js"></script>
{{ HTML::script('js/bootstrap.js'); }}
</body>
</html>