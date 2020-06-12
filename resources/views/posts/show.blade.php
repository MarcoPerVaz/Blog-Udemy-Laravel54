
@extends('layout')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
  <article class="post container">

    {{-- images --}}
      @if ($post->photos->count() === 1)
        <figure><img src="{{ url($post->photos->first()->url) }}" class="img-responsive"></figure>
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
        {{-- published date --}}
        <div class="date">
          	<span class="c-gris">{{ optional($post->published_at)->format('M d') }}</span>
        </div>
        {{-- end published date --}}

        {{-- category --}}
        @if ($post->category)
          <div class="post-category">
            <span class="category">{{ $post->category->name }}</span>
          </div>
        @endif
        {{-- end category --}}
      </header>

      <h1>{{ $post->title }}</h1>

      <div class="divider"></div>

      <div class="image-w-text">
        {!! $post->body !!}
      </div>

      <footer class="container-flex space-between">

        @include('partials.social-links', ['description' => $post->title])

        {{-- tags --}}
          <div class="tags container-flex">
            @foreach ($post->tags as $tag)
							<span class="tag c-gris">#{{ $tag->name }}</span>	
						@endforeach
          </div>
          {{-- end tags --}}
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
      | ------------------------------------------------------------------------------------------------------------------------------------------------------------
      | *Al momnento de querer ver un post individual desde el administrador o colocando la url manualmente en el navegador y el post no tiene fecha de publicación, 
      |  mostrará un error Call to a member function format() esto es debido a que se le quiere dar formato a una fecha nue no existe ya que no tiene fecha de 
      |  publicación, para solucionar esto se usar el helper optional() incluído en Laravel
      | *@if ($post->category) Verifica si el post tiene una categoría asignada
      | ------------------------------------------------------------------------------------------------------------------------------------------------------------
--}}