<!-- Nav 
-------------------------------------------------->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">AppLili</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= (current_url(true)->getSegment(1) == '')?'active':''; ?>">
          <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?= (current_url(true)->getSegment(1) == 'usuarios')?'active':''; ?>">
          <a class="nav-link" href="/usuarios">Usuarios</a>
        </li>
        <li class="nav-item <?= (current_url(true)->getSegment(1) == 'calendario')?'active':''; ?>">
          <a class="nav-link" href="#">Calendario</a>
        </li>
        <li class="nav-item dropdown <?= (current_url(true)->getSegment(1) == 'actividades')?'active':''; ?>">
          <a class="nav-link dropdown-toggle" href="/actividades" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actividades
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">YMCA</a>
            <a class="dropdown-item" href="#">Regazo</a>
            <a class="dropdown-item" href="#">Secult</a>
            <div class="dropdown-divider"></div>
            <a href="/actividades/nueva" class="dropdown-item">Nueva</a>
          </div>
        </li>
        <li class="nav-item dropdown <?= (current_url(true)->getSegment(1) == 'usuario')?'active':''; ?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Perfil</a>
            <a class="dropdown-item" href="#">Tablero</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/cerrar-sesion">Cerrar sesión</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>