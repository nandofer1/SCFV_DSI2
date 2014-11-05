<h1 class="list-title">Tipos de Vehículo</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td>Tipo</td>
        <td>Descripción</td>
        <td>Capacidad</td>
        <td colspan="2">Acciones</td>
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Tipos as $Tipo):?>
    
<tr>
    <td><?php echo $Tipo['Type']['tipo'];?></td>
     <td><?php echo $Tipo['Type']['descripcion'];?></td>  
      <td><?php echo $Tipo['Type']['capacidad'];?></td>  
      <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Tipo['Type']['id']))    ?> </td>
    <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Tipo['Type']['id']),
             array('confirm'=>'Realmente Desea Eliminar este Tipo de Vehículo?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
</div>