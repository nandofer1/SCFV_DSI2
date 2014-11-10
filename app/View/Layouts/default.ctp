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
				<span class="user-info">Hola, <?php echo $this->Session->read("username") ?> &nbsp;
						<div class="btn-group">
						  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						    Opciones &nbsp;<span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu dropdown-menu-right" role="menu">
						    <li><a href="/users/ver/<?php echo $this->Session->read("id"); ?>">Ver Perfil</a></li>
						    <li><a href="/users/cambiar_clave/<?php echo $this->Session->read("id"); ?>">Cambiar contraseña</a></li>
						    <li class="divider"></li>
						    <li><a href="/users/logout">Cerrar sesion</a></li>
						  </ul>
						</div>						
				</span>
			</div>
		</div>

		<div id="menu-content-row">
			<div id="menu">
				<ul id="first-level">


					<li><a href="/users"><img src=<?php echo "$imgdir/user.png" ?>> Usuarios</a>
						<ul id="second-level">
							<li><a href="/users/agregar"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/users/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/users/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/users/cambiar_clave"><img src="<?php echo "$imgdir/mod.png"?>">Cambiar Contraseña</a></li>
							<li><a href="/users/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>

								<li><a href="/user_types"><img src=<?php echo "$imgdir/user-type.png" ?>> Tipos de Usuario
									<span class="glyphicon glyphicon-play"></span></a>

									<ul id="second-level">
										<li><a href="/user_types/agregar"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
										<li><a href="/user_types/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
										<li><a href="/user_types/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
										<li><a href="/user_types/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
									</ul>
								</li>
							</li>
						</ul>
					</li>


					<li><a href="/users"><img src=<?php echo "$imgdir/org.png" ?>> Organizacion </a>
						<ul id="second-level">
							<li><a href="/Units"><img src=<?php echo "$imgdir/org.png" ?>> Unidades
								<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Units/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Units/delete"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
									<li><a href="/Units/edit"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
									<li><a href="/Units/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
								</ul>
							</li>
							<li><a href="/Managements"><img src=<?php echo "$imgdir/org.png" ?>> Gerencias
								<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Managements/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Managements/delete"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
									<li><a href="/Managements/edit"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
									<li><a href="/Managements/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
								</ul>
							</li>
							<li><a href="#"><img src=<?php echo "$imgdir/org.png" ?>> Departamentos
								<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Departaments/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/vehiculos/delete"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
									<li><a href="/vehiculos/edit"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
									<li><a href="/Departaments/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="/Vehicles/"><img src=<?php echo "$imgdir/car.png" ?>> Vehiculos</a>
						<ul id="second-level">
							<li><a href="/Vehicles/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/Vehicles/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>

					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Marca de Vehiculo<span class="glyphicon glyphicon-play"></span></a>
						<ul id="second-level">
							<li><a href="/Brands/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/marcas/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/marcas/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/Brands/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Tipo de Vehiculo<span class="glyphicon glyphicon-play"></span></a>
						<ul id="second-level">
							<li><a href="/Types/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/tipos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/tipos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/Types/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>	
					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Modelo de Vehiculo<span class="glyphicon glyphicon-play"></span></a>
						<ul id="second-level">
							<li><a href="/Modells/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/tipos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/tipos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/Modells/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>


						</ul>
					</li>
					<li><a href="#"><img src=<?php echo "$imgdir/tools.png" ?>> Herramientas</a>
						<ul id="second-level">
							<li><a href="/Tools/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/vehiculos/eliminar"><img src="<?php echo "$imgdir/del.png"?>">Eliminar</a></li>
							<li><a href="/vehiculos/editar"><img src="<?php echo "$imgdir/mod.png"?>">Editar</a></li>
							<li><a href="/Tools/index"><img src="<?php echo "$imgdir/list.png"?>">Lista</a></li>
						</ul>
					</li>
					<li><a href="/camiones"><img src=<?php echo "$imgdir/truck.png" ?>> Camiones Recolectores</a>
                                        <ul id="second-level">
							<li><a href="/Trips/add"><img src="<?php echo "$imgdir/add.png"?>">Reportar Salida</a></li>
							<li><a href="/Trips/index"><img src="<?php echo "$imgdir/list.png"?>">Ver Viajes</a></li>
							
						</ul>
                                        </li>
					<li><a href="/mantenimientos"><img src=<?php echo "$imgdir/maintenance.png" ?>> Mantenimientos</a></li>
					<li><a href="/expedientes"><img src=<?php echo "$imgdir/reg.png" ?>> Expedientes</a></li>
					<li><a href="/prestamos"><img src=<?php echo "$imgdir/prestamo.png" ?>> Prestamos</a></li>
					<li><a href="/reportes"><img src=<?php echo "$imgdir/reports.png" ?>> Reportes</a></li>
					<li><a href="/combustible"><img src=<?php echo "$imgdir/gas.png" ?>> Combustible</a></li>
					<li><a href="/ayuda"><img src=<?php echo "$imgdir/help.png" ?>> Ayuda</a></li>
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
			</div>
		</div>
	</div>
</body>
</html>
