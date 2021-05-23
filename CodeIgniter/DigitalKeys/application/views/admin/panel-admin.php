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
    <title>Inicio -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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

</header>
<div class="categorias">
	<div class="divisoria-2"><div class="linea-divisoria-2"></div></div>
	<nav class="navbar navbar-expand-lg mb-1">
		<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars burger"></i>
		</button>
		<div class="barra-secundaria collapse navbar-collapse" id="navbarSupportedContent">
			<div class="container flex">
				<div class="row mx-auto">
					<ul class="navbar-nav">
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="#usuarios">
								Usuario
							</a>
							<ul class="bg-morado-azul-item">
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/anadirUsuarioVista"; ?>">Añadir</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/modificarUsuarioVista"; ?>">Modificar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/eliminarUsuarioVista"; ?>">Borrar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/verUsuarios"; ?>">Ver</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="#vendedores">
								Vendedores
							</a>
							<ul class="bg-morado-azul-item">
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/anadirVendedorVista"; ?>">Añadir</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/modificarVendedorVistaDatos"; ?>">Modificar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/eliminarVendedorVista"; ?>">Borrar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/verVendedores"; ?>">Ver</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="#productos">
								Productos
							</a>
							<ul class="bg-morado-azul-item">
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/anadirProductoVista"; ?>">Añadir</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/modificarProductoVista"; ?>">Modificar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/eliminarProductoVista"; ?>">Borrar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/verProductos"; ?>">Ver</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="#admins">
								Admins
							</a>
							<ul class="bg-morado-azul-item">
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/anadirAdminVista"; ?>">Añadir</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/modificarAdminVista"; ?>">Modificar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/eliminarAdminVista"; ?>">Borrar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/verAdmins"; ?>">Ver</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="#banner">
								Banner
							</a>
							<ul class="bg-morado-azul-item">
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/anadirBannerVista"; ?>">Añadir</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/modificarBannerVista"; ?>">Modificar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/eliminarBannerVista"; ?>">Borrar</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/verBanner"; ?>">Ver</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="#keys">
								Keys
							</a>
							<ul class="bg-morado-azul-item">
								<a class="dropdown-item" href="<?php echo base_url() . "Admin/anadirKeyVistaSeleccion"; ?>">Añadir</a>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<div class="divisoria-2"><div class="linea-divisoria-2"></div></div>
</div>
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
<div class="cuerpo espacidado">
    <div class="container-fluid pl-5 pr-5">

		<div id="usuarios" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Usuarios</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirUsuarioVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Usuario</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-user text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/modificarUsuarioVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Modificar Usuario</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-pen text-gray-300"></i>
								<i class="fas fa-user text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/eliminarUsuarioVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Eliminar Usuario</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-minus text-gray-300"></i>
								<i class="fas fa-user text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/verUsuarios"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Ver Usuarios</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-eye text-gray-300"></i>
								<i class="fas fa-user text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="vendedores" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Vendedores</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirVendedorVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Vendedor</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-store text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/modificarVendedorVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Modificar Vendedor</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-pen text-gray-300"></i>
								<i class="fas fa-store text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/eliminarVendedorVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Eliminar Vendedor</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-minus text-gray-300"></i>
								<i class="fas fa-store text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/verVendedores"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Ver Vendedores</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-eye text-gray-300"></i>
								<i class="fas fa-store text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="productos" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Productos</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirProductoVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Producto</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-key text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/modificarProductoVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Modificar Producto</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-pen text-gray-300"></i>
								<i class="fas fa-key text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/eliminarProductoVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Eliminar Producto</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-minus text-gray-300"></i>
								<i class="fas fa-key text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/verProductos"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Ver Productos</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-eye text-gray-300"></i>
								<i class="fas fa-key text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="admins" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Admins</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirAdminVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Admin</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-user-tie text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/modificarAdminVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Modificar Admin</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-pen text-gray-300"></i>
								<i class="fas fa-user-tie text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/eliminarAdminVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Eliminar Admin</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-minus text-gray-300"></i>
								<i class="fas fa-user-tie text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/verAdmins"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Ver Admins</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-eye text-gray-300"></i>
								<i class="fas fa-user-tie text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="banner" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Banner</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirBannerVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Banner</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/modificarBannerVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Modificar Banner</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-pen text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/eliminarBannerVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Eliminar Banner</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-minus text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/verBanner"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Ver Banners</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-eye text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="promociones" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Promociones</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirPromocionesVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Promociones</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/modificarPromocionesVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Modificar Promociones</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-pen text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/eliminarPromocionesVista"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Eliminar Promociones</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-minus text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/verPromociones"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Ver Promociones</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-eye text-gray-300"></i>
								<i class="fas fa-images text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="keys" class="divisoria-2 centrar-txt"><h3 class="titulo-h3">Keys</h3><div class="linea-divisoria-4"></div></div>
		<div class="row espacidado">

			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="mod row no-gutters align-items-center">
							<div class="col mr-2 btn-carrito verde-perfil">
								<a href="<?php echo base_url() . "Admin/anadirKeyVistaSeleccion"; ?>" class="h5 mb-0 font-weight-bold btn btn-user">
									<span class="text">Añadir Key</span>
								</a>
							</div>
							<div class="col-auto">
								<i class="fas fa-plus text-gray-300"></i>
								<i class="fas fa-key"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="espacidado"></div>
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
