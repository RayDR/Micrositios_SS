<!DOCTYPE html>
<html lang="es">
	<head>
		<!-------------------- Declaración de METAS -------------------->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords" content="Gobierno del Estado de Tabasco,Secretaría de Educación" />
		<meta name="author" content="Raymundo Dominguez Ruiz - (+52) 993-170-0441" />
		<meta name="rights" content="Secretaría de Educación del Estado de Tabasco 2020 - <?= date('Y') ?> © - Todos los derechos reservados" />
		<meta name="description" content="Sistema Estatal de Registro de Profesiones - Secretaría de Educación Tabasco - Gobierno del Estado de Tabasco" />

		<link rel="icon" type="image/png" href="<?=base_url('sources/img/favicon.ico')?>" sizes="64x64">

		<title><?=$title?></title>

		<!-- Bootstrap Theme -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<!-- Fontawesome JS -->
		<script src="https://kit.fontawesome.com/8cca2ecc5a.js" crossorigin="anonymous"></script>

		<!-- Estilos personalizados -->
		<style type="text/css">

			:root{
				--primario-setab: #9d2449;
				--secundario-setab: #b38e5d;
			}
			a {
				text-decoration: none;
				cursor: pointer;
				color: var(--primario-setab);
			}
			a:hover, a:active, a:focus {
				color: var(--secundario-setab);
			}

			.link-inverted {
				text-decoration: none;
				cursor: pointer;
				color: var(--secundario-setab);
			}
			.link-inverted:hover, .link-inverted:active, .link-inverted:focus {
				color: var(--primario-setab);
			}

			h1,h2,h3,h4,h5,h6{
				color: var(--primario-setab);
				font-weight: 700;
			}

			.bg-primario {
				background-color: var(--primario-setab) !important;
				border-color: var(--primario-setab) !important;
			}

			.bg-secundario {
				background-color: var(--secundario-setab) !important;
				border-color: var(--secundario-setab) !important;
			}

			.heading-inverted{
				color: var(--secundario-setab);
			}

			.stext-primary{
				color: var(--primario-setab);10 
			}

			.bg-filter:before {
				content:'';
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				background-color: rgba(0,0,0,0.6);
			}

			.text-blur {
				position:relative;
				padding-top: 10px;
				padding-bottom: 10px;
			}
			.text-blur:before {
				content: "";
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				background-color: whitesmoke;
				border-radius: 10px;
				filter: blur(30px);
				z-index:0;
			}
			.text-blur h1, .text-blur h2, .text-blur h3, .text-blur p {
				position: relative;
				z-index: 1;
			}

			.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover{
				color: white;
				font-weight: bold;
			}

			.borde-primario {
				border-color: var(--primario-setab) !important;
			}

			.borde-secundario {
				border-color: var(--primario-setab) !important;
			}
		</style>

	</head>