<h1 class="list-title">Vehiculos</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td>Unidad a la que Pertenece</td>
        <td>Nombre de la Gerencia</td>
        <td colspan="2">Acciones</td>
        
    </tr>  

    
    <?php

foreach ($Gerencias as $Gerencia):?>
    
<tr>
    <td><?php echo $Gerencia['Management']['unit_id'];?></td>
    <td><?php echo $Gerencia['Management']['gerencia'];?></td>
     <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Gerencia['Management']['id']))    ?> </td>
      <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Gerencia['Management']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta Gerencia?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
</div>