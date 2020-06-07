
@extends('layout')

@section('content')
	<section class="posts container">

		{{-- posts --}}
			@foreach ($posts as $post)

				<article class="post">
						{{-- images --}}
							@if ($post->photos->count() === 1)
								<figure><img src="{{ $post->photos->first()->url }}" class="img-responsive"></figure>
							@elseif($post->photos->count() > 1)
								<div class="gallery-photos masonry">
									@foreach ($post->photos->take(4) as $photo)
										<figure class="gallery-image">
											@if ($loop->iteration === 4)
													<div class="overlay">{{ $post->photos->count() }} Fotos</div>
											@endif
											<img src="{{ url($photo->url) }}">
										</figure>
									@endforeach
								</div>
						{{-- end images --}}

						{{-- video --}}
							@elseif($post->iframe)
								<div class="video">
									{!! $post->iframe !!}
								</div>
						{{-- end video --}}

								@endif

					<div class="content-post">
						{{-- header --}}
							<header class="container-flex space-between">
								<div class="date">
									<span class="c-gray-1">{{ $post->published_at->diffForHumans() }}</span>
								</div>
								<div class="post-category">
									<span class="category text-capitalize">{{ $post->category->name }}</span>
								</div>
							</header>
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
									<a href="blog/{{ $post->url }}" class="text-uppercase c-green">Leer más</a>
								</div>
								<div class="tags container-flex">

									@foreach ($post->tags as $tag)
										<span class="tag c-gray-1 text-capitalize">#{{ $tag->name }}</span>	
									@endforeach
									
								</div>
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
			| ----------------------------------------------------------------------------------------------------------------
			| *{{ $posts->links() }} Muestra la paginación que incluye por defecto Laravel y que proviene de la función home() 
			|	 del controlador app\Http\Controllers\PagesController.php
			| ----------------------------------------------------------------------------------------------------------------
--}}