<div class="requests view">
<h2><?php echo __('Request'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($request['Request']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dossier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($request['Dossier']['vehicle_id'], array('controller' => 'dossiers', 'action' => 'view', $request['Dossier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($request['User']['id'], array('controller' => 'users', 'action' => 'view', $request['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Solicitud'); ?></dt>
		<dd>
			<?php echo h($request['Request']['fecha_solicitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Inicio'); ?></dt>
		<dd>
			<?php echo h($request['Request']['fecha_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Fin'); ?></dt>
		<dd>
			<?php echo h($request['Request']['fecha_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Inicio'); ?></dt>
		<dd>
			<?php echo h($request['Request']['hora_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora Fin'); ?></dt>
		<dd>
			<?php echo h($request['Request']['hora_fin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($request['Request']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aprobado'); ?></dt>
		<dd>
			<?php echo h($request['Request']['aprobado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anulado'); ?></dt>
		<dd>
			<?php echo h($request['Request']['anulado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Request'), array('action' => 'edit', $request['Request']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Request'), array('action' => 'delete', $request['Request']['id']), array(), __('Are you sure you want to delete # %s?', $request['Request']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Request'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Dossiers'), array('controller' => 'dossiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dossier'), array('controller' => 'dossiers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drivers'), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver'), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requestvouchers'), array('controller' => 'requestvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Drivers'); ?></h3>
	<?php if (!empty($request['Driver'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Request Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($request['Driver'] as $driver): ?>
		<tr>
			<td><?php echo $driver['id']; ?></td>
			<td><?php echo $driver['request_id']; ?></td>
			<td><?php echo $driver['employee_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'drivers', 'action' => 'view', $driver['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'drivers', 'action' => 'edit', $driver['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'drivers', 'action' => 'delete', $driver['id']), array(), __('Are you sure you want to delete # %s?', $driver['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Driver'), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Requestvouchers'); ?></h3>
	<?php if (!empty($request['Requestvoucher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fuelvoucher Id'); ?></th>
		<th><?php echo __('Request Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($request['Requestvoucher'] as $requestvoucher): ?>
		<tr>
			<td><?php echo $requestvoucher['id']; ?></td>
			<td><?php echo $requestvoucher['fuelvoucher_id']; ?></td>
			<td><?php echo $requestvoucher['request_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'requestvouchers', 'action' => 'view', $requestvoucher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'requestvouchers', 'action' => 'edit', $requestvoucher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'requestvouchers', 'action' => 'delete', $requestvoucher['id']), array(), __('Are you sure you want to delete # %s?', $requestvoucher['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
