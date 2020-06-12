
@extends('layout')

@section('content')
  <section class="pages container">
		<div class="page page-about">
			<h1 class="text-capitalize">Página no encontrada</h1>
			<p>Regresar a <a href="{{ route('pages.home') }}">Inicio</a></p>
		</div>
	</section>
@endsection


{{-- Notas:
      | ------------------------------------------------------------------------------------------------------------------------------
      | *Esta vista es llamada cuando una página no es encontrada, tambien se referencia a tráves de la función show(Post $post) en el 
      |  controlador app\Http\Controllers\PostsController.php - abort(404)
      | ------------------------------------------------------------------------------------------------------------------------------
--}}