
<div class="users form">
    <fieldset>

    <legend><?php echo __('Reportar Salida de Camión Recolector'); ?></legend>
   
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Trip',array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden','style'=>'width: 300px ;'));
echo $this->Form->input('dossier_id',array('type'=>'hidden','style'=>'width: 100px; height:30px;'));

echo $this->Form->input('fecha_inicio',array('type'=>'hidden','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('fecha_fin',array('label'=>'Fecha de Regreso','value'=>'0000-00-00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_inicio',array('type'=>'hidden','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_fin',array('label'=>'Hora de Regreso','value'=>'00:00:00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_inicial',array('type'=>'hidden','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_final',array('label'=>'Kilometraje Final','value'=>'00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('fuera',array('type'=>'hidden','value'=>'0','style'=>'width: 100px; height:30px;'));

/*echo $this->Form->input('motorista', array(
    'type'=>'hidden',
    'label'=>'Motorista',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui1', array(
    'type'=>'hidden',
    'label'=>'Tripulante 1',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));



echo $this->Form->input('Dui2', array(
    'type'=>'hidden',
    'label'=>'Tripulante 2',
    'type'    => 'select',
    'options' =>$Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui3', array(
    'type'=>'hidden',
    'label'=>'Tripulante 3',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui4', array(
    'type'=>'hidden',
    'label'=>'Tripulante 4',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('Dui5', array(
    'label'=>'Tripulante 5',
    'type'    => 'select',
    'options' => $Empleados,
    'empty'   => ('Seleccione una opcion')
));*/

//echo $this->Form->textarea('comentario_salida',array('type'=>'idden','style'=>'width: 300px; height:200px;'));

echo $this->Form->label('Comentario de Entrada');echo '<br>';
echo $this->Form->textarea('comentario_entrada',array('style'=>'width: 300px; height:200px;'));
echo'<br><br>'
?>
    
     <table class="list" >
        <tr>
            <td colspan="5">
                <b> <?php echo 'Herramientas Utilizadas'; ?></b>
            </td>
        </tr>
        
        
        <tr>
             
      <?php
   $n=0;
   $i=0;
      foreach ($Herramientas as $Herramienta):?>
    

    
    <?php
    if($n!=5):
        echo '<td>';
         echo $Herramienta['Tool']['herramienta'];
         echo $n;
       echo $this->Form->checkbox($i, array('value'=>$Herramienta['Tool']['id']));
               echo'<br><br>';
               echo '</td>';
               
               
               else:
                   echo '</tr> <tr>';
               $n=0;
             
    endif;
    $n=$n+1;
    $i=$i+1;
   
         
               ?>
    
    
    
    
   <?php endforeach; ?>

    
    </table>
    
<?php
echo '<div class="input"><br>';
echo $this->Form->end('Registrar Entrada de Vehículo');
echo '</div>';
?>
     
</fieldset>
</div>