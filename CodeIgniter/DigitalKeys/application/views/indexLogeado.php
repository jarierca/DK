<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!$this->session->userdata('isLoggedIn')) {
	$uri = base_url() . '/User/login';
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

                <a class="navbar-brand" href="<?php echo base_url(); ?>#page-top"><img class="img-logo" src="<?php echo base_url()."assets/"; ?>img/logo2.png" alt="Logo de la empresa" title="Logo"/></a>

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
                        </a>
                    </li>

                    <li class="nav-item dropdown no-arrow">
                        <!-- <a class="nav-link" href="">
                            <i class="fas fa-fw fa-user tamanio-hud"></i>
                        </a> -->
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
							<a class="dropdown-item" href="'.base_url() . "User/soporte".'">
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
<div id="carusel" class="container mt-4">
    <div id="carruselInicio" class="container carousel slide col-xl-14" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carruselInicio" data-slide-to="0" class="active"></li>
            <li data-target="#carruselInicio" data-slide-to="1"></li>
            <li data-target="#carruselInicio" data-slide-to="2"></li>
            <li data-target="#carruselInicio" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="#juegosPor20Euros"><img src="<?php echo base_url()."assets/"; ?>img/carusel/juegos-por-20-euros.png" class="d-block w-100" alt="Oferta de juegos a 20 euros" title="Juegos por 20€"></a>
            </div>
            <div class="carousel-item">
                <a href="#JuegosRPG"><img src="<?php echo base_url()."assets/"; ?>img/carusel/oferta-rpg.png" class="d-block w-100" alt="Descubre los juegos RPG" title="Juegos RPG"></a>
            </div>
            <div class="carousel-item">
                <a href="#juegosSuperheroes"><img src="<?php echo base_url()."assets/"; ?>img/carusel/descuentos-superheroes.png" class="d-block w-100" alt="Descuentos en juegos de superheroes" title="Descuentos en superheroes"></a>
            </div>
            <div class="carousel-item">
                <a href="#JuegosSteam"><img src="<?php echo base_url()."assets/"; ?>img/carusel/juegos-steam.png" class="d-block w-100" alt="Juegos para Steam" title="Juegos de Steam"></a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carruselInicio" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carruselInicio" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<div class="cuerpo">
    <div class="container">
        <div class="divisoria-2"><h3 class="titulo-h3">LO MÁS VENDIDO</h3><div class="linea-divisoria-4"></div></div>

        <div class="container espacidado">
            <div class="row justify-content-center align-self-center">
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/cyberpunk-2077.jpg" height="340" width="240"/><h6>CYBERPUNK 2077 PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/gta5premiumbase2.jpg" height="340" width="240"/><h6>GRAND THEFT AUTO V 5 (GTA 5): PREMIUM ONLINE EDITION PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/cyberpunk-2077.jpg" height="340" width="240"/><h6>CYBERPUNK 2077 PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/gta5premiumbase2.jpg" height="340" width="240"/><h6>GRAND THEFT AUTO V 5 (GTA 5): PREMIUM ONLINE EDITION PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
            </div>
            <div class="row justify-content-center align-self-center">
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/cyberpunk-2077.jpg" height="340" width="240"/><h6>CYBERPUNK 2077 PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/gta5premiumbase2.jpg" height="340" width="240"/><h6>GRAND THEFT AUTO V 5 (GTA 5): PREMIUM ONLINE EDITION PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/cyberpunk-2077.jpg" height="340" width="240"/><h6>CYBERPUNK 2077 PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
                <div class="cuadro"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/gta5premiumbase2.jpg" height="340" width="240"/><h6>GRAND THEFT AUTO V 5 (GTA 5): PREMIUM ONLINE EDITION PC</h6><div class="precio"><div class="divisoria-2"><div class="linea-divisoria-2"></div></div><br>49,97€<button type="button" class="btn-carrito"><i class="fas fa-fw fa-shopping-cart"></i></button><button type="button" class="btn-whitelist"><i class="fas fa-heart"></i></button><div class="antes2"><b class="antes">79,99€</b></div></div></div>
            </div>
        </div>

        <div class="espacidado"></div>

        <div class="divisoria-2 pt-4 pb-4"><h3 class="titulo-h3">ÚLTIMAS VALORACIONES</h3><div class="linea-divisoria-4"></div></div>
        <div class="reseña">
            <div class="container">
                <div class="flex pt-5"><img src="<?php echo base_url()."assets/"; ?>img/productos/juegos/gta5premiumbase2.jpg" height="340" width="240"/>
                    <div class="px-5">
                        GRAND THEFT AUTO V 5 (GTA 5): PREMIUM ONLINE EDITION PC<br>
                        <div class="fecha-usuario-reseña">25/03/21 - Jarierca</div>
                        <div class="descripcion-reseña px-2 pt-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse justo ipsum, egestas in pulvinar
                            sit amet, aliquet eget est. Nam ultricies, justo eget fermentum tempus, felis est sollicitudin dolor,
                            eu finibus nibh neque quis urna. Proin placerat dolor sit amet rhoncus feugiat. Morbi quis pulvinar
                            justo. Donec volutpat dui congue odio imperdiet accumsan mattis ac tortor. Vivamus auctor massa turpis,
                            a hendrerit ligula elementum at. Duis pharetra tortor eu nibh vehicula, a tristique turpis eff
                        </div>
                    </div>
                </div>
                <div class="freebirdMaterialHeaderbannerSectionTriangleContainer clearfix">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 10 10" preserveAspectRatio="none" class="freebirdMaterialHeaderbannerSectionTriangle">
                        <polygon class="freebirdSolidFill" points="0,10 10,0 100,10"></polygon>
                    </svg>
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
				<?php
				if ($this->session->userdata('isLoggedIn')) {
					printf('<h3 class="footer-title">MI CUENTA</h3>
						<div class="footer-items">
						<a href="<?php echo base_url() . "User/miCuenta"; ?>">MI CUENTA</a><br>
						<a href="<?php echo base_url() . "User/misPedidos"; ?>">MIS PEDIDOS</a><br>
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
