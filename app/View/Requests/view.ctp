<?php $this->set('title_for_layout', 'Detalle solicitud'); ?>
<h1 class="list-title">Solicitud de préstamo de vehículo</h1>
<div class="list-container">
  <table class="list">
    <tr>
        <td>Solicitud N°: </td>
        <td><?php echo h($request['Request']['id']); ?></td>
    </tr>
    <tr>
        <td>Fecha de solicitud: </td>          	
        <td><?php echo h($request['Request']['fecha_solicitud']); ?></td>
    </tr>
    <tr>
        <td>Placa de vehículo: </td>     	
        <!--PARA SACAR LA PLACA DEL VEHICULO-->
        <td><?php echo $request['Dossier']['vehicle_id'];?></td>
    </tr>
    <tr>
        <td>Nombre solicitante: </td>
        <td><?php echo $request['Employee']['nombre'];?></td>
    </tr>
    <tr>
        <td>Unidad: </td>
        <td><?php echo $request['Unit']['unidad'];?></td>
    </tr>
    <tr>
        <td>Telefono: </td>
        <td><?php echo $request['Request']['telefono'];?></td>
    </tr>
    <tr>
        <td>Usuario solicitante: </td>
        <td><?php echo $this->Html->link($request['User']['username'], array('controller' => 'users', 'action' => 'ver', $request['User']['id'])); ?></td>
    </tr>
    <tr>
        <td>Desde el día: </td>       
        <td><?php echo h($request['Request']['fecha_inicio']); ?></td></tr>
    <tr>
        <td>Hasta el día: </td>         
        <td><?php echo h($request['Request']['fecha_fin']); ?></td></tr>
    <tr>
        <td>Hora inicio: </td>      
        <td><?php echo h($request['Request']['hora_inicio']); ?></td></tr>
    <tr>
        <td>Hora fin: </td>         
        <td><?php echo h($request['Request']['hora_fin']); ?></td></tr>
    <tr>
        <td>Descripción: </td>     
        <td><?php echo h($request['Request']['descripcion']); ?></td></tr>
    <tr>
        <td>Aprobado: </td>     
        <td><?php 
            if ($request['Request']['aprobado'] == 1){
                echo 'Aprobada';
            }elseif($request['Request']['aprobado'] == 2){
                echo 'Rechazada';
            }else{
                echo 'Pendiente';
            }
            ?>&nbsp;</td>
    </tr>
    <tr>
        <td>Anulado: </td>     
        <td><?php echo $request['Request']['anulado'] ? 'Anulada': '---'; ?>&nbsp;</td>    
    </tr>
    <?php unset($request); ?>
  </table>
</div>

<!--
<div class="related">
	<h3><?php echo __('Empleados: '); ?></h3>
	<?php if (!empty($request['Driver'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Request Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($request['Driver'] as $driver): ?>
		<tr>
			<td><?php echo $driver['id']; ?></td>
			<td><?php echo $driver['request_id']; ?></td>
			<td><?php echo $driver['employee_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'drivers', 'action' => 'view', $driver['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'drivers', 'action' => 'edit', $driver['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'drivers', 'action' => 'delete', $driver['id']), array(), __('Are you sure you want to delete # %s?', $driver['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php echo __('Vales de combustible: '); ?></h3>
	<?php if (!empty($request['Requestvoucher'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Fuelvoucher Id'); ?></th>
		<th><?php echo __('Request Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($request['Requestvoucher'] as $requestvoucher): ?>
		<tr>
			<td><?php echo $requestvoucher['id']; ?></td>
			<td><?php echo $requestvoucher['fuelvoucher_id']; ?></td>
			<td><?php echo $requestvoucher['request_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'requestvouchers', 'action' => 'view', $requestvoucher['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'requestvouchers', 'action' => 'edit', $requestvoucher['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'requestvouchers', 'action' => 'delete', $requestvoucher['id']), array(), __('Are you sure you want to delete # %s?', $requestvoucher['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Añadir vale de combustible'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>-->
