<?php $this->load->view($template.'menu_superior');?>

<div class="container">
	<div class="row my-2">
		<div class="col-12 jumbotron fondo-rojo mb-1">
			<h1 class="text-center text-white h1"><?= SISTEMA ?></h1>
		</div>
		<div class="col-md-7 col-lg-8 jumbotron fondo-dorado mb-1"></div>
		<div class="col-8 col-md-5 col-lg-4 mt-0">
			<div class="jumbotron mb-1 rounded-pill shadow-sm"></div>
			<div class="jumbotron my-1 rounded-pill shadow-sm"></div>
			<div class="jumbotron my-1 rounded-pill shadow-sm"></div>
		</div>
	</div>
</div>

<script src="<?= base_url('sources/js/index.js') ?>?<?= date('dmYHis') ?>"></script>