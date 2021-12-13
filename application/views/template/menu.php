<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-primario">
    <div class="container">
        <a class="navbar-brand" href="https://tabasco.gob.mx/educacion">
            <b class="h4"><strong>tabasco</strong><strong class="fa fa-circle" style="font-size: 8px;" aria-hidden="true"></strong></b>gob.mx
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>">INICIO</a>
                    </li>               
                    <?php if ( $elementos->noticias ): ?>
                    <li class="nav-item">
                        <a class="nav-link texto-navegacion" href="#noticias">NOTICIAS</a>
                    </li>
                    <?php endif ?>
                    <?php if ( $elementos->mision ): ?>
                    <li class="nav-item">
                        <a class="nav-link texto-navegacion" href="#mision">MISIÓN</a>
                    </li>       
                    <?php endif ?>
                    <?php if ( $elementos->vision ): ?>
                    <li class="nav-item">
                        <a class="nav-link texto-navegacion" href="#vision">VISIÓN</a>
                    </li>
                    <?php endif ?>
                    <?php if ( $elementos->directorio ): ?>
                    <li class="nav-item">
                        <a class="nav-link texto-navegacion" href="#directorio">DIRECTORIO</a>
                    </li>
                    <?php endif ?> 
                    <?php if ( $elementos->indicadores ): ?>
                    <li class="nav-item">
                        <a class="nav-link texto-navegacion" href="#indicadores">INDICADORES</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</nav>