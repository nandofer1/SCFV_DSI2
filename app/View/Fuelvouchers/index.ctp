<div class="fuelvouchers index">
	<h2><?php echo __('Fuelvouchers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_combustible'); ?></th>
			<th><?php echo $this->Paginator->sort('galones'); ?></th>
			<th><?php echo $this->Paginator->sort('aceite'); ?></th>
			<th><?php echo $this->Paginator->sort('factura'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($fuelvouchers as $fuelvoucher): ?>
	<tr>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['id']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['monto']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['tipo_combustible']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['galones']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['aceite']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['factura']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $fuelvoucher['Fuelvoucher']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $fuelvoucher['Fuelvoucher']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $fuelvoucher['Fuelvoucher']['id']), array(), __('Are you sure you want to delete # %s?', $fuelvoucher['Fuelvoucher']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Fuelvoucher'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Requestvouchers'), array('controller' => 'requestvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vouchers'), array('controller' => 'vouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voucher'), array('controller' => 'vouchers', 'action' => 'add')); ?> </li>
	</ul>
</div>
