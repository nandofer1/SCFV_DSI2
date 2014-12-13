<div class="maintenancetools form">
<?php echo $this->Form->create('Maintenancetool'); ?>
	<fieldset>
		<legend><?php echo __('Agregar herramientas M.'); ?></legend>
	<?php
		echo $this->Form->input('herramienta');
		echo $this->Form->input('descripcion');
	?>
        <?php echo $this->Form->end(__('Submit')); ?>
	</fieldset>

</div>
