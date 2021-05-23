<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!$this->session->userdata('isLoggedIn') || !$this->session->userdata('isAdminLoggedIn')) {
	$uri = base_url() . 'Admin/loginadmin';
	redirect($uri);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="icon" href="<?php echo base_url()."assets/"; ?>img/logo4.png">
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/estilos.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function validarModificacion(){

			valor = document.getElementById("NickMod").value;
			if(valor.length == 0){
				alert("Falta el nick");
				return false;
			}

			valor = document.getElementById("NameMod").value;
			if(valor.length == 0){
				alert("Falta el nombre");
				return false;
			}

			valor = document.getElementById("LastMod1").value;
			if(valor.length == 0){
				alert("Falta el primer apellido");
				return false;
			}

			valor = document.getElementById("LastMod2").value;
			if(valor.length == 0){
				alert("Falta el segundo apellido");
				return false;
			}

			valor = document.getElementById("TelefonoMod").value;
			if(valor.length == 0){
				alert("Falta el telefono");
				return false;
			}

			valor = document.getElementById("EmailMod").value;
			if(valor.length == 0){
				alert("Falta el mail");
				return false;
			}

			return true;
		}
	</script>
</head>
<body>
<div id="page-top">&nbsp; </div>
<header class="barra-navegacion pt-2 fixed-top">
	<nav class="navbar navbar-expand  topbar mb-2">
		<div class="barra-principal">
			<div class=" row mx-auto">

				<a class="navbar-brand" href="<?php echo base_url() . "Admin/inicioAdmin"; ?>#page-top"><img class="img-logo" src="<?php echo base_url()."assets/"; ?>img/logo2.png" alt="Logo de la empresa" title="Logo"/></a>

				<div class="navbar-nav barra-botones">

					<li class="nav-item dropdown no-arrow">
						<a class="nav-link" href="<?php echo base_url() . "Admin/soporte"; ?>">
							<i class="fas fa-fw fa-envelope tamanio-hud"></i>
						</a>
					</li>

					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<span class="mr-2 d-lg-inline text-gray-600"><?php echo $this->cifrado->superdescifrar($this->session->userdata('nick')); ?></span>
							<i class="fas fa-fw fa-user tamanio-hud"></i>
						</a>

						<div class="dropdown-menu borde-micuenta" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="<?php echo base_url() . "Admin/miCuentaAdmin"; ?>">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Perfil
							</a>
							<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Cerrar Sesión
							</a>
						</div>
					</li>

					<div class="topbar-divider d-none d-sm-block"></div>

				</div>
			</div>
		</div>
	</nav>

	<div class="divisoria-2"><div class="linea-divisoria-2"></div></div>

</header>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content bg-morado">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">¿Deseas salir?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fas fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">Selecciona "Cerrar Sesión" para finalizar tu sesión actual.</div>
			<div class="modal-footer">
				<button class="btn btn-cancelar" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-cerrar-sesion" href="<?php echo base_url() . "Admin/cerrarSesion"; ?>">Cerrar Sesión</a>
			</div>
		</div>
	</div>
</div>
<div class="cuerpo mt-5">
	<div class="container text-center mt-5">

		<div class="mt-5 mb-4">
			<h1 class="h3 mb-0 text-gray-800">Modificar Datos</h1>
		</div>

		<div class="mod container-fluid">
			<form name="formularioModificar"class="user" method="post" action="<?php echo base_url() . "Admin/modificarDatos"; ?>" onsubmit="return validarModificacion()">
				<div class="form-group">
					Nick
					<input type="text" class="form-control-2 form-control-user mt-2" id="NickMod" name="NickMod" placeholder="Este campo no se puede modificar" value="<?php echo $this->cifrado->superdescifrar($this->session->userdata('nick')); ?>" readonly=readonly>
				</div>

				<div class="form-group">
					Nombre
					<input type="text" class="form-control-2 form-control-user mt-2" id="NameMod" name="NameMod" placeholder="Nombre" value="<?php echo $this->cifrado->superdescifrar($this->session->userdata('nombre')); ?>">
				</div>

				Apellidos
				<div class="form-group row">
					<div class="col-sm-6">
						<input type="text" class="form-control-2 form-control-user mt-2" id="LastMod1" name="LastMod1" placeholder="Primer Apellido" value="<?php echo $this->cifrado->superdescifrar($this->session->userdata('apellido1')); ?>">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control-2 form-control-user mt-2" id="LastMod2" name="LastMod2" placeholder="Segundo Apellido" value="<?php echo $this->cifrado->superdescifrar($this->session->userdata('apellido2')); ?>">
					</div>
				</div>

				<div class="form-group">
					Correo Electronico
					<input type="email" class="form-control-2 form-control-user mt-2" id="EmailMod" name="EmailMod" placeholder="Correo Electronico" value="<?php echo $this->cifrado->superdescifrar($this->session->userdata('mail')); ?>">
				</div>

				<div class="form-group">
					Telefono
					<input type="text" class="form-control-2 form-control-user mt-2" id="TelefonoMod" name="TelefonoMod" placeholder="Teléfono" value="<?php echo $this->cifrado->superdescifrar($this->session->userdata('telefono')); ?>">
				</div>

				<div class="d-sm-flex align-items-center justify-content-center mb-4">
					<a  class="btn-carrito verde-perfil btn-icon-split btn-sm">
						<span class="icon text-white-50">
							 <i class="fas fa-save"></i>
						</span>
						<span class="text">
						 	<input type="submit" class="btn btn-user" id="enviar" name="enviar" value="Guardar datos">
						</span>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<footer class="foot">
	<div class="container">
		<div class="footer-main-content">
			<div class="footer-main-1">
				<h3 class="footer-title">DigitalKeys</h3>
				<div class="footer-items">
					<a href="<?php echo base_url() . "acercadenosotros"; ?>">ACERCA DE NOSOTROS</a><br>
					<a href="<?php echo base_url() . "politicadeprivacidad"; ?>">POLÍTICA DE PRIVACIDAD</a><br>
					<a href="<?php echo base_url() . "terminosycondiciones"; ?>">TÉRMINOS Y CONDICIONES</a><br>
				</div>
			</div>
			<div class="footer-main-2">
				<h3 class="footer-title">MI CUENTA</h3>
				<div class="footer-items">
					<a href="<?php echo base_url() . "Admin/miCuentaAdmin"; ?>">MI CUENTA</a><br>
					<br>
					<br>
				</div>
			</div>
			<div class="footer-main-3">
				<h3 class="footer-title">AYUDA</h3>
				<div class="footer-items">
					<a href="<?php echo base_url() . "FAQ"; ?>">FAQ</a><br>
					<a href="<?php echo base_url() . "Admin/soporte"; ?>">SOPORTE</a><br>
					<br>
				</div>
			</div>
		</div>
		<div class="divisoria"><div class="linea-divisoria"></div></div>
		<div id="redes">
			<h4>Siguenos en</h4>
			<a class="btn-red btn-social" href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
			<a class="btn-red btn-social" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
			<a class="btn-red btn-social" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
		</div>
		<div class="divisoria"><div class="linea-divisoria"></div></div>
		<div id="copyright" >Copyright &copy; 2021 DigitalKeys - All rights reserved</div>
	</div>
</footer>
</body>
</html>
