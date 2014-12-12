<?php $this->set('title_for_layout', 'Agregar usuario'); ?>
<?php //pr($this->validationErrors); ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Agregar Usuario'); ?></legend>
        <?php 
        echo $this->Form->input('username', array('label' => 'Usuario: '));
        echo $this->Form->input('password', array('label' => 'Password: '));

        echo $this->Form->input('tipo_usuario', array(
            'type'    => 'select',
            'options' => $tipo_usuario,
            'empty'   => false
        ));        
        echo $this->Form->input('dui', array('label' => 'DUI: ', 'size'=>10));
        echo $this->Form->input('telefono', array('label' => 'Telefono: ', 'size'=>9));
        echo $this->Form->input('correo', array('label' => 'Correo: '));
        echo $this->Form->input('direccion', array('label' => 'Direccion: ', 'size'=>50));

        echo '<div class="input">';
        echo $this->Form->end(__('Agregar'));
        echo '</div>';
    ?>
    </fieldset>

</div>
