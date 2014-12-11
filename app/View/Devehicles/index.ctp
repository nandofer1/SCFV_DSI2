<h1 class="list-title">Vehiculos dados de baja</h1>
<div class="list-container">
  <div class="list-search">
    <form action="/Devehicles/find" id="VehiculoForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Devehicle][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Devehicle][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Devehicle.id" <?php echo $campo=="Devehicle.id"?" selected": "" ?>>Placa</option>
        <option value="Type.tipo" <?php echo $campo=="Type.tipo"?" selected": "" ?>>Tipo</option>        
        <option value="Brand.marca" <?php echo $campo=="Brand.marca"?" selected": "" ?>>Marca</option>
        <option value="Modell.modelo" <?php echo $campo=="Modell.modelo"?" selected": "" ?>>Modelo</option>
        <option value="Devehicle.color" <?php echo $campo=="Devehicle.color"?" selected": "" ?>>Color</option>
        <option value="Devehicle.tarjeta_circulacion" <?php echo $campo=="Devehicle.tarjeta_circulacion"?" selected": "" ?>>Tarjeta de Circulacion</option>
        <option value="Modell.tipo_combustible" <?php echo $campo=="Modell.tipo_combustible"?" selected": "" ?>>Combustible</option>
      </select> 
      <input  type="submit" value="Buscar"/>
    </form>
  </div>

  <table class="list">
    <tr>
        <th><?php echo $this->Paginator->sort('id','Placa')?></th>
        <th><?php echo $this->Paginator->sort('tipo','Tipo')?></th>
        <th><?php echo $this->Paginator->sort('marca','Marca')?></th>
        <th><?php echo $this->Paginator->sort('modelo','Modelo')?></th>
        <th><?php echo $this->Paginator->sort('anio','Año')?></th>
        <th><?php echo $this->Paginator->sort('color','Color')?></th>
        <th><?php echo $this->Paginator->sort('tarjeta_circulacion','Tarjeta de Circulacion')?></th>
        <th><?php echo $this->Paginator->sort('tipo_combustible','Combustible')?></th>
        <th colspan="1">Acciones</th>
    </tr>  
    
    <?php foreach ($Vehiculos as $Vehiculo):?>
    <tr>
      <td><?php echo $Vehiculo['Devehicle']['id'];?></td>
      <td><?php echo $Vehiculo['Type']['tipo'];?></td>
      <td><?php echo $Vehiculo['Brand']['marca'];?></td>
      <td><?php echo $Vehiculo['Modell']['modelo'];?></td>
      <td><?php echo $Vehiculo['Devehicle']['anio'];?></td>
      <td><?php echo $Vehiculo['Devehicle']['color'];?></td>
      <td><?php echo $Vehiculo['Devehicle']['tarjeta_circulacion'];?></td>      
      <td><?php echo $Vehiculo['Modell']['tipo_combustible'];?></td>
      <td><?php echo $this->Html->link('Ver',array('action'=>'ver',$Vehiculo['Devehicle']['id'])) ?> </td>
  </tr>
  <?php endforeach;?>
    
  <tr> 
    <!-- Cambiar el numero de columnas que cubre el colspan -->
    <td colspan="10" align="center" style="border: 0px"><?php echo $this->Html->link('Exportar Listado PDF',array('action'=>'pdf')); ?>
      <br><?php echo $this->Paginator->numbers(array('first' => 'First page'));  ?>
    </td>
  </tr>

</table>
</div>

<!--
<center>
  <p id="paginador">
  <?php echo $this->Paginator->counter(/*array('format'=>'Pagina {:page} de {:pages}, mostrando {:current} registros de {:count} ')*/)?> 
  </p>
  <div class="paging">
    <?php echo $this->Paginator->prev('Anterior',array(),null,array('class'=>'prev disabled')); ?>
    <?php echo $this->Paginator->numbers(array('separator'=>' ')) ?>
    <?php echo $this->Paginator->next('Siguiente',array(),null,array('class'=>'next disabled')); ?>
  </div>
  <?php echo $this->Html->image('iconoPDF.gif');
  ?>
</center>
-->
