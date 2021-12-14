<?php $this->load->view('template/menu', (object)['elementos' => $elementos]); ?>

<div id="main-galery" class="carousel slide bg-filter" data-ride="carousel">
  <div class="carousel-inner">
    <?php if( $elementos->imagenes ): ?>
      <?php foreach ($elementos->imagenes as $key => $imagen): ?>
      <div class="carousel-item <?= ($key == 0)? 'active': '' ?>">
        <img src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= AREAS ?>/<?= array_key_exists('jsat_fname', $imagen)? ($imagen->jsat_fname) . '?token=' . TOKEN: '' ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/bgsetab.jpg') ?>'" class="img-fluid w-100" style="max-height: 100vh;" alt="<?= $elementos->nombre ?>">
        <div class="text-blur" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
          <h1 class="text-center" style="position: relative; "><?= $elementos->nombre ?></h1>
        </div>
      </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</div>

<!-- Noticias -->
<?php if( false ): ?>
  <div id="noticias" class="mb-0 py-0 container-fluid">
    <div class="row app-align-center">
      <div class="glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <?php foreach ($elementos->noticias as $key => $noticia): ?>
              <?php if ( $key == 0 || $key % 3 == 0 ): ?>
                <li class="glide__slide text-center m-auto">
                  <?php if ( $key % 3 == 0 ): ?>
                  <div class="row container m-auto">
                  <?php endif ?>
              <?php endif ?>
                <div class="col-10 col-md-4 mx-auto mb-1">
                  <div class="card my-1" style="max-height: 400px">
                    <img class="card-img" src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= NOTICIAS ?>/<?php if ($noticia->attachment): ?><?= array_key_exists('jsat_fname', $noticia->attachment)? ($noticia->attachment->jsat_fname) . '?token=' . TOKEN: '' ?><?php endif ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/SETAB_COLOR.png') ?>'" alt="<?= $noticia->titulo ?>">
                    <div class="card-body px-1" >
                      <h4 class="h5 h4-lg text-dark mb-1 stext-primary"><?= $noticia->titulo ?></h4>
                      <p class="d-none d-lg-block small text-dark"><?= $noticia->resumen ?></p>
                    </div>
                  </div>
                </div>
              <?php if ( ($key+1) % 3 == 0 || $key == count($elementos->noticias) ): ?>
                  </div>
                </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        </div>

        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<" style="border-radius: 40px;"><i class="fas fa-chevron-left h1 stext-primary"></i></button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">" style="border-radius: 40px;"><i class="fas fa-chevron-right h1 stext-primary"></i></button>
        </div>
      </div>
    </div>
  </div>
<?php else: ?>

  <div id="noticias" class="my-0 py-0 container-fluid py-53">
    <h3 class="text-center py-5 text-muted">No hay noticias para mostrar.</h3>
  </div>
<?php endif ?>
<!-- /Noticias -->


<!-- Misión -->
<div class="container py-2">
  <div class="row mt-3">
    <!-- Misión -->
  <?php if ( $elementos->mision ): ?>
  <div id="mision" class="col-12 col-md-6">    
    <h5 class="stext-primary text-uppercase mb-2">MISIÓN</h5>
    <hr class="border borde-secundario">
    <p><?= $elementos->mision ?></p>
  </div>
  <?php endif ?>
  <!-- /Misión -->

  <!-- Visión -->
  <?php if ( $elementos->vision ): ?>
  <div id="vision" class="col-12 col-md-6">
    <h5 class="stext-primary text-uppercase mb-2 text-end">VISIÓN</h5>
    <hr class="border borde-secundario">
    <p class="text-end"><?= $elementos->vision ?></p>
  </div>
  <?php endif ?>
  <!-- /Visión -->
  </div>
</div>

<!-- Directorio -->
<?php if ( $elementos->directorio ): ?>
<div id="directorio" class="block block-secondary container container-lg-fluid" style="padding: 3em">
  <div class="container text-center">
    <div class="row mb-2">
      <div class="col-xs-10 col-sm-8 col-lg-6 text-center mx-auto">
        <h5 class="stext-primary text-uppercase mb-2">DIRECTORIO</h5>
        <hr class="border borde-secundario">
      </div>
    </div>
    <!-- DIRECTORIO -->
    <?php foreach( $elementos->directorio as $key => $directorio): ?>
      <?php if($key == 0): ?>
      <!-- SECRETARIO -->
      <div class="row">
        <div class="col-12 col-sm-11 col-md-6 col-lg-5 col-xl-4 mx-auto">
          <div class="card border border-5 borde-primario" style="border-radius: 10px;">
            <img class="card-img-top border-bottom border-4 borde-primario" src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= DIRECTORIO ?>/<?php if ($directorio->attachments): ?><?= array_key_exists('jsat_fname', $directorio->attachments)? ($directorio->attachments->jsat_fname) . '?token=' . TOKEN : '' ?><?php endif ?>" alt="Nombre" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 400px; min-height: 200px;" />
            <div class="card-body py-2 my-3">
              <h6 class="card-title"><?= $directorio->fullname ?></h6>
              <h6 class="card-text font-weight-bold texto-secundario"><?= $directorio->job_title ?></h6>
              <small><a href="tel:+52<?= $directorio->phone ?>"><?= $directorio->phone ?></a> - <?= $directorio->phone_ext ?></small>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-4 mt-5 mb-3">
      <!-- SECRETARIO -->
      <?php else: ?>
      <div class="col-10 col-sm-8 col-md-4 col-lg-3 mx-auto">
        <div class="card p-2 borde-secundario">
          <img class="card-img rounded-circle border border-5 borde-secundario" src="https://webcore.setab.gob.mx/setab/private/upfiles/persons/<?php if ($directorio->attachments): ?><?= array_key_exists('jsat_fname', $directorio->attachments)? ($directorio->attachments->jsat_fname) . '?token=' . TOKEN : '' ?><?php endif ?>" alt="Nombre" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 280px;" />
          <div class="card-body py-2 mb-3">
            <h6 class="card-title"><?= $directorio->fullname ?></h6>
            <hr class="border borde-secundario my-0">
            <p class="font-weight-bold texto-secundario"><?= $directorio->job_title ?></p>
            <small><a href="tel:+52<?= $directorio->phone ?>"><?= $directorio->phone ?></a> <?php if ($directorio->phone_ext): ?> | Ext. <?= $directorio->phone_ext ?><?php endif; ?></small>
          </div>
        </div>
      </div>
      <?php endif; ?>
    <?php endforeach ?> 
    <!-- DIRECTORIO -->   
    </div>
  </div>
</div>
<?php endif ?>
<!-- /Directorio -->

<!-- Indicadores -->
<?php if ( $elementos->indicadores ): ?>
<div id="indicadores" class="container">
  <div id="mapa-indicadores" data-highcharts-chart="0" style="overflow: hidden;"></div>
</div>
<?php endif ?>
<!-- /Indicadores -->

<script src="<?= base_url('sources/lib/Glide/dist/glide.js') ?>" type="text/javascript"></script>
<link texto-navegacion rel="stylesheet" type="text/css" href="<?= base_url('sources/lib/Glide/dist/css/glide.core.min.css') ?>">
<link texto-navegacion rel="stylesheet" type="text/css" href="<?= base_url('sources/lib/Glide/dist/css/glide.theme.min.css') ?>">

<style type="text/css">
  html {
    scroll-behavior: smooth;
  }
</style>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
  });
</script>
