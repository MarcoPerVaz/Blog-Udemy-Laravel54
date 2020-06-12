
@extends('layout')

@section('content')
	<section class="posts container">

			@if (isset($title))
				<h3>{{ $title }}</h3>
			@endif

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
									<span class="c-gray-1">{{ $post->published_at->diffForHumans() }} / {{ $post->owner->name }}</span>
								</div>
								<div class="post-category">
									<span class="category text-capitalize">
									<a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
								</span>
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
										<span class="tag c-gris text-capitalize"><a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a></span>
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
			| ---------------------------------------------------------
			| *$post->owner->name
			|		*owner es la relación owner() en el modelo app\Post.php
			| ---------------------------------------------------------
--}}