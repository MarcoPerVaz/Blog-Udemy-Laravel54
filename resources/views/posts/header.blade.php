
{{-- header --}}
  <header class="container-flex space-between">
    {{-- published date --}}
      <div class="date">
          <span class="c-gris">- {{ optional($post->published_at)->diffForHumans() }}</span>
      </div>
    {{-- end published date --}}
    @if ($post->category)
      {{-- category --}}
        <div class="post-category">
          <span class="category">
            <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>
          </span>
        </div>
      {{-- end category --}}
    @endif
  </header>
{{-- end header --}}


{{-- Notas:
      | -----------------------------------------------------------------------------------------------------
      | *optional($post->published_at)->diffForHumans()
      |   *Más información sobre la función optional() - https://laravel.com/docs/7.x/helpers#method-optional
      | *diffForHumans() Es una función de la librería Carbon que le da formato a la fecha
      |   *Ejemplo: Hace 2 días
      |   *Más información sobre Carbon - https://carbon.nesbot.com/docs/
      | *El helper route() permite usar las rutas con nombre y se definen en routes\web.php
      | *$post->category->name - category es la relación category() en el modelo app\Post.php
      | -----------------------------------------------------------------------------------------------------
--}}