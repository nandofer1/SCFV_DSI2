<div class="requests form">
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Edit Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dossier_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('fecha_solicitud');
		echo $this->Form->input('fecha_inicio');
		echo $this->Form->input('fecha_fin');
		echo $this->Form->input('hora_inicio');
		echo $this->Form->input('hora_fin');
		echo $this->Form->input('descripcion');
		//echo $this->Form->input('aprobado');
		//echo $this->Form->input('anulado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

