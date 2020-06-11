
 <?php
  function setActiveRoute($name)
  {
    return request()->routeIs($name) ? 'active' : '';
  }


  /* 
    | ------------------------------------------------------------
    | *Agrega la clase active para activar los links de navegación
    | ------------------------------------------------------------
  */