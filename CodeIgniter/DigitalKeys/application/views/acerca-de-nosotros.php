<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Acerca de Nosotros">
	<meta name="keywords" content="digitalkeys, acerca de nosotros, venta, claves, cd, clave cd">
	<meta http-equiv="Content-Language" content="es">
	<link rel="canonical" href="<?php echo base_url(); ?>">
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

					<?php
					if ($this->session->userdata('isLoggedIn')) {
						printf('<li class="nav-item dropdown no-arrow">
						<a class="nav-link" href="'.base_url() . "User/carrito".'">
							<i class="fas fa-fw fa-shopping-cart tamanio-hud"></i>
							<span class="badge badge-danger badge-counter">'.$cantidadDelCarrito.'</span>
						</a>
					</li>
				
					<li class="nav-item dropdown no-arrow">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						  <span class="mr-2 d-lg-inline text-gray-600">'.$this->cifrado->superdescifrar($this->session->userdata("nick")).' </span>
							<i class="fas fa-fw fa-user tamanio-hud"></i>
						</a>
				
						<div class="dropdown-menu borde-micuenta" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="'.base_url() . "User/miCuenta".'">
								<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
								Perfil
							</a>
							<a class="dropdown-item" href="'.base_url() . "User/misPedidos".'">
								<i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>
								Mis Pedidos
							</a>
							<a class="dropdown-item" href="'.base_url() . "User/whitelist".'">
								<i class="fas fa-heart fa-sm fa-fw mr-2 text-gray-400"></i>
								WhiteList
							</a>
							<a class="dropdown-item" href="'.base_url() . "soporte".'">
								<i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
								Tickets
							</a>
							<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
								<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
								Cerrar Sesión
							</a>
						</div>
					</li>');

					}else{
						printf('<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link" href="'.base_url() . "User/login".'" id="alertsDropdown" role="button">
				<i class="fas fa-fw fa-sign-in-alt"></i>
				Inciar Sesion
				<span class="badge badge-danger badge-counter"></span>
			</a>
		</li>

		<li class="nav-item dropdown no-arrow mx-1">
			<a class="nav-link" href="'.base_url() . "User/registro".'">
				<i class="fas fa-fw fa-address-card"></i>
				Registrarse
			</a>
		</li>');
					}
					?>

					<div class="topbar-divider d-none d-sm-block"></div>

				</div>
            </div>
        </div>
    </nav>

    <div class="divisoria-2"><div class="linea-divisoria-2"></div></div>

    <!--      <nav class="navbar navbar-expand-lg navbar-light bg-gris-oscuro fixed-top">
                        <a class="navbar-brand" href="#"><a href="#page-top"><img class="img-logo" src="img/logo.png" alt="Logo de la empresa" title="Logo"/></a></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav> -->
</header>
<div class="categorias" >
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
							<a class="nav-link" href="<?php echo base_url() . "Productos/categoriaPc"; ?>">
								PC
							</a>
							<ul class="bg-morado-azul-item">
								<!--<div class="divisoria-3"><div class="linea-divisoria-2"></div></div> -->
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/PC-GAMES"; ?>">PC GAMES</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/PC-DLCS"; ?>">DLC's</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="<?php echo base_url() . "Productos/categoriaPsn"; ?>">
								PLAYSTATION
							</a>
							<ul class="bg-morado-azul-item">
								<!--<div class="divisoria-3"><div class="linea-divisoria-2"></div></div> -->
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/PS-GAMES"; ?>">PS GAMES</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/PS-PLUS"; ?>">PSPLUS</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/PS-NOW"; ?>">PSNOW</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="<?php echo base_url() . "Productos/categoriaXbox"; ?>">
								XBOX
							</a>
							<ul class="bg-morado-azul-item">
								<!-- <div class="divisoria-3"><div class="linea-divisoria-2"></div></div> -->
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/XBOX-GAMES"; ?>">XBOX GAMES</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/XBOX-LIVE"; ?>">XBOXLIVE</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="<?php echo base_url() . "Productos/categoriaNintendo"; ?>">
								NINTENDO
							</a>
							<ul class="bg-morado-azul-item">
								<!-- <div class="divisoria-3"><div class="linea-divisoria-2"></div></div> -->
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/NINTENDO-GAMES"; ?>">GAMES</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/NINTENDO-ONLINE"; ?>">ONLINE</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="<?php echo base_url() . "Productos/categoriaHerramientas"; ?>">
								HERRAMIENTAS
							</a>
							<ul class="bg-morado-azul-item">
								<!-- <div class="divisoria-3"><div class="linea-divisoria-2"></div></div> -->
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/CLAVES-WINDOWS"; ?>">CLAVES <br>WINDOWS</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/LICENCIAS"; ?>">LICENCIAS</a>
								<a class="dropdown-item" href="<?php echo base_url() . "Productos/categoriaTipos/OFFICE"; ?>">OFFICE</a>
							</ul>
						</li>
						<li class="nav-item dropdown px-2">
							<a class="nav-link" href="<?php echo base_url() . "Productos/categoriaPromociones"; ?>">
								PROMOCIONES
							</a>
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
				<a class="btn btn-cerrar-sesion" href="<?php echo base_url() . "User/cerrarSesion"; ?>">Cerrar Sesión</a>
			</div>
		</div>
	</div>
</div>
<div class="cuerpo">
    <div class="container espacidado">
        <div class="divisoria-2"><h3 class="titulo-h3">ACERCA DE NOSOTROS</h3><div class="linea-divisoria-4"></div></div>

        <div class="container espacidado">
            <div class="temas-legales">
				<p>
                En Digital Keys.com nos especializamos en suministrar claves de CD – para poder ofrecer los precios más bajos y entrega instantánea a través de nuestro sistema automatizado único de entregas. Nuestro objetivo es ofrecer la mayor cantidad de puntos y suscripciones de Xbox live, tarjetas de Playstation Network y juegos/paquetes de expansión para PC a los mejores precios. Nuestro equipo de gestión tiene más de 20 años de experiencia combinada en la industria con habilidades en atención al cliente profesional y brindar a los clientes los productos al menor precio posible. Debido a nuestra extensa y confiable cadena de suministro y poder de adquisición, en Digital Keys.com tenemos un gran volumen agregado de ventas - ¡y le otorgamos estas reducciones para así ofrecer el mejor precio del mercado!
				</p>
				<p>
                Podemos ofrecer un servicio sin compromisos pues solo nos encargamos del envío digital de claves de CD. La clave de CD es el número de serial o código de producto, conformado por una combinación de letras y números, que se usa para activar un producto y que normalmente se encuentra en una etiqueta dentro del empaque del juego o impreso en la ficha de referencia del mismo. La clave de CD comprada se usa para registrar y activar el juego correspondiente. Dependiendo del producto, suministramos el código digitalizado o en formato de texto.

                Hemos desarrollado un sistema único de entrega de claves de CD que permite una asignación de las mismas automática e instantánea. Una vez que el cliente realiza el pago y este se verifica, la clave de CD aparece en su cuenta de Digital Keys.com y su email, lo que permite a nuestros clientes experimentar un servicio rápido, eficiente y personal – cuando lo deseen.
				</p>
				<p>
                Pago:

                Paypal – Simple, Seguro e Inmediato
                Los precios se muestran en las monedas más importantes dependiendo de su ubicación geográfica, y se cobran en Libras Inglesas (GBP) o Dólares Estadounidenses (USD).
				</p>
				<p>
                Entrega Digital:

                Todos nuestros productos se entregan digitalmente a través de nuestro sistema en líneas en tan solo segundos
                Todas las órdenes están sujetas a verificación de seguridad que podría ocasionar un breve retraso
				</p>
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
				<?php
				if ($this->session->userdata('isLoggedIn')) {
					printf('<h3 class="footer-title">MI CUENTA</h3>
						<div class="footer-items">
						<a href="'.base_url() . "User/miCuenta".'">MI CUENTA</a><br>
						<a href="'.base_url() . "User/misPedidos".'">MIS PEDIDOS</a><br>
						<br>
						</div>');
				}else{
					printf('<h3 class="footer-title">MI CUENTA</h3>
						<div class="footer-items">
						<a href="'.base_url() . "User/login".'">INICIAR SESION</a><br>
						<a href="'.base_url() . "User/registro".'">REGISTRARSE</a><br>
						<br>
						</div>');
				}
				?>
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
