
<div class="users form">
    <fieldset>

    <legend><?php echo __('Modificar Empleado'); ?></legend>
    <?php
 //UTILIZAMOS EL HELPER FORM , generar un formulario de forma mas rapido
echo $this->Form->create('Employee',  array('action'=>'edit')); // se le pone el nombre del modelo para el que se quiere generar el formulario
echo $this->Form->input('id',  array('type'=>'hidden','label'=>'Nº De DUI','style'=>'width: 300px ; ','pattern'=>'^([0-9]{9})$','placeholder'=>'Ingrese Nº dui sin guión','required'=>'true'));
echo $this->Form->input('departament_id', array(
    'label'=>'Departamento al que pertenece',
    'type'    => 'select',
    'options' => $Departamentos,
    'empty'   => ('Seleccione una opcion'),
    'required'=>'true'
));
echo $this->Form->input('nombre',array('label'=>'Nombre Completo','style'=>'width: 300px; ','placeholder'=>'Ingrese nombre completo','pattern'=>'^([a-zA-ZáéíóúÁÉÍÓÚü\s])+([a-zA-ZáéíóúÁÉÍÓÚü])+$','required'=>'true'));
echo $this->Form->input('apellidos',array('label'=>'Apellidos','style'=>'width: 300px; ','placeholder'=>'Ingrese ambos apellidos','pattern'=>'^([a-zA-ZáéíóúÁÉÍÓÚü\s])+([a-zA-ZáéíóúÁÉÍÓÚü])+$','required'=>'true'));
echo $this->Form->label('Dirección');echo '<br>';
echo $this->Form->textarea('direccion',array('style'=>'width: 300px; height:200px;'));
echo $this->Form->input('correo',array('label'=>'Correo Electrónico','style'=>'width: 300px;','pattern'=>"^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$",'placeholder'=>'nombre@jemplo.com','required'=>'true'));
echo $this->Form->input('telefono',array('label'=>'Teléfono','style'=>'width: 300px; ','placeholder'=>'Ej: 2###-#### ,7###-#### ','pattern'=>'^\d{4}-{1}\d{4}$','required'=>'true'));
echo '<div class="input"><br>';
echo $this->Form->end('Guardar Empleado');
echo '</div>';
?>
    </fieldset>
</div>