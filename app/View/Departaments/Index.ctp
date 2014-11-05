<h1 class="list-title">Departamentos</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td><b>Gerencia a la que pertenece</b></td>
        <td><b>Nombre del Departamento</b></td>
        <td><b>Descripción</b></td>
        <td colspan="2"><b>Acciones</b></td>
    
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Departamentos as $Departamento):?>
    
<tr>
    <td><?php echo $Departamento['Departament']['management_id'];?></td>
    <td><?php echo $Departamento['Departament']['departamento'];?></td>
    <td><?php echo $Departamento['Departament']['descripcion'];?></td>
     <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Departamento['Departament']['id']))    ?> </td>
      <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Departamento['Departament']['id']),
             array('confirm'=>'Realmente Desea Eliminar este Departamento?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
</div>