<?php $this->set('title_for_layout', 'Préstamos'); ?>

<h1 class="list-title">Solicitudes de prestamos</h1>
<div class="list-container">
  
    <!--
    <div class="list-search">
    <form action="../requests/buscar" id="RequestsForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[User][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Request][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="User.username" <?php echo $campo=="User.username"?" selected": "" ?>>Nombre</option>
        <option value="UserType.tipo_usuario" <?php echo $campo=="UserType.tipo_usuario"?" selected": "" ?>>Tipo de usuario</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
  </div>--><br /><br /><br />
    
    
  <table class="list">
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
<!--        <th><?php echo $this->Paginator->sort('user_id'); ?></th>-->
		<th><?php echo $this->Paginator->sort('fecha_solicitud'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_inicio'); ?></th>
		<th><?php echo $this->Paginator->sort('fecha_fin'); ?></th>
<!--
		<th><?php echo $this->Paginator->sort('hora_inicio'); ?></th>
		<th><?php echo $this->Paginator->sort('hora_fin'); ?></th>
-->
		<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
		<th><?php echo $this->Paginator->sort('aprobación'); ?></th>
		<th><?php echo $this->Paginator->sort('anulado'); ?></th>
		<th colspan="3" class="actions"><center><?php echo __('Acciones'); ?></center></th>
    </tr>

    <?php foreach ($requests as $request): ?>
	<tr>
		<td><?php echo h($request['Request']['id']); ?>&nbsp;</td>
<!--
		<td>
			<?php echo $this->Html->link($request['Dossier']['vehicle_id'], array('controller' => 'dossiers', 'action' => 'view', $request['Dossier']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($request['User']['id'], array('controller' => 'users', 'action' => 'view', $request['User']['id'])); ?>
		</td>
-->
		<td><?php echo h($request['Request']['fecha_solicitud']); ?>&nbsp;</td>
		<td><?php echo h($request['Request']['fecha_inicio']); ?>&nbsp;</td>
		<td><?php echo h($request['Request']['fecha_fin']); ?>&nbsp;</td>
<!--
		<td><?php echo h($request['Request']['hora_inicio']); ?>&nbsp;</td>
		<td><?php echo h($request['Request']['hora_fin']); ?>&nbsp;</td>
-->
		<td><?php echo h($request['Request']['descripcion']); ?>&nbsp;</td>
		<td><?php 
            if ($request['Request']['aprobado'] == 1){
                echo 'Aprobada';
            }elseif($request['Request']['aprobado'] == 2){
                echo 'Rechazada';
            }else{
                echo 'Pendiente';
            }
            ?>&nbsp;</td>
		<td><?php echo $request['Request']['anulado'] ? 'Anulada': '---'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver detalles'), array('action' => 'view', $request['Request']['id'])); ?></td>
        <td class="actions">
			<?php
            if ($request['Request']['anulado'] == 1){
                
            }else{
                echo $this->Html->link(__('Editar'), array('action' => 'edit', $request['Request']['id']));
            }
            ?></td>
            <td class="actions">
            <?php 
            if ($request['Request']['anulado'] == 1){
                
            }else{
                echo $this->Html->link(__('Gestionar'), array('action' => 'manage', $request['Request']['id']));
            }
            ?>
		</td>
	</tr>
<?php endforeach;
      unset($request); 
    ?>
    
    <tr> 
      <!-- Cambiar el numero de columnas que cubre el colspan -->
      <td colspan="5" align="center" style="border: 0px"><?php echo $this->Paginator->numbers(array('first' => 'First page'));  ?></td>
    </tr>
  </table>
</div>

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

<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Dossiers'), array('controller' => 'dossiers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dossier'), array('controller' => 'dossiers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Drivers'), array('controller' => 'drivers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Driver'), array('controller' => 'drivers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Requestvouchers'), array('controller' => 'requestvouchers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Requestvoucher'), array('controller' => 'requestvouchers', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
