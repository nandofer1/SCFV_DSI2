<h1 class="list-title">Usuarios</h1>
<div class="list-container">
  <table class="list">
    <tr><td>id</td>           	<td><?php echo $usuario['Usuario']['id']; ?></td></tr>
    <tr><td>username</td>     	<td><?php echo $usuario['Usuario']['username']; ?></td></tr>
    <tr><td>password</td>     	<td><?php echo $usuario['Usuario']['password']; ?></td></tr>
    <tr><td>Tipo de Usuario</td><td><?php echo $usuario['Usuario']['tipo_usuario']; ?></td></tr>
    <tr><td>DUI</td>          	<td><?php echo $usuario['Usuario']['dui']; ?></td></tr>
    <tr><td>Telefono</td>       <td><?php echo $usuario['Usuario']['telefono']; ?></td></tr>
    <tr><td>Correo</td>         <td><?php echo $usuario['Usuario']['correo']; ?></td></tr>
    <tr><td>Direccion</td>      <td><?php echo $usuario['Usuario']['direccion']; ?></td></tr>

    <tr><td>Creado</td>       <td><?php echo $usuario['Usuario']['created']; ?></td></tr>
    <tr><td>Modificado</td>   <td><?php echo $usuario['Usuario']['modified']; ?></td></tr>
    <?php unset($usuario); ?>
  </table>
</div>