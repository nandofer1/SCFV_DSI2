<?php $this->set('title_for_layout', 'Bitacora'); ?>
<h1 class="list-title">Bitacora</h1>
<div class="list-container">
  <table class="list">
    <tr><td>Usuario</td>     	<td><?php echo $logbook['User']['username']; ?></td></tr>
    <tr><td>Creado</td>          	<td><?php echo $logbook['Logbook']['created']; ?></td></tr>
    <tr><td>Accion</td>       <td><?php echo $logbook['Logbook']['action']; ?></td></tr>
    <tr><td>Datos</td>         <td><div style="word-break:break-all;width: 100%; overflow-x: auto"><?php echo $logbook['Logbook']['data']; ?></div></td></tr>
    <?php unset($logbook); ?>
  </table>
</div>
