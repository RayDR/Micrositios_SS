<script type="text/javascript">
  var jsonNoticias = <?= $elementos->imagenes ?>;
</script>

<style type="text/css">
  .texto-navegacion{
    color: white;
    text-shadow: 5px 0px 5px #555 !important;
  }
  .texto-encabezado{
    color:  #b38e5d !important;
    text-shadow: 5px 5px 5px #000 !important;
  }
</style>

<div class="stage" id="stage"></div>

<div class="container fixed-top app-navbar" style="padding: 0;">
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
</div>

<div id="main-galery" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php if( $elementos->imagenes ): ?>
      <?php foreach ($elementos->imagenes as $key => $imagen): ?>
      <div class="carousel-item <?= ($key == 0)? 'active': '' ?>">
        <img src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= AREAS ?>/<?= array_key_exists('jsat_fname', $imagen)? ($imagen->jsat_fname) . '?token=' . TOKEN: '' ?>" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/startup-3.jpg') ?>'" class="img-fluid w-100" style="max-height: 100vh;" alt="<?= $elementos->nombre ?>">
        <h1 class="texto-encabezado font-weight-bold" style="position: absolute; top: 50%; left: 40%; transform: translate(-50%, -50%);"><?= $elementos->nombre ?></h1>
      </div>
      <?php endforeach ?>
    <?php endif ?>
  </div>
</div>

<!-- Noticias -->
<?php if( $elementos->noticias ): ?>
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
                      <h4 class="h5 h4-lg text-dark mb-1 text-primary"><?= $noticia->titulo ?></h4>
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
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<" style="border-radius: 40px;"><i class="fas fa-chevron-left h1 text-primary"></i></button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">" style="border-radius: 40px;"><i class="fas fa-chevron-right h1 text-primary"></i></button>
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
    <h5 class="text-primary text-uppercase mb-2">MISIÓN</h5>
    <hr class="bg-primary">
    <p><?= $elementos->mision ?></p>
  </div>
  <?php endif ?>
  <!-- /Misión -->

  <!-- Visión -->
  <?php if ( $elementos->vision ): ?>
  <div id="vision" class="col-12 col-md-6">
    <h5 class="text-primary text-uppercase mb-2">VISIÓN</h5>
    <hr class="bg-primary">
    <p><?= $elementos->vision ?></p>
  </div>
  <?php endif ?>
  <!-- /Visión -->
  </div>
</div>

<!-- Directorio -->
<?php if ( $elementos->directorio ): ?>
<div id="directorio" class="block block-secondary" style="padding: 3em">
  <div class="container text-center">
    <div class="row mb-2">
      <div class="col-xs-10 col-sm-8 col-lg-6 text-center mx-auto">
        <h5 class="text-primary text-uppercase mb-2">DIRECTORIO</h5>
        <hr class="bg-primary">
      </div>
    </div>
    <!-- Personas -->
    <?php foreach( $elementos->directorio as $key => $directorio): ?>
      <?php if($key == 0): ?>
      <!-- Secretarío -->
      <div class="row justify-content-center mb-5">
        <div class="col-10 col-sm-8 col-md-6">
          <div class="card" style="border-width: 5px;">
            <img class="card-img p-0" src="https://webcore.setab.gob.mx/setab/private/upfiles/<?= DIRECTORIO ?>/<?php if ($directorio->attachments): ?><?= array_key_exists('jsat_fname', $directorio->attachments)? ($directorio->attachments->jsat_fname) . '?token=' . TOKEN : '' ?><?php endif ?>" alt="Nombre" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 400px; min-height: 200px;" />
            <div class="card-body my-3">
              <h6 class="card-title text-primary font-weight-bold"><?= $directorio->fullname ?></h6>
              <h6 class="font-weight-bold"><?= $directorio->job_title ?></h6>
            </div>
            <small><a href="tel:+52<?= $directorio->phone ?>"><?= $directorio->phone ?></a> - <?= $directorio->phone_ext ?></small>
          </div>
        </div>
      </div>
      <div class="row justify-content-center mb-2">
      <!-- Secretarío -->
      <?php else: ?>
      <div class="d-flex justify-content-center justify-content-md-stretch col-8 col-sm-6 col-md-4 col-lg-3 mb-2">
        <div class="card" style="border-width: 0px;">
          <img class="card-img rounded-circle px-2 px-sm-3 px-lg-2 px-xl-3" src="https://webcore.setab.gob.mx/setab/private/upfiles/persons/<?php if ($directorio->attachments): ?><?= array_key_exists('jsat_fname', $directorio->attachments)? ($directorio->attachments->jsat_fname) . '?token=' . TOKEN : '' ?><?php endif ?>" alt="Nombre" onerror="this.onerror=null; this.src = '<?= base_url('sources/img/favicon.png') ?>'" style="max-height: 220px;" />
          <div class="card-body my-3">
            <div class="px-1">
              <h6 class="card-title text-primary font-weight-bold"><?= $directorio->fullname ?></h6>
              <h6 class="font-weight-bold"><?= $directorio->job_title ?></h6>
            </div>
          </div>
          <small><a href="tel:+52<?= $directorio->phone ?>"><?= $directorio->phone ?></a> - <?= $directorio->phone_ext ?></small>
        </div>
      </div>
      <?php endif; ?>
    <?php endforeach ?> 
    <!-- Personas -->   
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

