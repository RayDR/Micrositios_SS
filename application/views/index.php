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
                  <div class="row container m-auto">
                <?php endif ?>
                    <div class="col-10 col-md-4 mx-auto mb-1">
                      <div class="card my-1" style="max-height: 400px">
                        <img class="card-img" src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= NOTICIAS ?>/<?php if ($noticia->attachment): ?><?= array_key_exists('jsat_fname', $noticia->attachment)? ($noticia->attachment->jsat_fname) . '?token=' . TOKEN: '' ?><?php endif ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/SETAB_COLOR.png') ?>'" alt="<?= $noticia->titulo ?>">
                        <div class="card-body px-1">
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

<!-- DIRECTORIO -->

<?php 
  // Auxiliares 
  $secretario = array();
  $directores = array();
  $personal   = array();

  foreach ($elementos->directorio as $key => $persona) {
    if ( $persona->job_title == 'SECRETARIA DE EDUCACIÓN' || $persona->job_title == 'SECRETARIO DE EDUCACIÓN' || 
         $persona->job_title == 'SECRETARIA DE EDUCACION' || $persona->job_title == 'SECRETARIO DE EDUCACION' ){

      $secretario = (object) array(
        'nombre'    => $persona->fullname,
        'titulo'    => $persona->job_title,
        'telefono'  => $persona->phone,
        'extension' => $persona->phone_ext,
        'imagen'    => $persona->attachments->jsat_fname,
      );

    } else {
      if ( count($personal) == 3 ){ // Separar registro de directores
        array_push($directores, $personal);
        $personal = [];
      }

      array_push($personal, array(
        'nombre'    => $persona->fullname,
        'titulo'    => $persona->job_title,
        'telefono'  => $persona->phone,
        'extension' => $persona->phone_ext,
        'imagen'    => $persona->attachments->jsat_fname,
      ));
    }
  }
?>
<?php if ( $elementos->directorio ): ?>
<style type="text/css">
  .carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
  }
  .carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
  }

</style>

<div id="directorio" class="block block-secondary container container-lg-fluid" style="padding: 3em">
  <div class="container text-center">
    <div class="row mb-2">
      <div class="col-xs-10 col-sm-8 col-lg-6 text-center mx-auto">
        <h5 class="stext-primary text-uppercase mb-2">DIRECTORIO</h5>
        <hr class="border borde-secundario">
      </div>
    </div>
    <div class="row">
      <?php if ( $secretario): ?>
      <div class="col-md-6">
        <div class="card border-light" style="border-radius: 10px;">
          <div class="card-body py-2 my-3">
            <h5 class="card-title"><?= $secretario->nombre ?></h5>
            <h6 class="card-text font-weight-bold texto-secundario"><?= $secretario->titulo ?></h6>
          </div>
          <img loading="lazy" class="card-img-top border border-4 borde-primario rounded" src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= DIRECTORIO ?>/<?= $secretario->imagen . '?token=' . TOKEN  ?>" alt="<?= $secretario->nombre ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 400px; min-height: 200px;" />
        </div>
      </div>
      <?php endif; ?>
      <?php if ( $directores ): ?>
      <div class="col-md-6">        
        <div id="dDirectivos" class="carousel slide mt-lg-5" data-bs-ride="carousel">
          <div class="carousel-inner">
          <?php foreach ( (object) $directores as $key => $personas): ?>            
            <div class="carousel-item <?= ($key == 0)? 'active' : '' ?>" data-bs-interval="2500">
              <div class="row">
                <?php foreach ( $personas as $key => $persona): ?>
                  <div class="col-4 mx-auto">
                    <div class="card border borde-secundario" style="border-radius: 10px;">
                      <img loading="lazy" class="card-img-top border border-4 borde-primario rounded" src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= DIRECTORIO ?>/<?= $persona['imagen'] . '?token=' . TOKEN  ?>" alt="<?= $persona['nombre'] ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 400px; min-height: 200px;" />                     
                      <div class="card-body py-2 my-3 more">
                        <h5 class="card-title text-dark"><?= $persona['nombre'] ?></h5>
                        <div class="d-none">
                          <h6 class="card-text font-weight-bold texto-secundario"><?= $persona['titulo'] ?></h6>
                          <small><a href="tel:+52<?= $persona['telefono'] ?>"><?= $persona['telefono'] ?></a> - <?= $persona['extension'] ?></small>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
          <?php endforeach ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#dDirectivos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#dDirectivos" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <?php endif; ?>
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
</style>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    noticia
  });
</script>
