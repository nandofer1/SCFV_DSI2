<h1 class="list-title">Viajes de Camiones Recolectores</h1>
<div class="list-container">
    <div class="list-search">
    <form action="/Trips/find" id="ViajesForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Trip][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Trip][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Trip.fecha_inicio" <?php echo $campo=="Trip.id"?" selected": "" ?>>Fecha</option>
        <option value="Trip.id_dossier" <?php echo $campo=="Vehicle.id_dossier"?" selected": "" ?>>Placa</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
  </div>    
<table class="list">
    <tr>
        <td>Placa de Vehículo</td>
        <td>Fecha de Inicio</td>
        <td>Fecha de Regreso</td>
        <td>Hora de Inicio</td>
        <td>Hora de Regreso</td>
        <td>Km Inicial</td>
        <td>km Final</td>
        <td>Estado</td>
        <td colspan="4"><center>Acciones</center></td>
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Viajes as $Viaje):?>
    
<tr>
    
    <td><?php echo $Viaje['Trip']['dossier_id'];?></td>
    <td><?php echo $Viaje['Trip']['fecha_inicio'];?></td>
    <td><?php echo $Viaje['Trip']['fecha_fin'];?></td>
    <td><?php echo $Viaje['Trip']['hora_inicio'];?></td>
    <td><?php echo $Viaje['Trip']['hora_fin'];?></td>
    <td><?php echo $Viaje['Trip']['kilometraje_inicial'];?></td>
    <td><?php echo $Viaje['Trip']['kilometraje_final'];?></td>
    <td><?php if ($Viaje['Trip']['fuera']==0):
        
        echo'Finalizado';
    
    else:
        echo 'En Progreso';
    endif; 
        
        ?></td>
     <td><?php echo $this->Html->link('Ver Detalles',array('action'=>'look',$Viaje['Trip']['id']))    ?> </td>
     <td><?php echo $this->Html->link('Modificar',array('action'=>'mod',$Viaje['Trip']['id']))    ?> </td>
    <td><?php 
    if ($Viaje['Trip']['fuera']==0):
        
        echo'Sin Acción';
    
    else:
         echo $this->Html->link('Reportar Entrada',array('action'=>'edit',$Viaje['Trip']['id']));
    endif; 
       ?> </td>
     <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Viaje['Trip']['id']),
             array('confirm'=>'Realmente Desea Eliminar este Viaje?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
    
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
    
</div>
