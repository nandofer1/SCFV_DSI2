
<div class="users form">
    <fieldset>

    <legend><?php echo __('Agregar Modelo de Vehículo'); ?></legend>
    
   
 
<?php

//UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido


echo $this->Form->create('Modell'); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('brand_id', array(
    'label'=>'Marca',
    'type'    => 'select',
    'options' => $Marcas,
    'empty'   => ('Seleccione una opcion')
));

echo $this->Form->input('modelo',  array('label'=>'Modelo','style'=>'width: 300px ;'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Modelo');
echo '</div>';
?>
    </fieldset>
</div>