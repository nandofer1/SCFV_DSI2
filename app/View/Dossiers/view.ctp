<div class="dossiers view">
<h2><?php echo __('Dossier'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vehicle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($dossier['Vehicle']['id'], array('controller' => 'vehicles', 'action' => 'view', $dossier['Vehicle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ingreso'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['fecha_ingreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kilometraje Actual'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['Kilometraje_actual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kilometraje'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['kilometraje']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Viajes'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['numero_viajes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Mantenimientos'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['numero_mantenimientos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Vales'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['numero_vales']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Ult Mant'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['fecha_ult_mant']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prestable'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['prestable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($dossier['Dossier']['observaciones']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dossier'), array('action' => 'edit', $dossier['Dossier']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dossier'), array('action' => 'delete', $dossier['Dossier']['id']), array(), __('Are you sure you want to delete # %s?', $dossier['Dossier']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dossiers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dossier'), array('action' => 'add')); ?> </li>
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
	<div class="related">
		<h3><?php echo __('Related Allocations'); ?></h3>
	<?php if (!empty($dossier['Allocation'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $dossier['Allocation']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Dossier Id'); ?></dt>
		<dd>
	<?php echo $dossier['Allocation']['dossier_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Employee Id'); ?></dt>
		<dd>
	<?php echo $dossier['Allocation']['employee_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Management Id'); ?></dt>
		<dd>
	<?php echo $dossier['Allocation']['management_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Allocation'), array('controller' => 'allocations', 'action' => 'edit', $dossier['Allocation']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Maintenances'); ?></h3>
	<?php if (!empty($dossier['Maintenance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Dossier Id'); ?></th>
		<th><?php echo __('Upkeeptype Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Fecha Mantenimiento'); ?></th>
		<th><?php echo __('Fecha Solicitud'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dossier['Maintenance'] as $maintenance): ?>
		<tr>
			<td><?php echo $maintenance['id']; ?></td>
			<td><?php echo $maintenance['user_id']; ?></td>
			<td><?php echo $maintenance['dossier_id']; ?></td>
			<td><?php echo $maintenance['upkeeptype_id']; ?></td>
			<td><?php echo $maintenance['descripcion']; ?></td>
			<td><?php echo $maintenance['fecha_mantenimiento']; ?></td>
			<td><?php echo $maintenance['fecha_solicitud']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'maintenances', 'action' => 'view', $maintenance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'maintenances', 'action' => 'edit', $maintenance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'maintenances', 'action' => 'delete', $maintenance['id']), array(), __('Are you sure you want to delete # %s?', $maintenance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Maintenance'), array('controller' => 'maintenances', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Requests'); ?></h3>
	<?php if (!empty($dossier['Request'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dossier Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Fecha Solicitud'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Hora Inicio'); ?></th>
		<th><?php echo __('Hora Fin'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Aprobado'); ?></th>
		<th><?php echo __('Anulado'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Driver Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dossier['Request'] as $request): ?>
		<tr>
			<td><?php echo $request['id']; ?></td>
			<td><?php echo $request['dossier_id']; ?></td>
			<td><?php echo $request['user_id']; ?></td>
			<td><?php echo $request['fecha_solicitud']; ?></td>
			<td><?php echo $request['fecha_inicio']; ?></td>
			<td><?php echo $request['fecha_fin']; ?></td>
			<td><?php echo $request['hora_inicio']; ?></td>
			<td><?php echo $request['hora_fin']; ?></td>
			<td><?php echo $request['descripcion']; ?></td>
			<td><?php echo $request['aprobado']; ?></td>
			<td><?php echo $request['anulado']; ?></td>
			<td><?php echo $request['employee_id']; ?></td>
			<td><?php echo $request['telefono']; ?></td>
			<td><?php echo $request['driver_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'requests', 'action' => 'view', $request['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'requests', 'action' => 'edit', $request['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'requests', 'action' => 'delete', $request['id']), array(), __('Are you sure you want to delete # %s?', $request['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Request'), array('controller' => 'requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trips'); ?></h3>
	<?php if (!empty($dossier['Trip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Dossier Id'); ?></th>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<th><?php echo __('Fecha Fin'); ?></th>
		<th><?php echo __('Hora Inicio'); ?></th>
		<th><?php echo __('Hora Fin'); ?></th>
		<th><?php echo __('Kilometraje Inicial'); ?></th>
		<th><?php echo __('Kilometraje Final'); ?></th>
		<th><?php echo __('Comentario Salida'); ?></th>
		<th><?php echo __('Comentario Entrada'); ?></th>
		<th><?php echo __('Rendimiento'); ?></th>
		<th><?php echo __('Fuera'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($dossier['Trip'] as $trip): ?>
		<tr>
			<td><?php echo $trip['id']; ?></td>
			<td><?php echo $trip['dossier_id']; ?></td>
			<td><?php echo $trip['fecha_inicio']; ?></td>
			<td><?php echo $trip['fecha_fin']; ?></td>
			<td><?php echo $trip['hora_inicio']; ?></td>
			<td><?php echo $trip['hora_fin']; ?></td>
			<td><?php echo $trip['kilometraje_inicial']; ?></td>
			<td><?php echo $trip['kilometraje_final']; ?></td>
			<td><?php echo $trip['comentario_salida']; ?></td>
			<td><?php echo $trip['comentario_entrada']; ?></td>
			<td><?php echo $trip['rendimiento']; ?></td>
			<td><?php echo $trip['fuera']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trips', 'action' => 'view', $trip['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trips', 'action' => 'edit', $trip['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trips', 'action' => 'delete', $trip['id']), array(), __('Are you sure you want to delete # %s?', $trip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trip'), array('controller' => 'trips', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
