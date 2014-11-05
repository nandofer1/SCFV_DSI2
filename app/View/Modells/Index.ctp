<h1 class="list-title">Vehiculos</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td><b>Modelo</b></td>
        <td><b>Marca</b></td>
        <td colspan="2">Acciones</td>
    </tr>  

    
    <?php
//Impresion recursiva


foreach ($Modelos as $Modelo):?>
    
<tr>
 <td><?php echo $Modelo['Modell']['modelo'];?></td>   
 <td><?php echo $Modelo['Modell']['brand_id'];?></td>
  <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Modelo['Modell']['id']))    ?> </td>
   <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Modelo['Modell']['id']),
             array('confirm'=>'Realmente Desea Eliminar este modelo de vehículo?')
             ); ?></td>
   
</tr>

<?php endforeach;?>
</table>
</div>