<h1 class="list-title">Usuarios</h1>
<div class="list-container">
  <table class="list">
    <tr><td>id</td>           	<td><?php echo $usuario['User']['id']; ?></td></tr>
    <tr><td>username</td>     	<td><?php echo $usuario['User']['username']; ?></td></tr>
    <tr><td>password</td>     	<td><?php echo $usuario['User']['password']; ?></td></tr>
    <tr><td>Tipo de Usuario</td><td><?php echo $usuario['User']['tipo_usuario']; ?></td></tr>
    <tr><td>DUI</td>          	<td><?php echo $usuario['User']['dui']; ?></td></tr>
    <tr><td>Telefono</td>       <td><?php echo $usuario['User']['telefono']; ?></td></tr>
    <tr><td>Correo</td>         <td><?php echo $usuario['User']['correo']; ?></td></tr>
    <tr><td>Direccion</td>      <td><?php echo $usuario['User']['direccion']; ?></td></tr>

    <tr><td>Creado</td>       <td><?php echo $usuario['User']['created']; ?></td></tr>
    <tr><td>Modificado</td>   <td><?php echo $usuario['User']['modified']; ?></td></tr>
    <?php unset($usuario); ?>
  </table>
</div>
