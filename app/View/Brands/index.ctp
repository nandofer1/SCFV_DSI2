<h1 class="list-title">Departamentos</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td><b>Marca</b></td>
        <td>Acciones</td>
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Marcas as $Marca):?>
    
<tr>
 <td><?php echo $Marca['Brand']['marca'];?></td>
 <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Marca['Brand']['id']))    ?> </td>  
 <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Marca['Brand']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta marca de Vehículo?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
</div>
