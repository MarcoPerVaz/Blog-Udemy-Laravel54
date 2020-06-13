
@extends('layout')

@section('content')
	<section class="posts container">

			@if (isset($title))
				<h3>{{ $title }}</h3>
			@endif

		{{-- posts --}}
			@foreach ($posts as $post)

				<article class="post">
					@if ($post->photos->count() === 1)
							{{-- images --}}
								@include('posts.photo')
							{{-- images --}}
					@elseif($post->photos->count() > 1)
							@include('posts.carousel-preview')

					@elseif($post->iframe)
							{{-- iframe --}}
								@include('posts.iframe')
							{{-- end iframe --}}

					@endif

					<div class="content-post">
						{{-- header --}}
							@include('posts.header')
						{{-- end header --}}

						{{-- title --}}
							<h1>{{ $post->title }}</h1>
						{{-- end title --}}
						
						<div class="divider"></div>

						{{-- excerpt --}}
							<p>{{ $post->excerpt }}</p>
						{{-- end excerpt --}}

						{{-- footer --}}
							<footer class="container-flex space-between">
								<div class="read-more">
									<a href="{{ route('posts.show', $post) }}" class="text-uppercase c-green">Leer más</a>
								</div>
								{{-- tags --}}
								@include('posts.tags')
								{{-- end tags --}}
							</footer>
						{{-- end footer --}}
					</div>
				</article>

			@endforeach
		{{-- end posts --}}

	</section>

	{{-- pagination --}}
		{{ $posts->links() }}
	{{-- end pagination --}}
@endsection



{{-- Notas:
			| -----------------------------------------------------------------------------------------------------
			| *@include('posts.photo') Incluye la vista resources\views\posts\photo.blade.php
			| *@include('posts.carousel-preview') Incluye la vista resources\views\posts\carousel-preview.blade.php
			| *@include('posts.iframe') Incluye la vista resources\views\posts\iframe.blade.php
			| *@include('posts.header') Incluye la vista resources\views\posts\header.blade.php
			| *El helper route() permite usar las rutas con nombre y se definen en routes\web.php
			| *@include('posts.tags') Incluye la vista resources\views\posts\tags.blade.php
			| -----------------------------------------------------------------------------------------------------
--}}