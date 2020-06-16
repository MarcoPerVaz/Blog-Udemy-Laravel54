
@extends('layout')

@section('content')
  <section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Página no autorizada</h1>
			<p>Regresar a <a href="{{ route('pages.home') }}">Inicio</a></p>
		</div>
	</section>
@endsection


{{-- Notas:
      | -------------------------------------------------------------------------
      | *Vista para sustituir al error 403 Forbidden o prohibido
      | *@extends('layout') Extiende de la vista resources\views\layout.blade.php
      | +route('pages.home') Las rutas se definen en routes\web.php
      | -------------------------------------------------------------------------
--}}