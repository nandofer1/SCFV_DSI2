<div class="tools index">
	<h2><?php echo __('Tools'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('herramienta'); ?></th>
			<th><?php echo $this->Paginator->sort('existencia'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('valor'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tools as $tool): ?>
	<tr>
		<td><?php echo h($tool['Tool']['id']); ?>&nbsp;</td>
		<td><?php echo h($tool['Tool']['herramienta']); ?>&nbsp;</td>
		<td><?php echo h($tool['Tool']['existencia']); ?>&nbsp;</td>
		<td><?php echo h($tool['Tool']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($tool['Tool']['valor']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tool['Tool']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tool['Tool']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tool['Tool']['id']), array(), __('Are you sure you want to delete # %s?', $tool['Tool']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tool'), array('action' => 'add')); ?></li>
	</ul>
</div>
