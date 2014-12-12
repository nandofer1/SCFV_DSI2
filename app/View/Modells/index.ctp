<?php $this->set('title_for_layout', 'Modelos de vehículos'); ?>
<div class="form">
<h1 class="list-title">Modelos de Vehiculos</h1>
<div class="list-container">
  <div class="list-search">
    <form action="/modells/buscar" id="UsuarioForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Modell][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Modell][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Modell.modelo" <?php echo $campo=="Modell.modelo"?" selected": "" ?>>Modelo</option>
      </select> 
      <input  type="submit" value="Buscar"/>
    </form>
  </div>
  <table class="list">
    <tr>
      <th><?php echo $this->Paginator->sort('modelo', 'Modelo'); ?></th>
      <th><?php echo $this->Paginator->sort('Brand.marca', 'Marca'); ?></th>      
      <th><?php echo $this->Paginator->sort('Type.tipo', 'Tipo'); ?></th>
      <th><?php echo $this->Paginator->sort('tipo_combustible', 'Combustible'); ?></th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
    </tr>

    <?php foreach ($Modelos as $Modelo): ?>
    <tr>
      <td><?php echo $Modelo['Modell']['modelo']; ?></td>
      <td><?php echo $Modelo['Brand']['marca']; ?></td>      
      <td><?php echo $Modelo['Type']['tipo']; ?></td>
      <td><?php echo $Modelo['Modell']['tipo_combustible']; ?></td>


            <td width="1"> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Modelo['Modell']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta modelo de vehículo?')
             ); ?></td>
      <td><a class="editar"   href="/modells/edit/<?php    echo $Modelo['Modell']['id'] ?>">Editar</a></td>
    </tr>
    <?php 
      endforeach; 
      unset($Modelo); 
    ?>
    
    <tr> 
      <!-- Cambiar el numero de columnas que cubre el colspan -->
      <td colspan="5" align="center" style="border: 0px"><?php echo $this->Paginator->numbers(array('first' => 'First page'));  ?></td>
    </tr>
  </table>
</div>
</div>

<!--

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
 <td><?php echo $Modelo['Brand']['marca'];?></td>
  <td><?php echo $this->Html->link('Editar',array('action'=>'edit',$Modelo['Modell']['id']))    ?> </td>
   <td> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Modelo['Modell']['id']),
             array('confirm'=>'Realmente Desea Eliminar este modelo de vehículo?')
             ); ?></td>
   
</tr>

<?php endforeach;?>
</table>
</div>
-->