<script>
  new Glide('.glide').mount();
</script>
<!-- Código del mapa Indicadores -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://webcore.setab.gob.mx/microsite/maptabasco.js"></script>
<script>
  var points = [{"value":263,"code":"001","text":"PRIMARIA = 94<br>FORMACIÓN PARA EL TRABAJO = 3<br>SECUNDARIA = 56<br>SUPERIOR = 3<br>PREESCOLAR = 87<br>CAM = 2<br>MEDIA SUPERIOR = 18"},
    {"value":495,"code":"002","text":"CAM = 2<br>SUPERIOR = 7<br>PRIMARIA = 198<br>INICIAL = 3<br>MEDIA SUPERIOR = 28<br>FORMACIÓN PARA EL TRABAJO = 13<br>SECUNDARIA = 67<br>PREESCOLAR = 177"},
    {"value":361,"code":"003","text":"SUPERIOR = 4<br>MEDIA SUPERIOR = 16<br>PREESCOLAR = 130<br>FORMACIÓN PARA EL TRABAJO = 5<br>INICIAL = 23<br>CAM = 2<br>SECUNDARIA = 49<br>PRIMARIA = 132"},
    {"value":1140,"code":"004","text":"FORMACIÓN PARA EL TRABAJO = 44<br>CAM = 7<br>SUPERIOR = 68<br>PRIMARIA = 383<br>SECUNDARIA = 144<br>PREESCOLAR = 345<br>MEDIA SUPERIOR = 83<br>INICIAL = 66"},
    {"value":404,"code":"005","text":"MEDIA SUPERIOR = 19<br>PREESCOLAR = 162<br>SECUNDARIA = 53<br>CAM = 1<br>FORMACIÓN PARA EL TRABAJO = 10<br>SUPERIOR = 6<br>INICIAL = 2<br>PRIMARIA = 151"},
    {"value":322,"code":"006","text":"SECUNDARIA = 42<br>FORMACIÓN PARA EL TRABAJO = 2<br>PREESCOLAR = 136<br>MEDIA SUPERIOR = 12<br>SUPERIOR = 4<br>PRIMARIA = 123<br>CAM = 1<br>INICIAL = 2"},
    {"value":85,"code":"007","text":"SUPERIOR = 2<br>PRIMARIA = 30<br>CAM = 1<br>PREESCOLAR = 28<br>FORMACIÓN PARA EL TRABAJO = 6<br>MEDIA SUPERIOR = 7<br>SECUNDARIA = 11"},
    {"value":607,"code":"008","text":"CAM = 2<br>INICIAL = 1<br>PREESCOLAR = 223<br>MEDIA SUPERIOR = 33<br>SUPERIOR = 5<br>PRIMARIA = 241<br>FORMACIÓN PARA EL TRABAJO = 4<br>OTRO NIVEL EDUCATIVO = 1<br>SECUNDARIA = 97"},
    {"value":125,"code":"009","text":"PRIMARIA = 52<br>MEDIA SUPERIOR = 8<br>FORMACIÓN PARA EL TRABAJO = 2<br>SECUNDARIA = 15<br>INICIAL = 1<br>PREESCOLAR = 46<br>CAM = 1"},
    {"value":166,"code":"010","text":"INICIAL = 1<br>CAM = 1<br>MEDIA SUPERIOR = 9<br>FORMACIÓN PARA EL TRABAJO = 2<br>SECUNDARIA = 24<br>PRIMARIA = 61<br>SUPERIOR = 2<br>PREESCOLAR = 66"},
    {"value":205,"code":"011","text":"INICIAL = 2<br>SECUNDARIA = 28<br>PREESCOLAR = 75<br>PRIMARIA = 84<br>MEDIA SUPERIOR = 13<br>FORMACIÓN PARA EL TRABAJO = 2<br>CAM = 1"},
    {"value":560,"code":"012","text":"PRIMARIA = 219<br>INICIAL = 24<br>CAM = 1<br>SECUNDARIA = 80<br>MEDIA SUPERIOR = 25<br>SUPERIOR = 3<br>PREESCOLAR = 194<br>FORMACIÓN PARA EL TRABAJO = 14"},
    {"value":208,"code":"013","text":"FORMACIÓN PARA EL TRABAJO = 2<br>CAM = 1<br>SUPERIOR = 1<br>PRIMARIA = 69<br>INICIAL = 29<br>PREESCOLAR = 73<br>SECUNDARIA = 22<br>MEDIA SUPERIOR = 11"},
    {"value":171,"code":"014","text":"FORMACIÓN PARA EL TRABAJO = 5<br>CAM = 1<br>PREESCOLAR = 66<br>SECUNDARIA = 20<br>SUPERIOR = 3<br>MEDIA SUPERIOR = 15<br>PRIMARIA = 61"},
    {"value":244,"code":"015","text":"MEDIA SUPERIOR = 13<br>SECUNDARIA = 39<br>SUPERIOR = 1<br>PRIMARIA = 79<br>PREESCOLAR = 77<br>FORMACIÓN PARA EL TRABAJO = 1<br>INICIAL = 34"},
    {"value":135,"code":"016","text":"MEDIA SUPERIOR = 7<br>SECUNDARIA = 19<br>PREESCOLAR = 51<br>FORMACIÓN PARA EL TRABAJO = 3<br>SUPERIOR = 3<br>PRIMARIA = 51<br>CAM = 1"},
    {"value":257,"code":"017","text":"PRIMARIA = 106<br>SECUNDARIA = 38<br>PREESCOLAR = 95<br>FORMACIÓN PARA EL TRABAJO = 2<br>MEDIA SUPERIOR = 12<br>SUPERIOR = 2<br>CAM = 1<br>INICIAL = 1"}];
  var jsonaux;
  $(function () {
    $.ajax({
        url: "http://187.217.212.25/setabtest/api/pub/microsites/statics.jsp",
      })
      .then((data) => {
        points = data.data.map((e) => {
          //e.name="MUNICIPIO",
          e.value = 0;
          e.code = String(parseInt(e.cvemun)).padStart(3, "0");
          e.text = JSON.parse(e.json_agg)
          .map((k) => {
            e.value += k.total;
            return k.nivel + " = " + k.total;
        }).join("<br>");
          //e.text = JSON.parse(e.json_agg).map(k=>k.nivel+" = "+k.total).join("<br>");
          delete e.json_agg;
          delete e.cvemun;
          return e;
        });
      })
      .fail((err) => {
        console.log("err");
      })
      .always(() => {
        $("#mapa-indicadores")
        .slideDown()
        .highcharts("Map", {
        title: { text: "Tabasco" },
        mapNavigation: {
          enabled: true,
          buttonOptions: {
          verticalAlign: "bottom",
          },
        },
        colorAxis: {
          min: 1,
          max: 1000,
          type: "logarithmic",
          minColor: "#efecf3",
          maxColor: "#990041",
          // lineColor: 'green',
          lineWidth: 10,
        },

        tooltip: {
          headerFormat:
          '<span style="font-size:1.2em;font-weight:bold">{series.name}: {point.properties.NOM_MUN}</span><br/>',
          pointFormat:
          '<b><span style="font-size:0.9em;margin-top:1.5em">{point.text}</span></b><br/>',
          footerFormat:
          '<span style="font-size:0.7em;margin-top:1.5em">Fuente: SETAB 2021</span>',
        },
        series: [
        {
          data: points, //.data,
          mapData: map,
          joinBy: ["CVE_MUN", "code"],
          name: "Escuelas",
          states: {
            hover: {
              color: "#b38e5d",
            },
          },
          dataLabels: {
            enabled: true,
            format: "{point.properties.NOM_MUN}",
          },
        },
        ],
      });
    });
  });
</script>
<!-- /Código del mapa Indicadores -->

<!-- Seteo de imagenes -->
<script>
  $(document).ready(function() {
    $('#imagen-principal').css('background-image', `url(${url(jsonNoticias['1'])})`);
    $('#imagen-principal').css('background-repeat', 'no-repeat');
    $('#imagen-principal').css('background-size', 'cover');
    $('#imagen-vision').css('background-image', `url(${url(jsonNoticias['2'])})`);
    $('#imagen-vision').css('background-repeat', 'no-repeat');
    $('#imagen-vision').css('background-size', 'cover');
    $('#imagen-mision').css('background-image', `url(${url(jsonNoticias['3'])})`);
    $('#imagen-mision').css('background-repeat', 'no-repeat');
    $('#imagen-mision').css('background-size', 'cover');
  });
  function url(elemento){
    return `https://webcore.setab.gob.mx/static/areas/${elemento}`
  }
</script>
<!-- /Seteo de imagenes -->