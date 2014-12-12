<?php $this->set('title_for_layout', 'Bitacora'); ?>
<div class="form">
<h1 class="list-title">Bitacora</h1>
<div class="list-container">
  <div class="list-search">
    <!--
    <form action="../logbooks/buscar" id="LogbookForm" method="post" accept-charset="utf-8">
      <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
      <input name="data[Logbook][query]" type="text" id="BuscarQuery" placeholder="Palabras clave" value="<?php echo  isset($query)? $query: "" 
      ?>"/>
      <select name="data[Logbook][campo]" >
        <?php $campo = isset($campo)? $campo: "" ?>
        <option value="Logbook.action" <?php echo $campo=="Logbook.action"?" selected": "" ?>>Accion</option>
        <option value="Logbook.user_id" <?php echo $campo=="Logbook.action"?" selected": "" ?>>Accion</option>
      </select> 
      <input  type="submit" value="Buscar"/>
    </form>
      -->
  </div>
  <table class="list">
    <tr>
      <th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
      <th><?php echo $this->Paginator->sort('created', 'Fecha'); ?></th>
      <th><?php echo $this->Paginator->sort('action', 'Accion'); ?></th>
      <th><?php echo $this->Paginator->sort('data', 'Datos'); ?></th>
      <th></th>
    </tr>

    <?php foreach ($logbooks as $logbook): ?>
    <tr>
      <td><?php echo $logbook['User']['username']; ?></td>
      <td><?php echo $logbook['Logbook']['created']; ?></td>
      <td><?php echo $logbook['Logbook']['action']; ?></td>
      <td><?php echo substr($logbook['Logbook']['data'],0,50); ?></td>      
      <td><a href="/logbooks/ver/<?php echo $logbook['Logbook']['id'] ?>">Ver</a></td>
    </tr>
    <?php 
      endforeach; 
      unset($logbook); 
    ?>
    
    <tr> 
      <!-- Cambiar el numero de columnas que cubre el colspan -->
      <td colspan="5" align="center" style="border: 0px"><?php echo $this->Paginator->numbers(array('first' => 'First page'));  ?></td>
    </tr>
  </table>
</div>
</div>
