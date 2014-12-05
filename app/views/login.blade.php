<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>Login</title>
    {{ HTML::style('style.css'); }}
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="danger">{{ Session::get('mensaje_error') }}</div>
<div id ="ima">
    <img src="img/logo.png" />
</div>
<section class="container">
    <div class="panel">
        <div class="panel-body">
            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
            @if(Session::has('mensaje_error'))

            @endif
            {{ Form::open(array('url' => 'login')) }}
            <div class="form-group">
                 {{ Form::text('correo', Input::old('correo'), array('class' => 'form-control')); }}
             </div>
             <div class="form-group">
                  {{ Form::password('password', array('class' => 'form-control')); }}
              </div>
            <div class="margen">
              <div class="checkbox">
                  <label>
                      {{ Form::checkbox('rememberme', true) }}
                      Recordar contraseña
                  </label>
              </div>
            <div class="enviar">
              {{ Form::submit('Ingresar', array('class' => 'btn btn-primary')) }}
              {{ Form::close() }}
            </div>
            </div>
          </div>
      </div>
  </section>
  <script src="https://code.jquery.com/jquery.js"></script>
  {{ HTML::script('js/bootstrap.js'); }}
  </body>
  </html>