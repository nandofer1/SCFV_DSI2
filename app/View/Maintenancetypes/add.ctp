<div class="maintenancetypes form">
<?php echo $this->Form->create('Maintenancetype'); ?>
	<fieldset>
		<legend><?php echo __('Add Maintenancetype'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Maintenancetypes'), array('action' => 'index')); ?></li>
	</ul>
</div>
