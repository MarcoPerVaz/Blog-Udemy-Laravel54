
<div class="tags container-flex">
  @foreach ($post->tags as $tag)
    {{-- tags --}}
      <span class="tag c-gris text-capitalize"><a href="{{ route('tags.show', $tag) }}">#{{ $tag->name }}</a></span>
    {{-- end tags --}}
  @endforeach
</div>


{{-- Notas:
      | ------------------------------------------------------------------------------------
      | *$post->tags - tags es la relación tags() en el modelo app\Post.php
      | **El helper route() permite usar las rutas con nombre y se definen en routes\web.php
      | ------------------------------------------------------------------------------------
--}}