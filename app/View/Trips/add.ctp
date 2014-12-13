<?php $this->set('title_for_layout', 'Reportar salida de camión recolector de basura'); ?>
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

        
        
        echo $this->Form->input('fecha_inicio', array(
            'label' => "Fecha de Salida : ", 
            'type' => 'text', 
            'error' => false , 
            'id' => 'select_date', 
            'required'=>'true'
        ));

echo $this->Form->input('fecha_fin',array('type'=>'hidden','value'=>'0000-00-00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('hora_inicio',array(
    'label'=>'Hora de Salida',
    'id' => 'hora_inicio',
    'type' => 'text',
    'style'=>'width: 100px; height:30px;',
    'required'=>'true'
));
echo $this->Form->input('hora_fin',array('type'=>'hidden','value'=>'00:00:00','style'=>'width: 100px; height:30px;'));
echo $this->Form->input('kilometraje_inicial',array('type'=>'number','label'=>'Kilometraje Inicial','style'=>'width: 100px; height:30px;','maxlength'=>'6','required'=>'true'));
echo $this->Form->input('kilometraje_final',array('type'=>'hidden','value'=>'00','style'=>'width: 100px; height:30px;'));
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
echo $this->Form->input('rendimiento',array('type'=>'hidden','value'=>'0','style'=>'width: 100px; height:30px;'));
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
   $i=1;
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
    echo $this->Form->input('num_h',array('type'=>'hidden','value'=>$i));
    
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
    $("#select_date").Zebra_DatePicker({
            format: 'Y-m-d',
            direction: true,
            disabled_dates: ['* * * 0'],
            inside: false,
            show_select_today: 'Hoy',
            lang_clear_date: 'Limpiar fecha',
            days:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
            months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                    'Septiembre','Octubre','Noviembre','Diciembre']
    });
    $("#hora_inicio").timePicker({
        startTime: "05:00",
        endTime: "19:00",
        show24Hours: false,
        separator: ':',
    });
    
    //-------------------------------------------------------------------------------
    msg = function(msg) {
        //e.preventDefault();
        bootbox.dialog({
        title: "Viajes",
        message: msg,
        buttons: {
           aceptar: {
            label: "Aceptar",
            className: "btn-success",
            callback: function() {
            }
          }
        }
        });
    }

    var tripulacion = [$("#TripDui1"), $("#TripDui2"), $("#TripDui3"), $("#TripDui3"), $("#TripDui4"), $("#TripDui5")];
    function comp(dis, sid) {
        for(i=0; i<= (tripulacion.length - 1); i++){
            if(dis.val()=="") { return; }
            if($("#TripMotorista").val() == tripulacion[i].val() && tripulacion[i].val() != ""){
                msg("No se puede escoger ese tripulante porque ya esta designado como motorista.");
                dis.val("");
            }
            if(dis.val()==tripulacion[i].val() && tripulacion[i].attr('id') != dis.attr('id')){
                msg("No puede escoger el mismo empleado mas de una vez!");
                dis.val("");
            }
        }
    };


    function comp2(dis, sid) {
        for(i=0; i<= (tripulacion.length - 1); i++){
            if($("#TripMotorista").val() == tripulacion[i].val() && tripulacion[i].val() != ""){
                msg("No se puede escoger ese motorista porque ya esta designado como tripulante.");
                $("#TripMotorista").val("");
            }
        }
    };

    $("#TripMotorista").change(function(){comp2($(this));});
    $("#TripDui1").change(function(){comp($(this));});
    $("#TripDui2").change(function(){comp($(this));});
    $("#TripDui3").change(function(){comp($(this));});
    $("#TripDui4").change(function(){comp($(this));});
    $("#TripDui5").change(function(){comp($(this));});

   
});
</script>
