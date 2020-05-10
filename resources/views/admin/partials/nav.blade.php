
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
          <li {{ request()->is('admin/posts/create') ?  'class=active' : '' }}>
            <a href="{{ route('admin.posts.create') }}"><i class="fa fa-pencil"></i> Crear un post</a>
          </li>
        {{-- end create post --}}
      </ul>
    </li>
  {{-- end posts --}}
</ul>


{{-- Notas:
      | ----------------------------------------------------------------------------------------------------
      | *{{ request()->is('admin') ?  'class=active' : '' }} 
      |  *Si la url es '/admin' se coloca la clase 'active' de lo contrario no se le pone la clase
      | *{{ request()->is('admin/posts*')
      |   *'admin/posts*' Cualquier cosa después de 'posts' también mantendrá activo el menú
      | *El helper route('') permite especificar la ruta del enlace mediante el nombre de la ruta (name(''))
      | *Los nombres de las rutas se definen en routes\web.php
      | ----------------------------------------------------------------------------------------------------
--}}