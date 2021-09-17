<!DOCTYPE html>
<html lang="es">
<?php $this->load->view($template.'header'); ?>

<body>	
	<?php $this->load->view($view);?>

	<input type="hidden" id="base_url" value="<?=base_url()?>">

	<?php $this->load->view($template.'footer');?>
</body>
</html>
