<div class="parts index">
	<h2><?php echo __('Parts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('repuesto'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parts as $part): ?>
	<tr>
		<td><?php echo h($part['Part']['id']); ?>&nbsp;</td>
		<td><?php echo h($part['Part']['repuesto']); ?>&nbsp;</td>
		<td><?php echo h($part['Part']['descripcion']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $part['Part']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $part['Part']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $part['Part']['id']), array(), __('Are you sure you want to delete # %s?', $part['Part']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Part'), array('action' => 'add')); ?></li>
	</ul>
</div>
