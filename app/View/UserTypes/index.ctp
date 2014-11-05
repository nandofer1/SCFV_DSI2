<h1 class="list-title">Tipos de Usuario</h1>
<div class="list-container">
  <div class="list-search">
    <form action="/SCFV_DSI2/UserTypes/buscar" id="UsuarioForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[UserType][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[UserType][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="UserType.tipo_usuario" <?php echo $campo=="UserType.tipo_usuario"?" selected": "" ?>>Tipo</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
  </div>
  <table class="list">
    <tr>
      <th style="width: 1px;"><?php echo $this->Paginator->sort('id'); ?></th>
      <th><?php echo $this->Paginator->sort('tipo_usuario'); ?></th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
    </tr>

    <?php foreach ($tipo_usuarios as $usuario): ?>
    <tr>
      <td><?php echo $usuario['UserType']['id']; ?></td>
      <td><?php echo $usuario['UserType']['tipo_usuario']; ?></td>
      <td><a class="eliminar" href="/SCFV_DSI2/UserTypes/eliminar/<?php  echo $usuario['UserType']['id'] ?>">Eliminar</a></td>
      <td><a class="editar"   href="/SCFV_DSI2/UserTypes/editar/<?php    echo $usuario['UserType']['id'] ?>">Editar</a></td>
      <td><a class="ver"      href="/SCFV_DSI2/UserTypes/ver/<?php       echo $usuario['UserType']['id'] ?>">Ver</a></td>    
    </tr>
    <?php 
      endforeach; 
      unset($usuario); 
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
    title: "Tipos de Usuario",
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