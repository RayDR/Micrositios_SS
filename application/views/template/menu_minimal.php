<nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
    <a class="navbar-brand mr-auto" href="https://tabasco.gob.mx/educacion">
      <img src="<?= base_url('sources/img/SETAB_DORADO.png') ?>" alt="SETAB" class="img-fluid" style="max-height: 50px;">
    </a>
    <div class="hidden-sm-down text-uppercase">
      <ul class="navbar-nav">
        <?php if ( $elementos->noticias ): ?>
        <li class="nav-item px-1 ">
          <a class="nav-link texto-navegacion" href="#noticias">NOTICIAS</a>
        </li>
        <?php endif ?>
        <?php if ( $elementos->mision ): ?>
        <li class="nav-item px-1 ">
          <a class="nav-link texto-navegacion" href="#mision">MISIÓN</a>
        </li>       
        <?php endif ?>
        <?php if ( $elementos->vision ): ?>
        <li class="nav-item px-1 ">
          <a class="nav-link texto-navegacion" href="#vision">VISIÓN</a>
        </li>
        <?php endif ?>
        <?php if ( $elementos->directorio ): ?>
        <li class="nav-item px-1 ">
          <a class="nav-link texto-navegacion" href="#directorio">DIRECTORIO</a>
        </li>
        <?php endif ?> 
        <?php if ( $elementos->indicadores ): ?>
        <li class="nav-item px-1 ">
          <a class="nav-link texto-navegacion" href="#indicadores">INDICADORES</a>
        </li>
        <?php endif ?>
      </ul>
    </div>
  </nav>