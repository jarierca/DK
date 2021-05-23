<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!$this->session->userdata('isLoggedIn')) {
	$uri = base_url() . 'User/login';
	redirect($uri);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Tu Perfil">
	<meta name="keywords" content="digitalkeys, perfil, datos">
	<meta http-equiv="Content-Language" content="es">
    <link rel="icon" href="<?php echo base_url()."assets/"; ?>img/logo4.png">
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div id="page-top">&nbsp; </div>
<header class="barra-navegacion pt-2 fixed-top">
    <nav class="navbar navbar-expand  topbar mb-2">
        <div class="barra-principal">
            <div class=" row mx-auto">

                <a class="navbar-brand" href="<?php echo base_url(); ?>"><img class="img-logo" src="<?php echo base_url()."assets/"; ?>img/logo2.png" alt="Logo de la empresa" title="Logo"/></a>

                <form class="d-none d-md-inline-block form-inline mt-3 mw-100 navbar-search barra-busqueda" action="<?php echo base_url() . "Productos/buscar"; ?>" method="post">
                    <div class="input-group" data-children-count="1">
                        <input type="text" id="buscar" name="buscar" class="form-control borde-buscar bg-light border-0 small" placeholder="Buscar">
                        <div class="input-group-append btn-lupa">
                            <button class="btn" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <div class="navbar-nav barra-botones">

                    <li class="nav-item dropdown no-arrow d-md-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>

						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search" action="<?php echo base_url() . "Productos/buscar"; ?>" method="post">
								<div class="input-group" data-children-count="1">
									<input type="text" class="form-control bg-light border-0 small" id="buscar" name="buscar" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2">
									<div class="input-group-append">
										<button class="btn bg-light" type="submit">
											<i class="fas fa-search fa-sm"></i>
										</button>
									</div>
								</div>
							</form>
						</div>
                    </li>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link" href="<?php echo base_url() . "User/carrito"; ?>">
                            <i class="fas fa-fw fa-shopping-cart tamanio-hud"></i>
							<span class="badge badge-danger badge-counter"><?php echo $cantidadDelCarrito; ?></span>
                        </a>
                    </li>

					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<span class="mr-2 d-lg-inline text-gray-600"><?php echo $this->cifrado->superdescifrar($this->session->userdata('nick')); ?></span>
							<i class="fas fa-fw fa-user tamanio-hud"></i>
						</a>

						<div class="dropdown-menu borde-micuenta" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="<?php echo base_url() . "User/miCuenta"; ?>">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Perfil
							</a>
							<a class="dropdown-item" href="<?php echo base_url() . "User/misPedidos"; ?>">
								<i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
								Mis Pedidos
							</a>
							<a class="dropdown-item" href="<?php echo base_url() . "User/whitelist"; ?>">
								<i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i>
								WhiteList
							</a>
							<a class="dropdown-item" href="<?php echo base_url() . "soporte"; ?>">
								<i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
								Tickets
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
				<a class="btn btn-cerrar-sesion" href="<?php echo base_url() . "User/cerrarSesion"; ?>">Cerrar Sesión</a>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="bajaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content bg-morado">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">¿Deseas darse de baja?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fas fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">Estas seguro que deseas darse de baja lo y borras todos tus datos. (Esta acción no se podra revertir).</div>
			<div class="modal-footer">
				<button class="btn btn-cancelar" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-cerrar-sesion" href="<?php echo base_url() . "User/darseDeBaja"; ?>">Darse de Baja</a>
			</div>
		</div>
	</div>
</div>
<div class="cuerpo mt-5">
    <div class="container text-center mt-5">

		<div class="mt-5 mb-4">
			<h1 class="h3 mb-0 text-gray-800">Tu Perfil</h1>
		</div>

		<div class="row justify-content-center align-self-center mt-4 mb-4">
			<a href="<?php echo base_url() . "User/modificarDatosVista"; ?>" class="btn-whitelist btn-icon-split btn-sm">
			  <span class="icon text-white-50">
				<i class="fas fa-edit"></i>
			  </span>
				<span class="text">Editar Datos</span>
			</a>

			<a href="<?php echo base_url() . "User/modificarPassVista"; ?>" class="btn-whitelist btn-icon-split btn-sm">
			  <span class="icon text-white-50">
				<i class="fas fa-edit"></i>
			  </span>
				<span class="text">Editar Contraseña</span>
			</a>

			<a href="#" class="btn-whitelist btn-icon-split btn-sm" data-toggle="modal" data-target="#bajaModal">
			  <span class="icon text-white-50">
				<i class="fas fa-edit"></i>
			  </span>
				<span class="text">Darse de Baja</span>
			</a>
		</div>


		<div class="row pt-4 justify-content-center align-self-center">

			<div class="info-perfil">
				<div class="card border-left-primary shadow h-100 py-2 btn-whitelist">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold verde-perfil text-uppercase mb-1">Nick</div>
								<div class="cuadro-perfil-tamanio h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->cifrado->superdescifrar($this->session->userdata('nick')); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-user fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="info-perfil">
				<div class="card border-left-success shadow h-100 py-2 btn-whitelist">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold verde-perfil text-uppercase mb-1">Nombre</div>
								<div class="cuadro-perfil-tamanio h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->cifrado->superdescifrar($this->session->userdata('nombre')); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-address-book fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="info-perfil">
				<div class="card border-left-info shadow h-100 py-2 btn-whitelist">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold verde-perfil text-uppercase mb-1">Primer Apellido</div>
								<div class="cuadro-perfil-tamanio h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->cifrado->superdescifrar($this->session->userdata('apellido1')); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-address-book fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="info-perfil">
				<div class="card border-left-info shadow h-100 py-2 btn-whitelist">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold verde-perfil text-uppercase mb-1">Segundo Apellido</div>
								<div class="cuadro-perfil-tamanio h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->cifrado->superdescifrar($this->session->userdata('apellido2')); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-address-book fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="info-perfil">
				<div class="card border-left-warning shadow h-100 py-2 btn-whitelist">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold verde-perfil text-uppercase mb-1">Email</div>
								<div class="cuadro-perfil-tamanio h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->cifrado->superdescifrar($this->session->userdata('mail')); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-envelope fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="info-perfil">
				<div class="card border-left-primary shadow h-100 py-2 btn-whitelist">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold verde-perfil text-uppercase mb-1">Telefono</div>
								<div class="cuadro-perfil-tamanio h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->cifrado->superdescifrar($this->session->userdata('telefono')); ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-mobile-alt fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
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
                    <a href="<?php echo base_url() . "User/miCuenta"; ?>">MI CUENTA</a><br>
                    <a href="<?php echo base_url() . "User/misPedidos"; ?>">MIS PEDIDOS</a><br>
                    <br>
                </div>
            </div>
            <div class="footer-main-3">
                <h3 class="footer-title">AYUDA</h3>
                <div class="footer-items">
                    <a href="<?php echo base_url() . "FAQ"; ?>">FAQ</a><br>
                    <a href="<?php echo base_url() . "soporte"; ?>">SOPORTE</a><br>
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
