<h1>Viajes en Ejecución</h1>
<table>
    <tr>
        <td>Vehículo</td>
        <td>Descripción</td>
        <td>Fecha Inicio</td>
        <td>Número de Tripulantes</td>
        <td colspan="2">Acciones</td>
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Viajes as $Viaje):?>
    
<tr>
    <td><?php echo $Vehiculo['Vehicle']['id'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['modell_id'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['type_id'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['tarjeta_circulacion'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['fecha_tarjeta'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['anio'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['color'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['motor'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['chasisgrabado'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['chasisvin'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['tipo_gasolina'];?></td>
    <td>$<?php echo $Vehiculo['Vehicle']['costo'];?></td>
     <td><?php echo $this->Html->link('Ver Detalles',array('action'=>'look',$Vehiculo['Vehicle']['id']))    ?> </td>
    
     <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Vehiculo['Vehicle']['id']),
             array('confirm'=>'Realmente Desea Eliminar este Vehículo?')
             ); ?></td>
</tr>

<?php endforeach;?>
</table>
 