<?php $this->set('title_for_layout', 'Vales de combustible'); ?>
<h1 class="list-title">Vales de combustible</h1>
<div class="list-container">
  <div class="list-search">
    <form action="../requests/buscar" id="RequestsForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[User][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Request][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="User.username" <?php echo $campo=="User.username"?" selected": "" ?>>Fecha</option>
        <option value="UserType.tipo_usuario" <?php echo $campo=="UserType.tipo_usuario"?" selected": "" ?>>Tipo de usuario</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
  </div>
    
    
  <table class="list">
    <tr>
			<th><?php echo $this->Paginator->sort('factura','N° Factura'); ?></th>
			<th><?php echo $this->Paginator->sort('monto'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_combustible'); ?></th>
			<th><?php echo $this->Paginator->sort('galones','N° Galones'); ?></th>
			<th><?php echo $this->Paginator->sort('aceite'); ?></th>
		
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($fuelvouchers as $fuelvoucher): ?>
	<tr>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['factura']); ?>&nbsp;</td>
		<td><?php echo '$'.h($fuelvoucher['Fuelvoucher']['monto']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['fecha']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['tipo_combustible']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['galones']); ?>&nbsp;</td>
		<td><?php echo h($fuelvoucher['Fuelvoucher']['aceite']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Detalles'), array('action' => 'view', $fuelvoucher['Fuelvoucher']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $fuelvoucher['Fuelvoucher']['id'])); ?>
                        <?php echo $this->Html->link(__('Usar'), array('action' => 'Assign', $fuelvoucher['Fuelvoucher']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
//	echo $this->Paginator->counter(array(
//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
