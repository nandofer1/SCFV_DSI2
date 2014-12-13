<?php $this->set('title_for_layout', 'Agregar tipo de mantenimiento'); ?>
<div class="maintenancetypes form">
<?php echo $this->Form->create('Maintenancetype'); ?>
	<fieldset>
		<legend><?php echo __('Agregar tipo de mantenimiento'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
	?>
        <?php echo $this->Form->end(__('Submit')); ?>
	</fieldset>

</div>
