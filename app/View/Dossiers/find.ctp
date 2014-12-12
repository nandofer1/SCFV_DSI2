<?php $this->set('title_for_layout', 'Búsqueda de expediente'); ?>
<center><b>Listado de Vehículos</b>
    <br><br>
<?php 
echo $this->Form->create('Dossier'); 
echo $this->Form->input('placa',array('label'=>'Ingrese la Placa del Vehículo','style'=>'width: 100px; height:8px;'));
echo $this->Form->end('Ver Expediente');
  
  
  ?>
</center>