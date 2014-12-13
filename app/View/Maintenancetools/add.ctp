<div class="maintenancetools form">
<?php echo $this->Form->create('Maintenancetool'); ?>
	<fieldset>
		<legend><?php echo __('Add Maintenancetool'); ?></legend>
	<?php
		echo $this->Form->input('herramienta');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Maintenancetools'), array('action' => 'index')); ?></li>
	</ul>
</div>
