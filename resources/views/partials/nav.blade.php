
{{-- navigation menu --}}
<nav class="custom-wrapper" id="menu">
  <div class="pure-menu"></div>
  <ul class="container-flex list-unstyled">

    {{-- home --}}
    <li>
      <a href="{{ route('pages.home') }}" 
      class="text-uppercase {{ setActiveRoute('pages.home') }}">Inicio</a>
    </li>
    {{-- end home --}}

    {{-- about --}}
    <li>
      <a href="{{ route('pages.about') }}" 
        class="text-uppercase {{ setActiveRoute('pages.about') }}">Nosotros</a>
    </li>
    {{-- end about --}}

    {{-- archive --}}
    <li>
      <a href="{{ route('pages.archive') }}" 
        class="text-uppercase {{ setActiveRoute('pages.archive') }}">Archivo</a>
    </li>
    {{-- end archive --}}

    {{-- contact --}}
    <li>
      <a href="{{ route('pages.contact') }}" 
        class="text-uppercase {{ setActiveRoute('pages.contact') }}">Contacto</a>
    </li>
    {{-- end contact --}}

  </ul>
</nav>
{{-- end navigation menu --}}


{{-- Notas:
      | ------------------------------------------------------------------------------------------------------------------------------------------
      | *Helper route() para usar rutas con nombre
      | *Los nombres de las rutas se definen en routes\web.php
      | *setActiveRoute('pages.home') Un helper creado para este proyecto para activar los links de navegación y que recibe como parámetro la ruta
      | ------------------------------------------------------------------------------------------------------------------------------------------
--}}