<!-- Encabezados/Menú -->
<?php $this->load->view($template.'header'); ?>

<body>	
	<?php $this->load->view($view);?>

	<input type="hidden" id="base_url" value="<?=base_url()?>">

	<?php $this->load->view($template.'footer');?>
	<script type="text/javascript" src="<?=base_url('sources/js/utilerias.js')?>?<?= date('dmYHis') ?>"></script>
</body>
</html>
