<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright		 Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link					http://cakephp.org CakePHP(tm) Project
 * @package			 app.View.Layouts
 * @since				 CakePHP(tm) v 0.10.0.1076
 * @license			 http://www.opensource.org/licenses/mit-license.php MIT License
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


					<li><a href="#"><img src=<?php echo "$imgdir/user.png" ?>> Usuarios</a>
						<ul id="second-level">
							<li><a href="/users/agregar"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/users/cambiar_clave"><img src="<?php echo "$imgdir/mod.png"?>">Cambiar Contraseña</a></li>
							<li><a href="/users/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>

								<li><a href="#"><img src=<?php echo "$imgdir/user-type.png" ?>> Tipos de Usuario
									<span class="glyphicon glyphicon-play"></span></a>

									<ul id="second-level">
										<li><a href="/user_types/agregar"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
										<li><a href="/user_types/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
									</ul>
								</li>
							</li>
						</ul>
					</li>


					<li><a href="#"><img src=<?php echo "$imgdir/org.png" ?>> Organizacion </a>
						<ul id="second-level">
							<li><a href="#"><img src=<?php echo "$imgdir/org.png" ?>> Unidades <span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Units/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Units/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>
							<li><a href="#"><img src=<?php echo "$imgdir/org.png" ?>> Gerencias <span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Managements/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Managements/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>
							<li><a href="#"><img src=<?php echo "$imgdir/org.png" ?>> Departamentos <span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Departaments/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Departaments/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>
							<li><a href="#"><img src=<?php echo "$imgdir/org.png" ?>> Empleados <span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Employees/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Employees/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>
						</ul>
					</li>


					<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Vehiculos</a>
						<ul id="second-level">
							<li><a href="/Vehicles/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/Vehicles/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
							<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Marca de Vehiculo<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Brands/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Brands/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>
							<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Modelo de Vehiculo<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Modells/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Modells/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>
							<li><a href="#"><img src=<?php echo "$imgdir/car.png" ?>> Tipo de Vehiculo<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/Types/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
									<li><a href="/Types/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
								</ul>
							</li>	
						</ul>
					</li>



					<li><a href="#"><img src=<?php echo "$imgdir/tools.png" ?>> Herramientas</a>
						<ul id="second-level">
							<li><a href="/Tools/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/Tools/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
						</ul>
					</li>



					<li><a href="#"><img src=<?php echo "$imgdir/truck.png" ?>> Camiones Recolectores</a>
						<ul id="second-level">
							<li><a href="/Trips/add"><img src="<?php echo "$imgdir/add.png"?>">Reportar Salida</a></li>
							<li><a href="/Trips/index"><img src="<?php echo "$imgdir/list.png"?>">Ver Viajes</a></li>
						</ul>
					</li>


					<li><a href="#"><img src=<?php echo "$imgdir/maintenance.png" ?>> Mantenimientos</a>
						<ul id="second-level">
							<li><a href="/maintenances/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar</a></li>
							<li><a href="/maintenances/index"><img src="<?php echo "$imgdir/list.png"?>">Ver historial</a></li>
							<li><a href="#"><img src="<?php echo "$imgdir/reg.png"?>">Repuestos<span class="glyphicon glyphicon-play"></span></a>
								<ul id="second-level">
									<li><a href="/parts/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar Repuesto</a></li>
									<li><a href="/parts/index"><img src="<?php echo "$imgdir/list.png"?>">Lista Repuestos</a></li>
								</ul>
							</li>
						<li><a href="#"><img src="<?php echo "$imgdir/tools.png"?>">Herramientas <span class="glyphicon glyphicon-play"></span></a>
							<ul id="second-level">
								<li><a href="/tools/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar Herramienta</a></li>
								<li><a href="/tools/index"><img src="<?php echo "$imgdir/list.png"?>">Lista Herramientas</a></li>
							</ul>
						</li>
						<li><a href="#"><img src="<?php echo "$imgdir/org.png"?>">Tipos de mantenimientos<span class="glyphicon glyphicon-play"></span></a>
							<ul id="second-level">
								<li><a href="/maintenancetypes/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar Tipo</a></li>
								<li><a href="/maintenancetypes/index"><img src="<?php echo "$imgdir/list.png"?>">Ver Tipos</a></li>
							</ul>
						</li>
					</ul>
				</li>


				<li><a href="/dossiers"><img src=<?php echo "$imgdir/reg.png" ?>> Expedientes</a></li>
				<li><a href="#"><img src=<?php echo "$imgdir/prestamo.png" ?>> Prestamos</a>
					<ul id="second-level">
						<li><a href="/requests/add"><img src="<?php echo "$imgdir/add.png"?>">Solicitar vehículo</a></li>
						<li><a href="/requests/index"><img src="<?php echo "$imgdir/list.png"?>">Ver solicitudes</a></li>
					</ul>
				</li>



				<li><a href="#"><img src=<?php echo "$imgdir/reports.png" ?>> Reportes</a>
					<ul id="second-level">
						<li><a href="/logbooks/"><img src="<?php echo "$imgdir/list.png"?>">Bitacora</a></li>
					</ul>
				</li>



				<li><a href="#"><img src=<?php echo "$imgdir/gas.png" ?>> Combustible</a>
					<ul id="second-level">
						<li><a href="/fuelvouchers/add"><img src="<?php echo "$imgdir/add.png"?>">Agregar Vale</a></li>
						<li><a href="/fuelvouchers/index"><img src="<?php echo "$imgdir/list.png"?>">Ver</a></li>
					</ul>
				</li>

				
				<li><a href="/help"><img src=<?php echo "$imgdir/help.png" ?>> Ayuda</a>
				</li>


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
