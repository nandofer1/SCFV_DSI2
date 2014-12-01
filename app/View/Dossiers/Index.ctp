<div class="dossiers index">
	<h2><?php echo __('Dossiers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('vehicle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_ingreso'); ?></th>
			<th><?php echo $this->Paginator->sort('Kilometraje_actual'); ?></th>
			<th><?php echo $this->Paginator->sort('kilometraje'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_viajes'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_mantenimientos'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_vales'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_ult_mant'); ?></th>
			<th><?php echo $this->Paginator->sort('prestable'); ?></th>
			<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dossiers as $dossier): ?>
	<tr>
		<td><?php echo h($dossier['Dossier']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($dossier['Vehicle']['id'], array('controller' => 'vehicles', 'action' => 'view', $dossier['Vehicle']['id'])); ?>
		</td>
		<td><?php echo h($dossier['Dossier']['fecha_ingreso']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['Kilometraje_actual']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['kilometraje']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['numero_viajes']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['numero_mantenimientos']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['numero_vales']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['fecha_ult_mant']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['prestable']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['observaciones']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dossier['Dossier']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dossier['Dossier']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dossier['Dossier']['id']), array(), __('Are you sure you want to delete # %s?', $dossier['Dossier']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Dossier'), array('action' => 'add')); ?></li>
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
