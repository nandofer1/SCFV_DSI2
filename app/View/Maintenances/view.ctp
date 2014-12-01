<div class="maintenances view">
<h2><?php echo __('Maintenance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maintenance['Maintenance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($maintenance['User']['username'], array('controller' => 'users', 'action' => 'view', $maintenance['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dossier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($maintenance['Dossier']['vehicle_id'], array('controller' => 'dossiers', 'action' => 'view', $maintenance['Dossier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upkeeptype Id'); ?></dt>
		<dd>
			<?php echo h($maintenance['Maintenance']['upkeeptype_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($maintenance['Maintenance']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Mantenimiento'); ?></dt>
		<dd>
			<?php echo h($maintenance['Maintenance']['fecha_mantenimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Solicitud'); ?></dt>
		<dd>
			<?php echo h($maintenance['Maintenance']['fecha_solicitud']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maintenance'), array('action' => 'edit', $maintenance['Maintenance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maintenance'), array('action' => 'delete', $maintenance['Maintenance']['id']), array(), __('Are you sure you want to delete # %s?', $maintenance['Maintenance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maintenances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maintenance'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Maintenancetoolsuseds'); ?></h3>
	<?php if (!empty($maintenance['Maintenancetoolsused'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maintenance Id'); ?></th>
		<th><?php echo __('Maintenancetool Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($maintenance['Maintenancetoolsused'] as $maintenancetoolsused): ?>
		<tr>
			<td><?php echo $maintenancetoolsused['id']; ?></td>
			<td><?php echo $maintenancetoolsused['maintenance_id']; ?></td>
			<td><?php echo $maintenancetoolsused['maintenancetool_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'maintenancetoolsuseds', 'action' => 'view', $maintenancetoolsused['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'maintenancetoolsuseds', 'action' => 'edit', $maintenancetoolsused['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'maintenancetoolsuseds', 'action' => 'delete', $maintenancetoolsused['id']), array(), __('Are you sure you want to delete # %s?', $maintenancetoolsused['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Maintenancetoolsused'), array('controller' => 'maintenancetoolsuseds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Partsuseds'); ?></h3>
	<?php if (!empty($maintenance['Partsused'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maintenance Id'); ?></th>
		<th><?php echo __('Part Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($maintenance['Partsused'] as $partsused): ?>
		<tr>
			<td><?php echo $partsused['id']; ?></td>
			<td><?php echo $partsused['maintenance_id']; ?></td>
			<td><?php echo $partsused['part_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'partsuseds', 'action' => 'view', $partsused['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'partsuseds', 'action' => 'edit', $partsused['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'partsuseds', 'action' => 'delete', $partsused['id']), array(), __('Are you sure you want to delete # %s?', $partsused['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Partsused'), array('controller' => 'partsuseds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
