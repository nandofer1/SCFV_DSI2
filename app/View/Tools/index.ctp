<h1 class="list-title">Herramientas</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td>Herramienta</td>
        <td>Existencia</td>
        <td>Descripción</td>
        <td>Valor</td>
        <td colspan="2">Acciones</td>
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Herramientas as $Herramienta):?>
    
<tr>
    <td><?php echo $Herramienta['Tool']['herramienta'];?></td>
    <td><?php echo $Herramienta['Tool']['existencia'];?></td>
      <td><?php echo $Herramienta['Tool']['descripcion'];?></td>
       <td><?php echo'$'; echo $Herramienta['Tool']['valor'];?></td>
        <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Herramienta['Tool']['id']))    ?> </td>
         <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Herramienta['Tool']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta Herramienta?')
             ); ?></td>
</tr>

<?php endforeach;

?>
</table>
     <p id="paginador">
        <?php  echo $this->Paginator->counter(
                array('format'=>'Pagina {:page} de {:pages}, mostrando {:current} registros de {:count} ')
                
                )?> 
    </p>
    <div class="paging">
        <?php echo $this->Paginator->prev('Anterior',array(),null,array('class'=>'prev disabled')); ?>
        <?php echo $this->Paginator->numbers(array('separator'=>' ')) ?>
         <?php echo $this->Paginator->next('Siguiente',array(),null,array('class'=>'next disabled')); ?>
        
    </div>
</div>
