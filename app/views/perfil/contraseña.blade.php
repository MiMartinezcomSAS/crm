<!DOCTYPE HTML>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
</head>
<body>

<div class="row">
    <ul>{{ HTML::link(URL::to('perfil/personal'), 'volver') }}</ul>
    <h1 class="subheader">Cambio de contraseña</h1>
    @if($errors->has())
    <div class="alert-box alert">
        @foreach ($errors->all('<p>:message</p>') as $message)
        {{ $message }}
        @endforeach

    </div>
    @endif

    <table>
        {{ Form::open(array('url' => 'personal/cambiar/'.$user->id)) }}
        <tr>
            <td>
                {{ Form::label('password') }}
            </td>
            <td>
                {{ Form::password('password') }}
            </td>
        </tr>

        <tr>
            <td>
                {{ Form::label('confirmar password') }}
            </td>
            <td>
                {{ Form::password('confirmar_password') }}
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

</div>
</body>
</html>