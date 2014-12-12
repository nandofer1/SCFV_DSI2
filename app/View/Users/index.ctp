<?php $this->set('title_for_layout', 'Usuarios'); ?>
<h1 class="list-title">Usuarios</h1>
<div class="list-container">
  <div class="list-search">
    <form action="../users/buscar" id="UsuarioForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[User][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[User][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="User.username" <?php echo $campo=="User.username"?" selected": "" ?>>Nombre</option>
        <option value="UserType.tipo_usuario" <?php echo $campo=="UserType.tipo_usuario"?" selected": "" ?>>Tipo de usuario</option>
      </select> 
      <input  type="submit" value="Buscar"/>

    </form>
  </div>
  <table class="list">
    <tr>
      <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
      <th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
      <th><?php echo $this->Paginator->sort('tipo_usuario', 'Tipo de Usuario'); ?></th>
      <th><?php echo $this->Paginator->sort('correo', 'Correo'); ?></th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
      <th style="width: 1px;">&nbsp;</th>
    </tr>

    <?php foreach ($usuarios as $usuario): ?>
    <tr>
      <td style="width: 1px;"><?php echo $usuario['User']['id']; ?></td>
      <td><?php echo $usuario['User']['username']; ?></td>
      <td><?php echo $usuario['UserType']['tipo_usuario']; ?></td>
      <td><?php echo $usuario['User']['correo']; ?></td>      
      <td><a class="eliminar" href="../users/eliminar/<?php  echo $usuario['User']['id'] ?>">Eliminar</a></td>
      <td><a class="editar"   href="../users/editar/<?php    echo $usuario['User']['id'] ?>">Editar</a></td>
      <td nowrap><a class="editar"   href="../users/cambiar_clave/<?php    echo $usuario['User']['id'] ?>">Cambiar Clave</a></td>      
      <td><a class="ver"      href="../users/ver/<?php       echo $usuario['User']['id'] ?>">Ver</a></td>    
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
