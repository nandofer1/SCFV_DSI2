<?php $this->set('title_for_layout', 'Expedientes de vehículos'); ?>
<div class="form">
<h1 class="list-title">Expedientes de vehículos</h1>
<div class="list-container">
  <div class="list-search">
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
  </div>
    
    
  <table class="list">
    <tr>
			<th><?php echo $this->Paginator->sort('vehicle_id', 'Placa'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_ingreso'); ?></th>
<!--			<th><?php echo $this->Paginator->sort('Kilometraje_actual'); ?></th>-->
			<th><?php echo $this->Paginator->sort('kilometraje'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_viajes','Número de viajes'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_mantenimientos', 'Mantenimientos'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_vales', 'Vales Combustible'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_ult_mant','Ultimo Mantenimiento'); ?></th>
			<th><?php echo $this->Paginator->sort('prestable','Préstable'); ?></th>
<!--			<th><?php echo $this->Paginator->sort('observaciones'); ?></th>-->
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($dossiers as $dossier): ?>
	<tr>
		<td><?php echo h($dossier['Vehicle']['id']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['fecha_ingreso']); ?>&nbsp;</td>
<!--		<td><?php echo h($dossier['Dossier']['Kilometraje_actual']); ?>&nbsp;</td>-->
		<td><?php echo h($dossier['Dossier']['kilometraje']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['numero_viajes']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['numero_mantenimientos']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['numero_vales']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['fecha_ult_mant']); ?>&nbsp;</td>
		<td><?php echo h($dossier['Dossier']['prestable']); ?>&nbsp;</td>
<!--		<td><?php echo h($dossier['Dossier']['observaciones']); ?>&nbsp;</td>-->
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $dossier['Dossier']['id'])); ?>
			<?php //echo $this->Html->link(__('Editar'), array('action' => 'edit', $dossier['Dossier']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}, mostrando {:current} registro de {:count} en total, comenzando en el registro {:start}, y terminando en {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
