<h1 class="list-title">Unidades de Alcaldía</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td>Nombre de Unidad</td>
        <td>Descripción</td>
        <td colspan="2">Acciones</td>
    
        
        
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Unidades as $Unidad):?>
    
<tr>
    <td><?php echo $Unidad['Unit']['unidad'];?></td>
    <td><?php echo $Unidad['Unit']['descripcion'];?></td>
    <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Unidad['Unit']['id']))    ?> </td>
    <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Unidad['Unit']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta Unidad?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
    </div>