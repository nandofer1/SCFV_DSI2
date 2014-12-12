<?php $this->set('title_for_layout', 'Detalles viaje'); ?>
<h1 class="list-title">Viaje</h1>

<div class="list-container">
  <table class="list">
    <tr><td>Placa de Vehículo</td>           	        <td><?php echo $Viaje['Dossier']['vehicle_id']; ?></td></tr>
    <tr><td>Fecha de Inicio</td>     	        <td><?php echo $Viaje['Trip']['fecha_inicio']; ?></td></tr>
    <tr><td>Fecha de Regreso</td>
        <td><?php 
    if ($Viaje['Trip']['fuera']==1):
 
        echo 'No disponible';
        else:
         echo $Viaje['Trip']['fecha_fin'];
        endif;
     ?> </td></tr>
    
    
    <tr><td>Hora de salida</td>                  <td><?php echo $Viaje['Trip']['hora_inicio']; ?></td></tr>
    <tr><td>Hora de regreso</td>          	      
        <td><?php
        if ($Viaje['Trip']['fuera']==1):
 
        echo 'No disponible';
        else:
         echo $Viaje['Trip']['hora_fin']; 
        endif;
        
        ?></td></tr>
    <tr><td>Kilometraje Inicial</td> <td><?php echo $Viaje['Trip']['kilometraje_inicial']; ?></td></tr>
    <tr><td>Kilometraje Final</td>   
        <td><?php 
          if ($Viaje['Trip']['fuera']==1):
 
        echo 'No disponible';
        else:
         echo $Viaje['Trip']['kilometraje_final'];
        endif;
        
         ?></td></tr>
    <tr><td>Comentario de salida</td>                    <td><?php echo $Viaje['Trip']['comentario_salida']; ?></td></tr>
    <tr><td>Comentario de entrada</td>              
        
        <td><?php 
        if ($Viaje['Trip']['fuera']==1):
 
        echo 'No disponible';
        else:
         echo $Viaje['Trip']['comentario_entrada'];
        endif;
        ?></td></tr>
    <tr><td>Estado</td>                  <td><?php if ($Viaje['Trip']['fuera']==1):
 
        echo '<b><font color="green">En Progreso</font></b>';
        else:
        echo '<b><font color="red">Finalizado</font></b>';
        endif;
    ;?></td></tr>
    
    
    
    <tr><td><center>Herramientas Utilizadas</center></td>
    <td><center>Tripulantes de Viaje</center></td>  
  </tr>
  <tr><td><center>
  <?php

   foreach ($Herramientas as $Herramienta):
    echo $Herramienta['Tool']['herramienta'];
  echo'<br>';      
  endforeach;
  
    ?>
  </td></center>
  
  <td><center>
      
      <?php foreach ($Tripulantes as $Tripulante):
    echo $Tripulante['Employee']['nombre']." ".$Tripulante['Employee']['apellidos'];
      if($Tripulante['Crew']['motorista']==1):
          echo ' <b>(Motorista)</b>';
          
      endif;
  echo'<br>';      
  endforeach;
  
    ?>
      
  </center></td>
  </tr>
    

  </table>
    <center>
    <?php 
  
  if($Viaje['Trip']['fuera']==0):
      echo $this->Html->image('iconoPDF.gif');
      echo $this->Html->link('Exportar PDF',array('action'=>'pdf',$Viaje['Trip']['id'])); 
  endif;
    
    
    ?>
    <?php unset($Viaje);
    unset($Herramienta);?>
    </center>
</div>

