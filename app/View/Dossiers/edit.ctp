<?php $this->set('title_for_layout', 'Editar expediente'); ?>
<div class="dossiers form">
<?php echo $this->Form->create('Dossier'); ?>
	<fieldset>
		<legend><?php echo __('Edit Dossier'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('vehicle_id');
		echo $this->Form->input('fecha_ingreso');
		echo $this->Form->input('Kilometraje_actual');
		echo $this->Form->input('kilometraje');
		echo $this->Form->input('numero_viajes');
		echo $this->Form->input('numero_mantenimientos');
		echo $this->Form->input('numero_vales');
		echo $this->Form->input('fecha_ult_mant');
		echo $this->Form->input('prestable');
		echo $this->Form->input('observaciones');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Dossier.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Dossier.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Dossiers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vehicles'), array('controller' => 'vehicles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vehicle'), array('controller' => 'vehicles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Allocations'), array('controller' => 'allocations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Allocation'), array('controller' => 'allocations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maintenances'), array('controller' => 'maintenances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maintenance'), array('controller' => 'maintenances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requests'), array('controller' => 'requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Request'), array('controller' => 'requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trips'), array('controller' => 'trips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trip'), array('controller' => 'trips', 'action' => 'add')); ?> </li>
	</ul>
</div>
