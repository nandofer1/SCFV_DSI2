<div class="form">
<h1 class="list-title">Marcas de Vehiculos</h1>
<div class="list-container">
  <div class="list-search">
    <form action="../brands/buscar" id="UsuarioForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Brand][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Brand][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Brand.marca" <?php echo $campo=="Brand.marca"?" selected": "" ?>>Marca</option>
      </select> 
      <input  type="submit" value="Buscar"/>
    </form>
  </div>
  <table class="list">
    <tr>
      <th><?php echo $this->Paginator->sort('marca', 'Marca'); ?></th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
    </tr>

    <?php foreach ($Marcas as $Marca): ?>
    <tr>
      <td><?php echo $Marca['Brand']['marca']; ?></td>
 			<td width="1"> <?php echo $this->Form->postLink('Eliminar',array('action'=>'delete',$Marca['Brand']['id']),
             array('confirm'=>'Realmente Desea Eliminar esta marca de Vehículo?')
             ); ?></td>
      <td><a class="editar"   href="../brands/editar/<?php    echo $Marca['Brand']['id'] ?>">Editar</a></td>
    </tr>
    <?php 
      endforeach; 
      unset($Marca); 
    ?>
    
    <tr> 
      <!-- Cambiar el numero de columnas que cubre el colspan -->
      <td colspan="5" align="center" style="border: 0px"><?php echo $this->Paginator->numbers(array('first' => 'First page'));  ?></td>
    </tr>
  </table>
</div>
<script>
  $(document).on("click", ".eliminar", function(e) {
    var link = $(this).attr("href");
    e.preventDefault();
    bootbox.dialog({
    title: "Usuarios",
    message: "Esta seguro que desea eliminar el registro?",
    buttons: {
       aceptar: {
        label: "Aceptar",
        className: "btn-success",
        callback: function() {
          document.location.href = link;
        }
      },
      cancelar: {
        label: "Cancelar",
        className: "btn-primary",
        callback: function() {
        //No se necesita hacer nada
        }
      }
    }
    });
  });
</script>



<!--
<h1 class="list-title">Marcas de Vehiculos</h1>
<div class="list-container">
<table class="list">
    <tr>
        <td><b>Marca</b></td>
        <td>Acciones</td>
    </tr>  

    
    <?php

foreach ($Marcas as $Marca):?>
    
<tr>
 <td><?php echo $Marca['Brand']['marca'];?></td>
 <td width="1"><?php echo $this->Html->link('Editar',array('action'=>'edit',$Marca['Brand']['id']))    ?> </td>  

</tr>

<?php endforeach;?>
</table>
</div>
</div>
-->
