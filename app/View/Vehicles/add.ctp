<?php $this->set('title_for_layout', 'Agregar vehículo'); ?>
<div class="users form">
    <fieldset>
    <legend><?php echo __('Agregar Vehiculo'); ?></legend>
    <?php
    //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
    echo $this->Form->create('Vehicle'); // se le pone el nombre del modelo para el que se quiere generar el formulario
    
    echo $this->Form->input('id',  array('type'=>'text','label'=>'Número de Placa: ','style'=>'width: 300px ;','placeholder'=>'Ej:N####','required'=>'true','pattern'=>'^N{1}\d{4}$','maxlength'=>'5'));
    echo $this->Form->input('management_id', array(
      'label'=>'Gerencia: ',
      'type'    => 'select',
      'options' => $Gerencias,
      'empty'   => ('Seleccione una opcion'),
      'required'=>'true'
    )); 

    ?>
    <!-- Hacemos el control select de los modelos -->
    <div class="input select">
      <label>Modelo: </label>
      <select name="data[Vehicle][modell_id]" >
        <option value="">Seleccione una opcion</option>
        <?php foreach ($Modelos as $Modelo):?>
        <option value="<?php echo $Modelo['Modell']['id'];?>">
            <?php echo "{$Modelo['Type']['tipo']} {$Modelo['Brand']['marca']} {$Modelo['Modell']['modelo']}"; ?>
        </option>
        <?php endforeach;?>
      </select> 
    </div>
    <div class="input select" id="VehicleAnio">
      <label>Año: </label>
      <select name="data[Vehicle][anio]" >
        <?php for($i=date("Y");$i>=1950;$i--):?>
        <option value="<?php echo $i?>"> <?php echo $i ?> </option>
        <?php endfor;?>
      </select>
    </div>
    <?php
    echo $this->Form->input('tarjeta_circulacion',array('label'=>'Tarjeta de Circulacion','style'=>'width: 300px;','required'=>'true','placeholder'=>'Placa+Año Ej:N33332013','pattern'=>'^N{1}\d{4}[1-2]{1}\d{3}$','maxlength'=>'9'));
    echo $this->Form->input('fecha_tarjeta', array('label' => "Fecha de Tarjeta : ", 'type' => 'text','error' => false , 'id' => 'select_date','required'=>'true', 'placeholder'=> 'Año-Mes-Dia'));
    echo $this->Html->div('', ' ' ,array('id' => 'datepicker', 'style '=> 'position: absolute; left: 385px; margin: 0; padding: 0; margin-top: -13px;')); 
    //echo $this->Form->input('anio',array('label'=>'Año','style'=>'width: 100px;','required'=>'true','placeholder'=>'Ej:2011 ,1999','pattern'=>'^([1-2]{1}[0-9]{3})$','maxlength'=>'4'));
    echo $this->Form->input('color',array('label'=>'Color: ','style'=>'width: 300px; ','pattern'=>'^[a-zA-Záéíóúñ\s]*$','placeholder'=>'Solo texto','required'=>'true'));
    echo $this->Form->input('motor',array('label'=>'Motor: ','style'=>'width: 300px; ','placeholder'=>'Alfanumérico , solo Mayúsculas','pattern'=>'^[A-Z0-9]*$','required'=>'true'));
    echo $this->Form->input('chasisgrabado',array('label'=>'Chasis Grabado: ','style'=>'width: 300px;','placeholder'=>'Alfanumérico , solo Mayúsculas','pattern'=>'^[A-Z0-9]*$','required'=>'true'));
    echo $this->Form->input('chasisvin',array('label'=>'Chasis VIN: ','style'=>'width: 300px;','placeholder'=>'Alfanumérico , solo Mayúsculas','required'=>'true','pattern'=>'^[A-Z0-9]*$'));
    echo $this->Form->input('costo',array('type'=>'number','label'=>'Costo de Compra: $','style'=>'width: 100px; height: 2em;','required'=>'true','step'=>'0.2','placeholder'=>'Ej:4000.00'));

    echo $this->Form->input('observacion', array('label'=>'Descripcion: ', 'type' => 'textarea', 'style'=>'width: 300px; height:100px;'));

    //echo $this->Form->label('Observaciones'); echo'<br>';
    //echo $this->Form->textarea('observacion',array('style'=>'width: 300px; height:200px;'));
    echo '<div class="input"><br>';
    echo $this->Form->end('Guardar Vehículo');
    echo '</div>';
    ?>
    </fieldset>
  </div>
<script>
$(document).ready(function(){
  
  $("#select_date").Zebra_DatePicker({
        format: 'Y-m-d',
        inside: false,
        show_select_today: 'Hoy',
        lang_clear_date: 'Limpiar fecha',
        days:['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
        months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
                'Septiembre','Octubre','Noviembre','Diciembre']
    });

 /*$("#colora").selectBoxIt({
    theme: "jquery", // Uses the jQueryUI theme for the drop down
    showFirstOption: false
  });*/
  function toTitleCase(str)
  {
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  }

  $("#VehicleId").keyup(function(){
      $(this).val($(this).val().toUpperCase());
      $("#VehicleTarjetaCirculacion").val($(this).val());
  });
  
  $("#VehicleChasisgrabado").keyup(function(){
      $(this).val($(this).val().toUpperCase());
  });

  $("#VehicleChasisvin").keyup(function(){
      $(this).val($(this).val().toUpperCase());
  });  

  $('#VehicleAnio').change(function() {
    $("#VehicleTarjetaCirculacion").val($("#VehicleTarjetaCirculacion").val().substring(0,5) + $("#VehicleAnio option:selected").text().trim());
  });

  $("#VehicleColor").keyup(function(){
      $(this).val(toTitleCase($(this).val()));
  });

});
</script>
