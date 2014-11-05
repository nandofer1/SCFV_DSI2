<div class="users form">
<?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Editar Usuario'); ?></legend>
        <?php 
        echo $this->Form->input('username', array('label' => 'Usuario: '));
        echo $this->Form->input('password', array('label' => 'Password: '));

        echo $this->Form->input('tipo_usuario', array(
            'type'    => 'select',
            'options' => $tipo_usuario,
            'empty'   => false
        ));        

        echo $this->Form->input('dui', array('label' => 'DUI: '));
        echo $this->Form->input('telefono', array('label' => 'Telefono: '));
        echo $this->Form->input('correo', array('label' => 'Correo: '));
        echo $this->Form->input('direccion', array('label' => 'Direccion: '));

        echo '<div class="input">';
        echo $this->Form->end(__('Editar'));
        echo '</div>';
    ?>
    </fieldset>

</div>