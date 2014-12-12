<?php $this->set('title_for_layout', 'Herramienta'); ?>
<div class="tools view">
<h2><?php echo __('Tool'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tool['Tool']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Herramienta'); ?></dt>
		<dd>
			<?php echo h($tool['Tool']['herramienta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Existencia'); ?></dt>
		<dd>
			<?php echo h($tool['Tool']['existencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tool['Tool']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor'); ?></dt>
		<dd>
			<?php echo h($tool['Tool']['valor']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tool'), array('action' => 'edit', $tool['Tool']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tool'), array('action' => 'delete', $tool['Tool']['id']), array(), __('Are you sure you want to delete # %s?', $tool['Tool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tool'), array('action' => 'add')); ?> </li>
	</ul>
</div>
