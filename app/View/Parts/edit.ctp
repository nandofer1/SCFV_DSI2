<div class="parts form">
<?php echo $this->Form->create('Part'); ?>
	<fieldset>
		<legend><?php echo __('Edit Part'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('repuesto');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Part.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Part.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Parts'), array('action' => 'index')); ?></li>
	</ul>
</div>
