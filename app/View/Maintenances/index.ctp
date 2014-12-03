<?php $this->set('title_for_layout', 'Mantenimientos'); ?>
<h1 class="list-title">Mantenimientos de vehículos</h1>
<div class="list-container">
    
<div class="list-search">
    <p></p>
<!--
    <form action="../dossiers/buscar" id="DossiersForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[User][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Request][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Vehicle.id" <?php echo $campo=="Vehicle.id"?" selected": "" ?>>Vehiculo</option>
        <option value="UserType.tipo_usuario" <?php echo $campo=="UserType.tipo_usuario"?" selected": "" ?>>Prestable</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
-->
  </div>
    
  <table class="list">
    <tr>
			<th><?php echo $this->Paginator->sort('id','N°'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id','Usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('dossier_id','Vehiculo'); ?></th>
			<th><?php echo $this->Paginator->sort('maintenance_id','Tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion','Descripción'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_mantenimiento'); ?></th>
<!--			<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>-->
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($maintenances as $maintenance): ?>
	<tr>
		<td><?php echo h($maintenance['Maintenance']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($maintenance['User']['username'], array('controller' => 'users', 'action' => 'ver', $maintenance['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($maintenance['Dossier']['vehicle_id'], array('controller' => 'dossiers', 'action' => 'view', $maintenance['Dossier']['id'])); ?>
		</td>
		<td><?php echo h($maintenance['Maintenance']['maintenancetype_id']); ?>&nbsp;</td>
		<td><?php echo h($maintenance['Maintenance']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($maintenance['Maintenance']['fecha_mantenimiento']); ?>&nbsp;</td>
<!--		<td><?php echo h($maintenance['Maintenance']['fecha_solicitud']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('Detalles'), array('action' => 'view', $maintenance['Maintenance']['id'])); ?> | 
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $maintenance['Maintenance']['id'])); ?>
<!--			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $maintenance['Maintenance']['id']), array(), __('Are you sure you want to delete # %s?', $maintenance['Maintenance']['id'])); ?>-->
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
