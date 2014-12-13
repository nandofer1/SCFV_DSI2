<?php $this->set('title_for_layout', 'Agregar repuestos'); ?>
<div class="parts form">
<?php echo $this->Form->create('Part'); ?>
	<fieldset>
		<legend><?php echo __('Agregar repuesto'); ?></legend>
	<?php
		echo $this->Form->input('repuesto');
		echo $this->Form->input('descripcion');
	?>
        <?php echo $this->Form->end(__('Submit')); ?>
	</fieldset>

</div>

