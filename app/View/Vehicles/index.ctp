<h1 class="list-title">Vehiculos</h1>
<div class="list-container">
<div class="list-search">
    <form action="/Vehicles/find" id="VehiculoForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Vehicle][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Vehicle][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Vehicle.id" <?php echo $campo=="Vehicle.id"?" selected": "" ?>>Placa</option>
        <option value="Vehicle.tarjeta_circulacion" <?php echo $campo=="Vehicle.tarjeta_circulacion"?" selected": "" ?>>Tarjeta de Circulacion</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
  </div>    
<table class="list">
    <tr>
        <td><?php echo $this->Paginator->sort('id','placa')?></td>
        <td>Modelo</td>
        <td><?php echo $this->Paginator->sort('type_id','Tipo')?></td>
        <td>Tarjeta de Circulación</td>
        <td>Fecha Tarjeta</td>
        <td>año</td>
        <td>Color</td>
        <td>Motor</td>
        <td>Chasis Grabado</td>
        <td>Chasis Vin?</td>
        <td>Tipo Gasolina</td>
        <td>Costo</td>
        <td colspan="2">Acciones</td>
    </tr>  

    
    <?php
//Impresion recursiva
//print_r($Estudiantes);

foreach ($Vehiculos as $Vehiculo):?>
    
<tr>
    <td><?php echo $Vehiculo['Vehicle']['id'];?></td>
    <td><?php echo $Vehiculo['Modell']['modelo'];?></td>
    <td><?php echo $Vehiculo['Type']['tipo'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['tarjeta_circulacion'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['fecha_tarjeta'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['anio'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['color'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['motor'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['chasisgrabado'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['chasisvin'];?></td>
    <td><?php echo $Vehiculo['Vehicle']['tipo_gasolina'];?></td>
    <td>$<?php echo $Vehiculo['Vehicle']['costo'];?></td>
     <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Vehiculo['Vehicle']['id']))    ?> </td>
    
     <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Vehiculo['Vehicle']['id']),
             array('confirm'=>'Realmente Desea Eliminar este Vehículo?')
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
        <?php echo $this->Paginator->numbers(array('separator'=>' ')) ?>
         <?php echo $this->Paginator->next('Siguiente',array(),null,array('class'=>'next disabled')); ?>
        
    </div>
    <center>
     <?php echo $this->Html->image('iconoPDF.gif');
      echo $this->Html->link('Exportar Listado PDF',array('action'=>'pdf')); 
     
    ?>
    </center>
      </div>
 
