<?php $wb = $this->webroot; $imgdir = "{$this->webroot}app/webroot/img"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CoVE - Ingresar al Sistema</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo $wb ?>app/webroot/css/cove.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $wb ?>app/webroot/js/bootstrap/css/bootstrap.min.css">
        <script type='text/javascript' src="<?php echo $wb ?>app/webroot/js/jquery-2.1.1.min.js"></script>
        <script type='text/javascript' src="<?php echo $wb ?>app/webroot/js/bootstrap/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="<?php echo $wb ?>app/webroot/js/bootbox.min.js"></script>    </head>
    <body>
        <?php
        if ($this->Session->check('Message.flash')){
            $msg = "{$this->Session->flash()}";                 
            print "<noscript>{$msg}</noscript>";
            ?>
            <script>
            bootbox.dialog({
                message: <?php echo "\"{$msg}\"" ?>,
                title: "CoVE",
                buttons: {
                    main: {
                        label: "Aceptar",
                        className: "btn-primary",
                        callback: function() {
                        }
                    }
                }
            });
            </script>
            <?php
        }
        echo $this->fetch('content'); 
        ?>
        <div class="login-outer">
            <div class="login-middle">
                <div class="login-inner">
                    <div class="login-title">
                        <img src="<?php echo "$imgdir/cove-logo-large.png"?>">
                        <span>CoVE: Sistema de Control de Flota Vehicular</span>
                    </div>
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->Form->create('User'); ?>
                    <fieldset>
                        <legend>
                            <?php //echo __('Por favor ingrese su usuario y password'); ?>
                        </legend>
                        <?php
                        echo $this->Form->input('username', array( 'label' => 'Usuario: ', 'size' => '25'));
                        echo $this->Form->input('password', array( 'label' => 'Password: ', 'size' => '25'));
                        echo '<div class="input" style="padding-left: 250px;">';
                        echo $this->Form->end(__('Ingresar'));
                        echo "</div>";
                        ?>
                    </fieldset>
                </div>
            </div>
        </div>    

    </body>
</html>