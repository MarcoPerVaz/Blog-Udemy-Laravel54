
@extends('layout')

@section('content')
	<section class="posts container">

			@if (isset($title))
				<h3>{{ $title }}</h3>
			@endif

		{{-- posts --}}
			@foreach ($posts as $post)

				<article class="post">
					
					{{-- polimorfic view --}}
						@include( $post->viewType('home') )
					{{-- end polimorfic view --}}

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
			| ---------------------------------------------------------------------------------------------------------------------------------
			| *	@include( $post->viewType('home') ) Vista polimórfica y se encuentra en la función viewType($home = '') del modelo app\Post.php
			| ---------------------------------------------------------------------------------------------------------------------------------
--}}