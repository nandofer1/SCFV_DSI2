<div class="maintenancetools form">
<?php echo $this->Form->create('Maintenancetool'); ?>
	<fieldset>
		<legend><?php echo __('Edit Maintenancetool'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('herramienta');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Maintenancetool.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Maintenancetool.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Maintenancetools'), array('action' => 'index')); ?></li>
	</ul>
</div>
