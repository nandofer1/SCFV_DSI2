<?php $this->set('title_for_layout', 'Agregar empleado'); ?>
<div class="users form">
    <fieldset>
    <legend><?php
    echo __('Agregar Empleado');
    ?></legend>
        <?php
    echo $this->Form->create('Employee'); // se le pone el nombre del modelo para el que se quiere generar el formulario
    echo $this->Form->input('id', array(
        'type' => 'text',
        'label' => 'Nº De DUI',
        'style' => 'width: 300px ; ',
        'pattern' => '^[0-9]{8}[-]{1}[0-9]{1}$',
        'placeholder' => 'Ingrese Nº DUI',
        'required' => 'true'
    ));
    echo $this->Form->input('departament_id', array(
        'label' => 'Departamento al que pertenece',
        'type' => 'select',
        'options' => $Departamentos,
        'empty' => ('Seleccione una opcion'),
        'required' => 'true'
    ));
    echo $this->Form->input('nombre', array(
        'label' => 'Nombre Completo',
        'style' => 'width: 300px; ',
        'placeholder' => 'Ingrese nombre completo',
        'pattern' => '^([a-zA-ZñáéíóúÁÉÍÓÚü\s])+([a-zA-ZáéíóúÁÉÍÓÚü])+$',
        'required' => 'true'
    ));
    echo $this->Form->input('apellidos', array(
        'label' => 'Apellidos',
        'style' => 'width: 300px; ',
        'placeholder' => 'Ingrese ambos apellidos',
        'pattern' => '^([a-zA-ZñáéíóúÁÉÍÓÚü\s])+([a-zA-ZáéíóúÁÉÍÓÚü])+$',
        'required' => 'true'
    ));

    echo $this->Form->input('direccion', array(
        'label' => 'Direccion: ',
        'type' => 'textarea',
        'style' => 'width: 300px; height:100px;'
    ));

    echo $this->Form->input('correo', array(
        'label' => 'Correo Electrónico',
        'style' => 'width: 300px;',
        'pattern' => "^[a-zA-Zñ0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Zñ0-9-]+(?:\.[a-zA-Zñ0-9-]+)*$",
        'placeholder' => 'nombre@ejemplo.com',
        'required' => 'true'
    ));
    echo $this->Form->input('telefono', array(
        'label' => 'Teléfono',
        'style' => 'width: 300px; ',
        'placeholder' => 'Ej: 2###-#### ,7###-#### ',
        'pattern' => '^\d{4}-{1}\d{4}$',
        'required' => 'true'
    ));
    echo '<div class="input"><br>';
    echo $this->Form->end('Guardar Empleado');
    echo '</div>';
    ?>
    </fieldset>
</div>
