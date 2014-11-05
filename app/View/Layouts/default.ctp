<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
$webroot = "{$this->webroot}app/webroot";
$imgdir = "{$this->webroot}app/webroot/img";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cove - <?php echo $this->fetch('title'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $webroot ?>/css/cove.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $webroot ?>/js/bootstrap/css/bootstrap.min.css">
	<script type='text/javascript' src="<?php echo $webroot ?>/js/jquery-2.1.1.min.js"></script>
	<script type='text/javascript' src="<?php echo $webroot ?>/js/bootstrap/js/bootstrap.min.js"></script>
	<script type='text/javascript' src="<?php echo $webroot ?>/js/bootbox.min.js"></script>
      
</head>
<body>
	<div id="container">

		<div id="header-row">
			<div id="header">
				<img src=<?php echo "$imgdir/cove-logo.png" ?>>
				<h1>CoVE: Control de Flota de Vehiculos</h1>
				<span>Hola, <?php echo $this->Session->read("username") ?>.  (<a href="/users/logout">Salir</a>)<img src=<?php echo "$imgdir/avatar.png" ?>></span>
                                <h1><?php echo $webroot ?></h1>
                        </div>
		</div>

		<div id="menu-content-row">
			<div id="menu">
				<ul id="first-level">
					<li><a href="#"><img src=<?php echo "$imgdir/user.png" ?>> Usuarios</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/users/agregar"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/SCFV_DSI2/users/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/SCFV_DSI2/users/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/users/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="#"><img src=<?php echo "$imgdir/user-type.png" ?>> Tipos de Usuario</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/UserTypes/agregar"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/SCFV_DSI2/UserTypes/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/SCFV_DSI2/UserTypes/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/UserTypes/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
                                        <li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Unidades</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Units/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Units/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
                                        <li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Gerencias</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Managements/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Managements/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
                                        <li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>>Departamentos</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Departaments/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Departaments/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Marca de Vehiculo</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Brands/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/marcas/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/marcas/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Brands/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Tipo de Vehiculo</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Types/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/tipos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/tipos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Types/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>	
                                        	<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Modelo de Vehiculo</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Modells/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/tipos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/tipos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Modells/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Vehiculos</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Vehicles/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Vehicles/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
                                        <li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Herramientas</a>
						<ul id="second-level">
							<li><a href="/SCFV_DSI2/Tools/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/SCFV_DSI2/Tools/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="/camiones"><img src=<?php echo "$imgdir/truck.png" ?>> Camiones Recolectores</a></li>
					<li><a href="/mantenimientos"><img src=<?php echo "$imgdir/maintenance.png" ?>> Mantenimientos</a></li>
					<li><a href="/expedientes"><img src=<?php echo "$imgdir/calendar.png" ?>> Expedientes</a></li>
					<li><a href="/prestamos"><img src=<?php echo "$imgdir/calendar.png" ?>> Prestamos</a></li>
					<li><a href="/reportes"><img src=<?php echo "$imgdir/calendar.png" ?>> Reportes</a></li>
					<li><a href="/combustible"><img src=<?php echo "$imgdir/calendar.png" ?>> Combustible</a></li>
					<li><a href="/ayuda"><img src=<?php echo "$imgdir/calendar.png" ?>> Ayuda</a></li>
				</ul>
			</div>

			<div id="content">
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
				&nbsp;
			</div>
		</div>
	</div>
</body>
</html>
