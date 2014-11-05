<h1 class="list-title">Tipo de Usuarios</h1>
<div class="list-container">
  <table class="list">
    <tr><td>id</td>           	<td><?php echo $tipo_usuario['UserType']['id']; ?></td></tr>
    <tr><td>Tipo de Usuario</td><td><?php echo $tipo_usuario['UserType']['tipo_usuario']; ?></td></tr>
    <tr><td>Creado</td>       <td><?php echo $tipo_usuario['UserType']['created']; ?></td></tr>
    <tr><td>Modificado</td>   <td><?php echo $tipo_usuario['UserType']['modified']; ?></td></tr>
    <?php unset($tipo_usuario); ?>
  </table>
</div>