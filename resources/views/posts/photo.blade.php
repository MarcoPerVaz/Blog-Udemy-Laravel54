
<figure>
  {{-- image --}}
    <img src="{{ $post->photos->first()->url }}" 
       alt="Imagen: {{ $post->title }}" 
       class="img-responsive">
  {{-- end image --}}
</figure>


{{-- Notas:
      | -------------------------------------------------------------------------------------------------------
      | *$post->photos->first()->url De la relación photos() del modelo app\Post.php solo tomo la primer imagen  
      | -------------------------------------------------------------------------------------------------------
--}}