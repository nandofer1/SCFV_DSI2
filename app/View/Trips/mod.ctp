<?php echo $this->Html->css('jquery-ui-1.9.2.custom'); ?>
<?php echo $this->Html->script('jquery-1.9.2.min'); ?>
<?php echo $this->Html->script('jquery-ui-1.9.2.custom.min'); ?>

<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Viaje de Camión Recolector'); 
 //print_r($this->request->data['Trip']['id']) ;
    ?></legend>
   
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Trip',array('action'=>'mod')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden','style'=>'width: 300px ;'));
echo $this->Form->input('dossier_id', array(
    'label'=>'Placa de Vehículo',
    'type'    => 'select',
    'options' => $Expedientes,
    'empty'   => ('Seleccione una opcion'),
       'required'=>'true'
));
if($this->request->data['Trip']['fuera']==1):
    echo $this->Form->input('fecha_inicio',array('label'=>'Fecha de Inicio','style'=>'width: 100px; height:30px;'));
    echo $this->Form->input('hora_inicio',array('style'=>'width: 100px; height:30px;'));
    echo $this->Form->input('kilometraje_inicial',array('style'=>'width: 100px; height:30px;'));
    echo $this->Form->input('motorista', array(
    
    'label'=>'Motorista',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion'),
           'required'=>'true'
));

echo $this->Form->input('Dui1', array(
  
    'label'=>'Tripulante 1',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion'),
       'required'=>'true'
));



echo $this->Form->input('Dui2', array(
    'type'=>'hidden',
    'label'=>'Tripulante 2',
    'type'    => 'select',
    'options' =>$Empleados,
    'empty'   => ('Seleccione una opcion'),
       'required'=>'true'
));

echo $this->Form->input('Dui3', array(

    'label'=>'Tripulante 3',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion'),
       'required'=>'true'
));

echo $this->Form->input('Dui4', array(
  
    'label'=>'Tripulante 4',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion'),
     'required'=>'true'
));

echo $this->Form->input('Dui5', array(
    'label'=>'Tripulante 5',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion'),
       'required'=>'true'
));
echo $this->Form->label('Comentario de Salida');echo '<br>';
echo $this->Form->textarea('comentario_salida',array('style'=>'width: 300px; height:200px;','pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i'));
echo '<br>';

else:
echo $this->Form->input('fecha_inicio', array('label' => "Fecha de Salida : ", 'type' => 'text', 
                                'error' => false , 'id' => 'select_date', 'required'=>'true'));
       echo  '<center>';
       
         echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker')); 
       echo '</center>';
echo $this->Form->input('fecha_fin', array('label' => "Fecha de Regreso : ", 'type' => 'text', 
                                'error' => false , 'id' => 'select_date1', 'required'=>'true'));
       echo  '<center>';
       
         echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker1')); 
       echo '</center>';
echo $this->Form->input('hora_inicio',array('label'=>'Hora de Salida','style'=>'width: 100px; height:30px;','required'=>'true'));
echo $this->Form->input('hora_fin',array('label'=>'Hora de Regreso','value'=>'00:00:00','style'=>'width: 100px; height:30px;','required'=>'true'));
echo $this->Form->input('kilometraje_inicial',array('type'=>'number','label'=>'Kilometraje Inicial','style'=>'width: 100px; height:30px;','maxlength'=>'6','required'=>'true'));
echo $this->Form->input('kilometraje_final',array('type'=>'number','label'=>'Kilometraje Final','style'=>'width: 100px; height:30px;','maxlength'=>'6','required'=>'true'));
echo $this->Form->input('fuera',array('type'=>'hidden','style'=>'width: 100px; height:30px;'));


echo $this->Form->label('Comentario de Salida');echo '<br>';
echo $this->Form->textarea('comentario_salida',array('style'=>'width: 300px; height:200px;','pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i'));
echo '<br>';
echo '<br>';
echo $this->Form->label('Comentario de Entrada');echo '<br>';
echo $this->Form->textarea('comentario_entrada',array('style'=>'width: 300px; height:200px;','pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i'));
endif;
echo '<div class="input"><br>';
echo $this->Form->end('Modificar Datos de Viaje');
echo '</div>';
?>
     
</fieldset>
</div>
<script>
$(document).ready(function(){
              $("#select_date").click(function(){
                     $("#datepicker").datepicker(
                    {
                           dateFormat: 'yy-mm-dd',
                           onSelect: function(dateText, inst){
                                 $('#select_date').val(dateText);
                                 $("#datepicker").datepicker("destroy");
                          }
                     }
                     );
               });
        });
        (document).ready(function(){
              $("#select_date1").click(function(){
                     $("#datepicker1").datepicker(
                    {
                           dateFormat: 'yy-mm-dd',
                           onSelect: function(dateText, inst){
                                 $('#select_date1').val(dateText);
                                 $("#datepicker1").datepicker("destroy");
                          }
                     }
                     );
               });
        });
        </script>