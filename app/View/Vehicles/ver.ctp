<?php $this->set('title_for_layout', 'Vehículo'); ?>
<h1 class="list-title">Vehiculo</h1>
<div class="list-container">
  <table class="list">
      <tr><td>Placa: </td><td><?php echo $Vehiculo['Vehicle']['id'];?></td></tr>
      <tr><td>Tipo de Vehiculo: </td><td><?php echo $Vehiculo['Type']['tipo'];?></td></tr>
      <tr><td>Marca: </td><td><?php echo $Vehiculo['Brand']['marca'];?></td></tr>
      <tr><td>Modelo: </td><td><?php echo $Vehiculo['Modell']['modelo'];?></td></tr>
      <tr><td>Año: </td><td><?php echo $Vehiculo['Vehicle']['anio'];?></td></tr>
      <tr><td>Color: </td><td><?php echo $Vehiculo['Vehicle']['color'];?></td></tr>
      <tr><td>Tarjeta de Circulacion: </td><td><?php echo $Vehiculo['Vehicle']['tarjeta_circulacion'];?></td></tr>
      <tr><td nowrap width="1" >Fecha de Tarjeta de Circulacion: </td><td><?php echo $Vehiculo['Vehicle']['fecha_tarjeta'];?></td></tr>
      <tr><td>Tipo de Combustible</td><td><?php echo $Vehiculo['Modell']['tipo_combustible'];?></td></tr>
      <tr><td>Capacidad: </td><td><?php echo $Vehiculo['Type']['capacidad'];?></td></tr>      
      <tr><td>Motor</td><td><?php echo $Vehiculo['Vehicle']['motor'];?></td></tr>      
      <tr><td>Codigo de Chasis Gravado: </td><td><?php echo $Vehiculo['Vehicle']['chasisgrabado'];?></td></tr>      
      <tr><td>Codigo de Chasis VIN: </td><td><?php echo $Vehiculo['Vehicle']['chasisvin'];?></td></tr>      
      <tr><td>Costo</td><td>$<?php echo $Vehiculo['Vehicle']['costo'];?></td></tr>      
</table>
</div>
