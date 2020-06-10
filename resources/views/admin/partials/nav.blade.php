
<ul class="sidebar-menu">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li {{ request()->is('admin') ?  'class=active' : '' }}>
    <a href="{{ route('dashboard') }}">
      <i class="fa fa-dashboard"></i> <span>Inicio</span>
    </a>
  </li>
  {{-- posts --}}
    <li class="treeview {{ request()->is('admin/posts*') ?  'active' : '' }}">
      <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        {{-- show posts --}}
          <li {{ request()->is('admin/posts') ?  'class=active' : '' }}>
            <a href="{{ route('admin.posts.index') }}"><i class="fa fa-eye"></i> Ver todos los posts</a>
          </li>
        {{-- end show posts --}}

        {{-- create post --}}
          <li>
            @if (request()->is('admin/posts/*'))
              <a href="{{ route('admin.posts.index', '#create') }}"><i class="fa fa-pencil"></i> Crear un post</a> 
            @else
              <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i> Crear un post</a> 
            @endif
          </li>
        {{-- end create post --}}
      </ul>
    </li>
  {{-- end posts --}}
</ul>


{{-- Notas:
      | --------------------------------------------------------------------------------------------------------------------------------------------
      | *@if (request()->is('admin/posts/*')) Verifica si la url es 'admin/posts/algunaOtraCosa' le agrega '#create' a la url y muestra el modal, de
      |  lo contrario quita el '#create' de la url y cierra el modal
      | --------------------------------------------------------------------------------------------------------------------------------------------
--}}