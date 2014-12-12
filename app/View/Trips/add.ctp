<?php echo $this->Html->css('jquery-ui-1.9.2.custom'); ?>
<?php echo $this->Html->script('jquery-ui-1.9.2.custom.min'); ?>

<div class="users form">

   <?php //  print_r ($Expedientes); ?>
    <fieldset>

    <legend><?php echo __('Reportar Salida de Camión Recolector'); ?></legend>
   
    <?php
    
  

 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Trip'); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('dossier_id', array(
    'label'=>'Placa de Vehículo',
    'type'    => 'select',
    'options' => $Expedientes,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));

//echo $this->Form->input('fecha_inicio',array('label'=>'Fecha de Salida','style'=>'width: 100px; height:30px;'));

        
        
        echo $this->Form->input('fecha_inicio', array('label' => "Fecha de Salida : ", 'type' => 'text', 
                                'error' => false , 'id' => 'select_date', 'required'=>'true'));
       echo  '<center>';
       
         echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker')); 
       echo '</center>';


//echo $this->Form->input('fecha_fin',array('label'=>'Fecha de Regreso','value'=>'0000-00-00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_inicio',array('label'=>'Hora de Salida','style'=>'width: 100px; height:30px;','required'=>'true'));
//echo $this->Form->input('hora_fin',array('label'=>'Hora de Regreso','value'=>'00:00:00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_inicial',array('type'=>'number','label'=>'Kilometraje Inicial','style'=>'width: 100px; height:30px;','maxlength'=>'6','required'=>'true'));
//echo $this->Form->input('kilometraje_final',array('label'=>'Kilometraje Final','value'=>'00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('fuera',array('type'=>'hidden','value'=>'1','style'=>'width: 100px; height:30px;'));

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
echo $this->Form->label('Comentario de Salida');echo'<br>';
echo $this->Form->textarea('comentario_salida',array('style'=>'width: 300px; height:200px;','pattern'=>'/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{1,}$/i'));

?>
     <table class="list" >
        <tr>
            <td colspan="5">
                <b> <?php echo 'Herramientas'; ?></b>
            </td>
        </tr>
        <tr>
             
      <?php
   $n=0;
   $i=0;
      foreach ($Herramientas as $Herramienta):?>
    <?php
    // para mostrar 5 por cada fila
    if($n!=5):
        echo '<td>';
         echo $Herramienta['Tool']['herramienta'];
        // echo $n;
       echo $this->Form->checkbox($i, array('value'=>$Herramienta['Tool']['id']));
               echo'<br><br>';
               echo '</td>';
               else:
                   echo '</tr> <tr>';
               $n=0;
             
    endif;
    $n=$n+1;
    $i=$i+1;
    endforeach; 

    //NUMERO DE HERRAMIENTAS
    echo $this->Form->input('num_h',array('type'=>'hidden','value'=>$i+1));
    
    ?>
     </table>
    
    
<?php

echo '<div class="input"><br>';
echo $this->Form->end('Registrar Salida de Vehículo');
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
        </script>