<div class="tools form">
<?php echo $this->Form->create('Tool'); ?>
	<fieldset>
		<legend><?php echo __('Add Tool'); ?></legend>
	<?php
		echo $this->Form->input('herramienta');
		echo $this->Form->input('existencia');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('valor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tools'), array('action' => 'index')); ?></li>
	</ul>
</div>
