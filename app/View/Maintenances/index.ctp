<div class="maintenances index">
	<h2><?php echo __('Maintenances'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dossier_id'); ?></th>
			<th><?php echo $this->Paginator->sort('upkeeptype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_mantenimiento'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($maintenances as $maintenance): ?>
	<tr>
		<td><?php echo h($maintenance['Maintenance']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($maintenance['User']['username'], array('controller' => 'users', 'action' => 'view', $maintenance['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($maintenance['Dossier']['vehicle_id'], array('controller' => 'dossiers', 'action' => 'view', $maintenance['Dossier']['id'])); ?>
		</td>
		<td><?php echo h($maintenance['Maintenance']['upkeeptype_id']); ?>&nbsp;</td>
		<td><?php echo h($maintenance['Maintenance']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($maintenance['Maintenance']['fecha_mantenimiento']); ?>&nbsp;</td>
		<td><?php echo h($maintenance['Maintenance']['fecha_solicitud']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $maintenance['Maintenance']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $maintenance['Maintenance']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $maintenance['Maintenance']['id']), array(), __('Are you sure you want to delete # %s?', $maintenance['Maintenance']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Maintenance'), array('action' => 'add')); ?></li>
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
