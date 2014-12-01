<div class="maintenances form">
<?php echo $this->Form->create('Maintenance'); ?>
	<fieldset>
		<legend><?php echo __('Edit Maintenance'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('dossier_id');
		echo $this->Form->input('upkeeptype_id');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('fecha_mantenimiento');
		echo $this->Form->input('fecha_solicitud');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Maintenance.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Maintenance.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Maintenances'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dossiers'), array('controller' => 'dossiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dossier'), array('controller' => 'dossiers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maintenancetoolsuseds'), array('controller' => 'maintenancetoolsuseds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maintenancetoolsused'), array('controller' => 'maintenancetoolsuseds', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partsuseds'), array('controller' => 'partsuseds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partsused'), array('controller' => 'partsuseds', 'action' => 'add')); ?> </li>
	</ul>
</div>
