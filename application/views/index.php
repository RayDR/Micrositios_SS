<div class="stage-shelf stage-shelf-right hidden" id="sidebar">
  <ul class="nav nav-bordered nav-stacked flex-column">
    <li class="nav-item">
      <a class="nav-link" href="#noticias">NOTICIAS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#indicadores">INDICADORES</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#mision">MISIÓN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#vision">VISIÓN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#directorio">DIRECTORIO</a>
    </li>
  </ul>
</div>

<div class="stage" id="stage"></div>

<div class="block block-inverse block-fill-height app-header"
     style="background-image: url(<?= base_url('sources/img/') ?>);">

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
<?php if ( is_object($elementos->noticias) ): ?>
<div id="noticias" class="my-0 py-0 container-fluid">
  <div class="row app-align-center">
    <div class="glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <?php foreach ($elementos->noticias as $key => $noticia): ?>
          <li class="glide__slide text-center">
            <img class="img-fluid" src="<?= $noticia->imagen ?>" alt="<?= $noticia->titulo ?>">
            <div class="text-primary" style="background-color: rgba(157, 36, 73, 0.7);">
              <h3 class="text-white mb-0"><?= $noticia->titulo ?></h3>
              <h5 class="text-muted mb-3"><?= $noticia->subtitulo ?></h5>
              <p class="text-white"><?= $noticia->resumen ?></p>
            </div>
          </li>
          <?php endforeach ?>
        </ul>
      </div>

      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<" style="border-radius: 40px;"><i class="fas fa-chevron-left h1 text-primary"></i></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">" style="border-radius: 40px;"><i class="fas fa-chevron-right h1 text-primary"></i></button>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
<!-- /Noticias -->

<!-- Indicadores -->
<?php if ( $elementos->indicadores ): ?>
<div id="indicadores" class="">
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
        <div class="col-12 col-md-7 col-lg-6">
          
          <h5 class="text-primary text-uppercase mb-2">MISIÓN</h5>
          <hr class="bg-primary">
          <p><?= $elementos->mision ?></p>
        </div>
        <div class="col-md-5 col-lg-6 py-5"></div>
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
        <div class="col-md-5 col-lg-6py-5"></div>
        <div class="col-12 col-md-7 col-lg-6">
          <h5 class="text-primary text-uppercase mb-2">VISIÓN</h5>
          <hr class="bg-primary">
          <p><?= $elementos->vision ?></p>
        </div>
    </div>
  </div>
</div>
<?php endif ?>
<!-- /Visión -->

<!-- Directorio -->
<?php if ( is_object($elementos->directorio) ): ?>
<div id="directorio" class="block block-secondary" style="padding: 3em">
  <div class="container text-xs-center">
    <div class="row mb-5">
      <div class="col-xs-10 offset-xs-1 col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
        <h5 class="text-primary text-uppercase mb-2">DIRECTORIO</h5>
        <hr class="bg-primary">
      </div>
    </div>


    <div class="row justify-content-center">
    <?php foreach($elementos->directorio as $key => $directorio): ?>
      <?php if($key == 0): ?>
        <div class="col-12 mb-5">
          <div class="row d-flex justify-content-center align-items-center mx-auto">
      <?php endif; ?>
      <div class="col-6 col-md-4 col-lg-3">
        <div class="card">
          <img class="card-img p-0" src="https://tabasco.gob.mx/sites/default/files/styles/titular_dependencia/public/2020-01/FOTO%20SECRETARIA.jpg?itok=A4-Dii_O" alt="Nombre" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 400px;" />
          <div class="card-body my-3">
            <h6 class="card-title text-primary font-weight-bold"><?= $directorio->nombre ?></h6>
            <h6 class="font-weight-bold"><?= $directorio->cargo ?></h6>
          </div>
          <div class="card-footer">
            <small><?= $directorio->contacto ?></small>
          </div>
        </div>
      </div>
      <?php if ( $key == 0): ?>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach ?>    
    </div>
  </div>
</div>
<?php endif ?>
<!-- /Directorio -->

<script src="<?= base_url('sources/lib/Glide/dist/glide.js') ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('sources/lib/Glide/dist/css/glide.core.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('sources/lib/Glide/dist/css/glide.theme.min.css') ?>">

<style type="text/css">
  html {
    scroll-behavior: smooth;
  }
</style>

<script>
  new Glide('.glide').mount()
</script>