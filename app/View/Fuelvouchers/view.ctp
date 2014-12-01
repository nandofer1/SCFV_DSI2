<div class="fuelvouchers view">
<h2><?php echo __('Fuelvoucher'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Monto'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['monto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['fecha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Combustible'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['tipo_combustible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Galones'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['galones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aceite'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['aceite']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factura'); ?></dt>
		<dd>
			<?php echo h($fuelvoucher['Fuelvoucher']['factura']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fuelvoucher'), array('action' => 'edit', $fuelvoucher['Fuelvoucher']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fuelvoucher'), array('action' => 'delete', $fuelvoucher['Fuelvoucher']['id']), array(), __('Are you sure you want to delete # %s?', $fuelvoucher['Fuelvoucher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fuelvouchers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fuelvoucher'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requestvouchers'), array('controller' => 'requestvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vouchers'), array('controller' => 'vouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voucher'), array('controller' => 'vouchers', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Requestvouchers'); ?></h3>
	<?php if (!empty($fuelvoucher['Requestvoucher'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $fuelvoucher['Requestvoucher']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Fuelvoucher Id'); ?></dt>
		<dd>
	<?php echo $fuelvoucher['Requestvoucher']['fuelvoucher_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Request Id'); ?></dt>
		<dd>
	<?php echo $fuelvoucher['Requestvoucher']['request_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'edit', $fuelvoucher['Requestvoucher']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Vouchers'); ?></h3>
	<?php if (!empty($fuelvoucher['Voucher'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $fuelvoucher['Voucher']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Trip Id'); ?></dt>
		<dd>
	<?php echo $fuelvoucher['Voucher']['trip_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Fuelvoucher Id'); ?></dt>
		<dd>
	<?php echo $fuelvoucher['Voucher']['fuelvoucher_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Voucher'), array('controller' => 'vouchers', 'action' => 'edit', $fuelvoucher['Voucher']['id'])); ?></li>
			</ul>
		</div>
	</div>
	