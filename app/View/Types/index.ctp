<div class="form">
<h1 class="list-title">Tipos de Vehiculos</h1>
<div class="list-container">
  <div class="list-search">
    <form action="/types/buscar" id="UsuarioForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Type][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Type][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Type.tipo" <?php echo $campo=="Type.tipo"?" selected": "" ?>>Tipo</option>
        <option value="Type.descripcion" <?php echo $campo=="Type.descripcion"?" selected": "" ?>>Descripcion</option>
      </select> 
      <input  type="submit" value="Buscar"/>
    </form>
  </div>
  <table class="list">
    <tr class="th-header">
      <th><?php echo $this->Paginator->sort('tipo', 'Tipo'); ?></th>
      <th><?php echo $this->Paginator->sort('descripcion', 'Descripcion'); ?></th>
      <th><?php echo $this->Paginator->sort('capacidad', 'Capacidad'); ?></th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
    </tr>

    <?php foreach ($Tipos as $Tipo): ?>
    <tr>
      <td><?php echo $Tipo['Type']['tipo']; ?></td>
      <td><?php echo $Tipo['Type']['descripcion']; ?></td>
      <td><?php echo $Tipo['Type']['capacidad']; ?></td>

            <td width="1"> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Tipo['Type']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta tipo de Vehículo?')
             ); ?></td>
      <td><a class="editar"   href="/types/edit/<?php    echo $Tipo['Type']['id'] ?>">Editar</a></td>
    </tr>
    <?php 
      endforeach; 
      unset($Tipo); 
    ?>
    
    <tr> 
      <!-- Cambiar el numero de columnas que cubre el colspan -->
      <td colspan="5" align="center" style="border: 0px"><?php echo $this->Paginator->numbers(array('first' => 'First page'));  ?></td>
    </tr>
  </table>
</div>
