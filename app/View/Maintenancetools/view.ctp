<div class="maintenancetools view">
<h2><?php echo __('Maintenancetool'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maintenancetool['Maintenancetool']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Herramienta'); ?></dt>
		<dd>
			<?php echo h($maintenancetool['Maintenancetool']['herramienta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($maintenancetool['Maintenancetool']['descripcion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maintenancetool'), array('action' => 'edit', $maintenancetool['Maintenancetool']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maintenancetool'), array('action' => 'delete', $maintenancetool['Maintenancetool']['id']), array(), __('Are you sure you want to delete # %s?', $maintenancetool['Maintenancetool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maintenancetools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maintenancetool'), array('action' => 'add')); ?> </li>
	</ul>
</div>
