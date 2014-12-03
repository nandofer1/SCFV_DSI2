<?php $this->set('title_for_layout', 'Detalle mantenimiento'); ?>
<h1 class="list-title">Mantenimiento de vehículo</h1>
<div class="list-container">
  <table class="list">
    <tr><td>N° mantenimiento : </td><td><?php echo h($maintenance['Maintenance']['id']); ?></td></tr>
    <tr><td>Usuario solicitante: </td><td><?php echo $this->Html->link($maintenance['User']['username'], array('controller' => 'users', 'action' => 'ver', $maintenance['User']['id'])); ?></td></tr>
    <tr><td>Vehículo: </td><td><?php echo $this->Html->link($maintenance['Dossier']['vehicle_id'], array('controller' => 'dossiers', 'action' => 'view', $maintenance['Dossier']['id'])); ?></td></tr>
    <tr><td>Tipo de mantenimiento: </td><td><?php echo h($maintenance['Maintenance']['maintenancetype_id']); ?></td></tr>
    <tr><td>Descripción: </td><td><?php echo h($maintenance['Maintenance']['descripcion']); ?></td></tr>
    <tr><td>Fecha del mantenimiento: </td><td><?php echo h($maintenance['Maintenance']['fecha_mantenimiento']); ?></td></tr>
    <tr><td>Fecha de la solicitud: </td><td><?php echo h($maintenance['Maintenance']['fecha_solicitud']); ?></td></tr>
    <?php unset($maintenance); ?>
  </table>
</div>


<div class="related">
	<h3><?php echo __('Herramientas utilizadas'); ?></h3>
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
			<li><?php echo $this->Html->link(__('Agregar herramienta'), array('controller' => 'maintenancetoolsuseds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Repuestos utilizados'); ?></h3>
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
			<li><?php echo $this->Html->link(__('Agregar repuesto'), array('controller' => 'partsuseds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
