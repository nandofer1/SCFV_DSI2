<div class="maintenancetypes view">
<h2><?php echo __('Maintenancetype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maintenancetype['Maintenancetype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($maintenancetype['Maintenancetype']['tipo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maintenancetype'), array('action' => 'edit', $maintenancetype['Maintenancetype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maintenancetype'), array('action' => 'delete', $maintenancetype['Maintenancetype']['id']), array(), __('Are you sure you want to delete # %s?', $maintenancetype['Maintenancetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maintenancetypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maintenancetype'), array('action' => 'add')); ?> </li>
	</ul>
</div>
