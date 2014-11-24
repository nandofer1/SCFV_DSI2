<h1 class="list-title">Empleados</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td>DUI</td>
        <td>Departamento al que Pertenece</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Dirección</td>
        <td>Correo</td>
        <td>Teléfono</td>
        <td>Acciones</td>
        
    </tr>  

    
    <?php


foreach ($Empleados as $Empleado):?>
    
<tr>
    <td><?php echo $Empleado['Employee']['id'];?></td>
    <td><?php echo $Empleado['Departament']['departamento'];?></td>
    <td><?php echo $Empleado['Employee']['nombre'];?></td>
    <td><?php echo $Empleado['Employee']['apellidos'];?></td>
    <td><?php echo $Empleado['Employee']['direccion'];?></td>
    <td><?php echo $Empleado['Employee']['correo'];?></td>
    <td><?php echo $Empleado['Employee']['telefono'];?></td>
     <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Empleado['Employee']['id']))    ?> </td>
     <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Empleado['Employee']['id']),
             array('confirm'=>'Realmente Desea Eliminar este Empleado?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
</div>
