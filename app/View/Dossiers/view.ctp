<div class="form">.
<h1 class="list-title">Expediente de Vehiculo</h1>
<div class="list-container">
  <table class="list">
      <tr><td>Id: </td><td><?php echo $dossier['Dossier']['id'];?></td></tr>
      <tr><td>Vehiculo: </td><td><?php echo $this->Html->link($dossier['Vehicle']['id'], array('controller' => 'vehicles', 'action' => 'view', $dossier['Vehicle']['id']));?></td></tr>
      <tr><td>Fecha Ingreso: </td><td><?php echo $dossier['Dossier']['kilometraje_actual']; ?></td></tr>
      <tr><td>Kilometraje Actual: </td><td><?php echo $dossier['Dossier']['kilometraje'];?></td></tr>
      <tr><td>Kilometraje: </td><td><?php echo $dossier['Dossier']['kilometraje']?></td></tr>
      <tr><td>Numero Viajes: </td><td><?php echo $dossier['Dossier']['numero_viajes']?></td></tr>
      <tr><td>Numero Mantenimientos: </td><td><?php echo $dossier['Dossier']['numero_mantenimientos']?></td></tr>
      <tr><td nowrap width="1" >Numero Vales: </td><td><?php echo $dossier['Dossier']['numero_vales']?></td></tr>
      <tr><td>Fecha Ult Mant.</td><td><?php echo $dossier['Dossier']['fecha_ult_mant']?></td></tr>
      <tr><td>Prestable: </td><td><?php echo $dossier['Dossier']['prestable']==false?"No":"Si"?></td></tr>      
      <tr><td>Observaciones</td><td><?php echo $dossier['Dossier']['observaciones'];?></td></tr>      
</table>
</div>
</div>
