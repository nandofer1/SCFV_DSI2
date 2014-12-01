<div class="fuelvouchers form">
<?php echo $this->Form->create('Fuelvoucher'); ?>
	<fieldset>
		<legend><?php echo __('Add Fuelvoucher'); ?></legend>
	<?php
		echo $this->Form->input('monto');
		echo $this->Form->input('fecha');
		echo $this->Form->input('tipo_combustible');
		echo $this->Form->input('galones');
		echo $this->Form->input('aceite');
		echo $this->Form->input('factura');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fuelvouchers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Requestvouchers'), array('controller' => 'requestvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vouchers'), array('controller' => 'vouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voucher'), array('controller' => 'vouchers', 'action' => 'add')); ?> </li>
	</ul>
</div>
