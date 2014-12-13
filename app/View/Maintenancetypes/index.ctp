<?php $this->set('title_for_layout', 'Tipos de mantenimiento'); ?>
<div class="maintenancetypes index">
	<h2><?php echo __('Tipor de mantenimiento'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($maintenancetypes as $maintenancetype): ?>
	<tr>
		<td><?php echo h($maintenancetype['Maintenancetype']['id']); ?>&nbsp;</td>
		<td><?php echo h($maintenancetype['Maintenancetype']['tipo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $maintenancetype['Maintenancetype']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $maintenancetype['Maintenancetype']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $maintenancetype['Maintenancetype']['id']), array(), __('Are you sure you want to delete # %s?', $maintenancetype['Maintenancetype']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	     <p id="paginador">
        <?php  echo $this->Paginator->counter(
                array('format'=>'Pagina {:page} de {:pages}, mostrando {:current} registros de {:count} ')
                
                )?> 
    </p>
    <div class="paging">
        <?php echo $this->Paginator->prev('Anterior',array(),null,array('class'=>'prev disabled')); ?>
        <?php echo $this->Paginator->numbers(array('separator'=>' ')); ?>
         <?php echo $this->Paginator->next('Siguiente',array(),null,array('class'=>'next disabled')); ?>
        
    </div>
</div>
