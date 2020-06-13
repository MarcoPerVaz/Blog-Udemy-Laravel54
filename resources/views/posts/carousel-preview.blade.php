
<div class="gallery-photos masonry">
  @foreach ($post->photos->take(4) as $photo)
    {{-- images --}}
      <figure class="gallery-image">
        @if ($loop->iteration === 4)
            <div class="overlay">{{ $post->photos->count() }} Fotos</div>
        @endif
        <img src="{{ url($photo->url) }}">
      </figure>
    {{-- end images --}}
  @endforeach
</div>


{{-- Notas:
      | -----------------------------------------------------------------------------------------------------------------------------------------
      | *@foreach ($post->photos->take(4) as $photo) Recorre la relación photos() del modelo app\Post.php pero solo obtiene 4 si existen más de 4
      | *$loop->iteration === 4 
      |   *La variable $loop viene por defecto en la directiva @foreach
      |   *Si el loop es igual a 4
      | *$post->photos->count() Cuenta las imágenes que existen en la relación photos() del modelo app\Post.php
      | -----------------------------------------------------------------------------------------------------------------------------------------
--}}