<div class="stage-shelf stage-shelf-right hidden" id="sidebar">
  <ul class="nav nav-bordered nav-stacked flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#">NOTICIAS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="minimal/index.html">INDICADORES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bold/index.html">MISIÓN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bold/index.html">VISIÓN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="docs/index.html">DIRECTORIO</a>
    </li>
  </ul>
</div>

<div class="stage" id="stage">

  <div class="block block-inverse block-fill-height app-header"
       style="background-image: url(./public/img/startup-1.jpg);">

    <div class="container py-4 fixed-top app-navbar">
      <nav class="navbar navbar-transparent navbar-padded navbar-toggleable-sm">
        <a class="navbar-brand mr-auto" href="<?= base_url() ?>">
          <img src="<?= base_url('sources/img/SETAB_DORADO.png') ?>" alt="SETAB" class="img-fluid" style="max-height: 50px;">
        </a>

        <div class="hidden-sm-down text-uppercase">
          <ul class="navbar-nav">
            <?php if ( $elementos->noticias ): ?>
            <li class="nav-item px-1 ">
              <a class="nav-link" href="#noticias">NOTICIAS</a>
            </li>
          <?php endif ?>
            <?php if ( $elementos->indicadores ): ?>
            <li class="nav-item px-1 ">
              <a class="nav-link" href="#indicadores">INDICADORES</a>
            </li>
          <?php endif ?>
            <?php if ( $elementos->mision ): ?>
            <li class="nav-item px-1 ">
              <a class="nav-link" href="#mision">MISIÓN</a>
            </li>
          <?php endif ?>
            <?php if ( $elementos->vision ): ?>
            <li class="nav-item px-1 ">
              <a class="nav-link" href="#vision">VISIÓN</a>
            </li>
          <?php endif ?>
            <?php if ( $elementos->directorio ): ?>
            <li class="nav-item px-1 ">
              <a class="nav-link" href="#directorio">DIRECTORIO</a>
            </li>
          <?php endif ?>
          </ul>
        </div>
      </nav>
    </div>

    <div class="block-xs-middle pb-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-lg-6">
            <h1 class="text-white font-weight-bold"><?= $elementos->nombre ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Noticias -->
  <?php if ( $elementos->noticias ): ?>
  <div id="noticias" class="block block-secondary">
    <div class="container">
      <div class="row app-align-center">
      </div>
    </div>
  </div>
  <?php endif ?>
  <!-- /Noticias -->

  <!-- Indicadores -->
  <?php if ( $elementos->indicadores ): ?>
  <div id="indicadores" class="block block-secondary">
    <div class="container">
      <div class="row app-align-center">
      </div>
    </div>
  </div>
  <?php endif ?>
  <!-- /Indicadores -->

  <!-- Misión -->
  <?php if ( $elementos->mision ): ?>
  <div id="mision" class="block block-secondary">
    <div class="container">
      <div class="row app-align-center">
      </div>
    </div>
  </div>
  <?php endif ?>
  <!-- /Misión -->

  <!-- Visión -->
  <?php if ( $elementos->vision ): ?>
  <div id="vision" class="block block-secondary">
    <div class="container">
      <div class="row app-align-center">
      </div>
    </div>
  </div>
  <?php endif ?>
  <!-- /Visión -->

  <!-- Directorio -->
  <?php if ( is_object($elementos->directorio) ): ?>
  <div class="block block-secondary" style="padding: 3em">
    <div class="container text-xs-center">
      <div class="row mb-5">
        <div class="col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
          <h6 class="text-primary text-uppercase mb-2">DIRECTORIO</h6>
          <hr class="bg-primary">
        </div>
      </div>

      <?php foreach($elementos->directorio as $key => $directorio): ?>
      <div class="row justify-content-center">
        <div class="col-6 col-md-4 col-lg-3">
          <div class="card">

            <img class="card-img p-0" src="" alt="Nombre" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 400px;" />

            <div class="card-body">
              <h6 class="card-title text-primary font-weight-bold"><?= $directorio->nombre ?></h6>
              <p class="text-dark"><?= $directorio->cargo ?></p>
            </div>

            <div class="card-footer">
              <small><?= $directorio->contacto ?></small>
            </div>

          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
  <?php endif ?>
  <!-- /Directorio -->
</div>