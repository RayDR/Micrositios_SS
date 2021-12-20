<?php $this->load->view('template/menu', (object)['elementos' => $elementos]); ?>

<div id="main-galery" class="carousel slide bg-filter" data-ride="carousel">
  <div class="carousel-inner">
    <?php if( $elementos->imagenes ): ?>
      <?php foreach ($elementos->imagenes as $key => $imagen): ?>
      <div class="carousel-item <?= ($key == 0)? 'active': '' ?>">
        <img src="<?= PUBLIC_URL ?><?= AREAS ?>/<?= array_key_exists('jsat_fname', $imagen)? ($imagen->jsat_fname) . '?token=' . TOKEN: '' ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/bgsetab.jpg') ?>'" class="img-fluid w-100" style="max-height: 100vh;" alt="<?= $elementos->nombre ?>">
        <!-- <div class="text-blur" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);"> -->
          <h1 style="position: absolute; top: 0%; lef background-color: transparent; color: transparent;"><?= $elementos->nombre ?></h1>
        <!-- </div> -->
      </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</div>

<!-- Noticias -->
<?php 
  // Auxiliares 
  $noticias = array();
  $_noticias = array();

  foreach ($elementos->noticias as $key => $noticia) {
    if ( count($_noticias) == 3 ){ // Separar registro de directores
      array_push($noticias, $_noticias);
      $noticias = [];
    }

    array_push($_noticias, array(
      'titulo'    => $noticia->titulo,
      'resumen'   => $noticia->resumen,
      'imagen'    => $noticia->attachment,
    ));

    if ( $key == count($elementos->directorio) -1 )
      array_push($noticias, $_noticias);
  }
?>
<?php if( $noticias ): ?>
  <div id="noticias" class="mb-0 py-0 container-fluid">
    <div id="cNoticias" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php foreach ($noticias as $key => $noticia): ?>
        <button type="button" data-bs-target="#cNoticias" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php endforeach ?>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php foreach ($noticias as $key => $noticia): ?>
                <?php if ( $key == 0 || $key % 3 == 0 ): ?>
                  <div class="row container m-auto">
                <?php endif ?>
                    <div class="col-10 col-md-4 mx-auto mb-1">
                      <div class="card my-1" style="max-height: 400px">
                        <img class="card-img" src="<?= PUBLIC_URL ?><?= NOTICIAS ?>/<?= $noticia->imagen ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/SETAB_COLOR.png') ?>'" alt="<?= $noticia->titulo ?>">
                        <div class="card-body px-1">
                          <h4 class="h5 h4-lg text-dark mb-1 stext-primary"><?= $noticia->titulo ?></h4>
                          <p class="d-none d-lg-block small text-dark"><?= $noticia->resumen ?></p>
                        </div>
                      </div>
                    </div>
                <?php if ( ($key+1) % 3 == 0 || $key == count($elementos->noticias) ): ?>
                  </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#cNoticias" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#cNoticias" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
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

<!-- DIRECTORIO -->
<?php if ( $elementos->directorio ): ?>
<div id="directorio" class="block block-secondary container container-lg-fluid" style="padding: 3em">
  <div class="container text-center">
    <div class="row mb-2">
      <div class="col-xs-10 col-sm-8 col-lg-6 text-center mx-auto">
        <h5 class="stext-primary text-uppercase mb-2">DIRECTORIO</h5>
        <hr class="border borde-secundario">
      </div>
    </div>
    <div class="row org-wrapper">
      <div class="organigrama">
        <ul>
          <li>
        <?php if ( count($elementos->directorio) > 0 ): ?>
          <?php $secretario = (object) array_shift($elementos->directorio); ?>
            <div class="user" style="width: 20rem;">
              <img loading="lazy" class="rounded img-fluid" src="<?= PUBLIC_URL ?><?= DIRECTORIO ?>/<?= $secretario->attachments->jsat_fname?>" alt="<?= $secretario->fullname ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'"/>
              <h5 class="name texto-secundario h1" style="max-width: 20rem;"><?= $secretario->fullname ?></h5>
              <h6 class="role" style="max-width: 20rem;"><?= $secretario->job_title ?></h6>
            </div>
            <ul>            
            <?php if ( count($elementos->directorio) > 1 ): ?>
              <?php $subsecretario = (object) array_shift($elementos->directorio); ?>
              <li>
                <div class="user" style="max-width: 15rem;">
                  <img loading="lazy" class="rounded img-fluid" src="<?= PUBLIC_URL ?><?= DIRECTORIO ?>/<?= $subsecretario->attachments->jsat_fname?>" alt="<?= $subsecretario->fullname ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'"/>
                  <h5 class="name texto-secundario h1" style="max-width: 15rem;"><?= $subsecretario->fullname ?></h5>
                  <h6 class="role" style="max-width: 15rem;"><?= $subsecretario->job_title ?></h6>
                </div>
                <ul>
                  <?php foreach ($elementos->directorio as $key => $director): ?>
                    <li class="mb-2">
                      <div class="user">
                        <img loading="lazy" class="rounded img-fluid" src="<?= PUBLIC_URL ?><?= DIRECTORIO ?>/<?= $director->attachments->jsat_fname?>" alt="<?= $director->fullname ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'"/>
                        <p class="name text-normal h1"><?= $director->fullname ?></p>
                        <p class="role"><?= $director->job_title ?></p>
                        <!-- <p class="manager"><?= $director->job_title ?></p> -->
                      </div>
                    </li>
                  <?php endforeach ?>
                </ul>
              </li>

            <?php endif; ?>
            </ul>        
        <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div> 
