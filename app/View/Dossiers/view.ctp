<?php $this->set('title_for_layout', 'Expediente de vehículo'); ?>
<div class="form">.
<h1 class="list-title">Expediente de Vehiculo</h1>
<div class="list-container">
  <table class="list">
      <tr><td>Id: </td><td><?php echo $dossier['Dossier']['id'];?></td></tr>
      <tr><td>Vehiculo: </td><td><?php echo $this->Html->link($dossier['Dossier']['vehicle_id'], array('controller' => 'vehicles', 'action' => 'ver', $dossier['Dossier']['vehicle_id']));?></td></tr>
      <tr><td>Fecha Ingreso: </td><td><?php echo $dossier['Dossier']['fecha_ingreso']; ?></td></tr>
      <tr><td>Kilometraje Actual: </td><td><?php echo $dossier['Dossier']['kilometraje'];?></td></tr>
      <tr><td>Kilometraje: </td><td><?php echo $dossier['Dossier']['kilometraje']?></td></tr>
      <tr><td>Numero Viajes: </td><td><?php echo $dossier['Dossier']['numero_viajes'];
     
      echo'<br><br>';
      echo'Ultimo Viaje Realizado:';
   echo $this->Html->link('Ver Detalles',array('controller'=>'Trips','action'=>'details',end ($Ultimo))) ;
      //echo end ($Ultimo);
     // echo $this->Html->link('Ver Detalles',array('action'=>'Trips/details',$Ultimo['Trip']['id']));
      ?></td></tr>
      <tr><td>Numero Mantenimientos: </td><td><?php echo $dossier['Dossier']['numero_mantenimientos'];?>
          </td></tr>
      <tr><td nowrap width="1" >Numero Vales: </td><td><?php echo $dossier['Dossier']['numero_vales'];
      echo '<br><br>';
       echo'Ultimo Vale Utilizado:';
   echo $this->Html->link('Ver Detalles',array('controller'=>'Fuelvouchers','action'=>'view', $UltimoV[0])) ;  
      
      ?></td></tr>
      <tr><td>Fecha Ult Mant.</td><td><?php echo $dossier['Dossier']['fecha_ult_mant']?></td></tr>
      <tr><td>Prestable: </td><td><?php echo $dossier['Dossier']['prestable']==false?"No":"Si"?></td></tr>      
      <tr><td>Observaciones</td><td><?php echo $dossier['Dossier']['observaciones'];?></td></tr>  
      <tr><td>Estado</td><td><?php 
      
      if($dossier['Dossier']['activo']==0):
          echo '<font color="red"><b>Se ha dado de Baja al Vehiculo</b></font>';
      else:
          echo '<font color="green"><b>Vehiculo Activo</b></font>';
          
      endif;
      ?></td></tr>  
      
       <tr><td>Rendimiento</td><td><?php 
      
       
       if($datos[0]!=0 && $datos[1]!=0):
            echo 'Numero de Galones Consumidos: '.$datos[0];
       echo '<br><br>';
       echo 'Total de Kilometros recorridos por Viaje: '.$datos[1];
       echo '<br><br>';
             $razon=($datos[1]/$datos[0]);
       $total=number_format((float)$razon, 2, '.', '');
       echo 'Rendimiento (Km / gal): <b> '. $total.' Km por cada galon consumido</b>'; 
      echo '<br><br>';
    $total=number_format((float)$datos[2], 2, '.', '');
     echo 'Inversion Total por Combustible: <b>$'.$total; 
           
           else :
           echo 'No hay Galones  Consumidos o viajes Realizados por este Vehiculo';
             
      
       
       endif;
      
       
       
       ?></td></tr>   
</table>
</div>
</div>
