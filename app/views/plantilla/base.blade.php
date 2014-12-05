<!DOCTYPE html>
<html lang="es">
<head>
	<title>
		@section('titulo')
		@show
	</title>
		@yield('head')
		{{HTML::style('css/response.css');}}
	</head>
<body>

	<header>

		<section class="contenedor_logo">
			{{ HTML::link(URL::to('/'), '',array('id'=>'a_logo')) }}  
			<div id="logo">
				@yield('logo')
			</div>
		</section>
		<nav >
			@yield('navegacion')
		</nav>
			<div id="cerrar-session">
				{{ HTML::link(URL::to('logout'), 'Cerrar Session',array('id'=>'e')) }}
			</div>
	</header>
<div id="body">
	<div class="cuerpo">

		<section class="contenedor">
			{{ HTML::link(URL::to('perfil/personal'), '',array('id'=>'a_logo')) }}
			<div id="foto">
				@yield('perfil')
			</div>
		</section>

		<div class="fondo">
			<section class="contenedor">
				@yield('estado')
			</section>
		</div>

		<div class="fondo">
			<section class="contenedor">
				@yield('detalles')
			</section>
		<div class="fondo_interior">
			@yield('cuerpo_detalles')
		</div>
		</div>

	</div>

	<div id="body1">
		@yield('espacio_trabajo')
	</div>
	<footer>
	</footer>

    @yield('javascript')
</body>




</body>
</html>