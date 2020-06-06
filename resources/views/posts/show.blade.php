
@extends('layout')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
  <article class="post container">

    {{-- images --}}
      @if ($post->photos->count() === 1)
        <figure><img src="{{ $post->photos->first()->url }}" class="img-responsive"></figure>
      @elseif($post->photos->count() > 1)
        @include('posts.carousel')
      @elseif($post->iframe)
      <div class="video">
        {!! $post->iframe !!}
      </div>
      @endif
    {{-- end images --}}

    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          	<span class="c-gris">{{ $post->published_at->format('M d') }}</span>
        </div>
        <div class="post-category">
          <span class="category">{{ $post->category->name }}</span>
        </div>
      </header>

      <h1>{{ $post->title }}</h1>

      <div class="divider"></div>

      <div class="image-w-text">
        {!! $post->body !!}
      </div>

      <footer class="container-flex space-between">

        @include('partials.social-links', ['description' => $post->title])

          <div class="tags container-flex">
            @foreach ($post->tags as $tag)
							<span class="tag c-gris">#{{ $tag->name }}</span>	
						@endforeach
          </div>
      </footer>

      <div class="comments">
        <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.disqus-script')                       
      </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('styles')
  {{-- Bootstrap CSS Customize 3.4 --}}
    <link rel="stylesheet" href="/css/twitter-bootstrap.css">
@endpush

@push('scripts')
  {{-- Disqus js --}}
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
  {{-- JQuery 3.2.1 --}}
    <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script>
  {{-- Bootstrap JS Customize 3.4 --}}
    <script src="/js/twitter-bootstrap.js"></script>
@endpush


{{-- Notas:
      | -----------------------------------------------------------------------------------------------------------------------------------
      | *{!! $post->iframe !!} Información no protegida contra ataques XSS
			| 	*Más información en Displaying Unescaped Data - https://laravel.com/docs/5.4/blade#displaying-data
      | -----------------------------------------------------------------------------------------------------------------------------------
--}}