<?php endif ?>
<!-- /DIRECTORIO -->

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
  
  .carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
  }
  .carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
  }

</style>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    noticia
  });
</script>

<style type="text/css">
  .org-wrapper {
    /*background: #ccc;*/
  }

  .organigrama {
    display: flex;
    justify-content: center;
  }
  .organigrama ul {
    padding-top: 20px;
    position: relative;
    transition: all 0.5s;
  }
  .organigrama ul ul::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 1px solid #ccc;
    width: 0;
  }
  .organigrama li {
    float: left;
    text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 10px;
    transition: all 0.5s;
  }
  .organigrama li::before, .organigrama li::after {
    content: "";
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 1px solid #ccc;
    width: 50%;
    height: 20px;
  }
  .organigrama li::after {
    right: auto;
    left: 50%;
    border-left: 1px solid #ccc;
  }
  .organigrama li:only-child::after, .organigrama li:only-child::before {
    display: none;
  }
  .organigrama li:only-child {
    padding-top: 0;
  }
  .organigrama li:first-child::before, .organigrama li:last-child::after {
    border: 0 none;
  }
  .organigrama li:last-child::before {
    border-right: 1px solid #ccc;
    border-radius: 0 5px 0 0;
  }
  .organigrama li:first-child::after {
    border-radius: 5px 0 0 0;
  }
  .organigrama li .user {
    text-decoration: none;
    color: #666;
    display: inline-block;
    padding: 20px 10px;
    transition: all 0.5s;
    background: #fff;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  }
  .organigrama li .user:hover, .organigrama li .user:hover + ul li .user {
    background: #fcfbf9;
    color: #9d2449;
    transition: all 0.15s;
    transform: translateY(-5px);
    box-shadow: inset 0 0 0 3px #e4d7c5, 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
  }
  .organigrama li .user:hover img, .organigrama li .user:hover + ul li .user img {
    box-shadow: 0 0 0 5px #d4bea2;
  }
  .organigrama li .user:hover + ul li::after,
  .organigrama li .user:hover + ul li::before,
  .organigrama li .user:hover + ul::before,
  .organigrama li .user:hover + ul ul::before {
    border-color: #94a0b4;
  }
  .organigrama li .user > div, .organigrama li .user > a {
    font-size: 0.8rem;
  }
  .organigrama li .user img {
    margin: 0 auto;
    max-width: 60px;
    max-width: 60px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    box-shadow: 0 0 0 5px #aaa;
  }
  .organigrama li .user .name {
    color: var(--secundario-setab);
    font-size: 0.80rem;
    margin: 15px 0 0;
    font-weight: 300;
    max-width: 10rem;
  }
  .organigrama li .user .role {
    font-weight: 600;
    font-size: 0.80rem;
    margin-bottom: 10px;
    margin-top: 5px;
    max-width: 10rem;
  }
  .organigrama li .user .manager {
    font-size: 0.75px;
    color: #b21e04;
  }

</style>