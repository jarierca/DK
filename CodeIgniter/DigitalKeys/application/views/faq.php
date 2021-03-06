<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Preguntas Frecuentes">
	<meta name="keywords" content="digitalkeys, FAQ, preguntas, respuestas, dudas">
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
								Cerrar Sesi??n
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
				<h5 class="modal-title" id="exampleModalLabel">??Deseas salir?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"><i class="fas fa-times"></i></span>
				</button>
			</div>
			<div class="modal-body">Selecciona "Cerrar Sesi??n" para finalizar tu sesi??n actual.</div>
			<div class="modal-footer">
				<button class="btn btn-cancelar" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-cerrar-sesion" href="<?php echo base_url() . "User/cerrarSesion"; ?>">Cerrar Sesi??n</a>
			</div>
		</div>
	</div>
</div>
<div class="cuerpo">
    <div class="container espacidado">
        <div class="divisoria-2"><h3 class="titulo-h3">FAQ</h3><div class="linea-divisoria-4"></div></div>

        <div class="container espacidado">
            <div class="temas-legales">

				<h2>Preguntas m??s frecuentes</h2>
				<div class="espacidado">
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Los c??digos de los CDs son oficiales?<br>
					</h4>
					<p>Es una pregunta que, viendo los precios, surge con frecuencia. Puedes estar seguro, nuestras claves de CD son oficiales, ya que son compradas a distribuidores autorizados: EA Origin, Steam, Battle.net, NCSoft o Ubisoft.<br>
							<br>
							Todas nuestras claves son claves escaneadas de las tarjetas oficiales.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??C??mo puedo descargar un juego? ??Esto es legal?</h4>
					<p>La descarga de juegos es perfectamente legal a trav??s de las plataformas oficiales de EA Origin, Steam, Battle.net, NCSoft o Ubisoft.<br>
							<br>
							S??lo tienes que descargarlos a trav??s de su software disponible en sus p??ginas web oficiales, ya que todos ellos ofrecen ahora descargas legales de juegos.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??C??mo puedo activar una clave de CD?</h4>
					<p>Para activar tu juego simplemente ves a la ficha de dicho juego y haz clic en "Activar este juego en..." para ver una gu??a del proceso para la plataforma en cuesti??n.</p></div>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Tengo que crear una cuenta para comprar un c??digo de CD?</h4>
					<p>S??, por varias razones: principalmente para obtener tu clave de CD directamente en la secci??n "Mis pedidos", pero tambi??n para poder ponerte en contacto con nosotros a trav??s del sistema de tickets, que requiere una identificaci??n.<br>
							<br>
							Para crear una cuenta o iniciar sesi??n, utiliza el panel a la izquierda de la p??gina principal de nuestra web: https://www.instant-gaming.com/<br>
						</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">No me puedo conectar (contrase??a perdida).</h4>
					<p>Si no puedes iniciar sesi??n, puedes recuperar tu contrase??a en esta direcci??n: https://www.instant-gaming.com/es/contrasenas-olvidadas/ Ser?? necesario su correo electr??nico.<br>
							<br>
							Para cualquier otro problema de conexi??n, usa la secci??n "Contacto" .</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Cu??nto tiempo tardar?? en recibir mi c??digo de CD?</h4>
					<p>La recepci??n del c??digo es inmediata, s??lo tienes que ir a la secci??n "Mi cuenta" para ver tu ??ltima clave de CD comprada. Tambi??n podr??s ver todo el historial de tus compras desde la creaci??n de la cuenta.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">La clave de CD que he recibido no funciona.</h4>
					<p>Si la clave de CD recibida no funciona o si el c??digo es dif??cil de leer, abre un ticket en la secci??n "Contacto" para que podamos encontrar el origen del problema.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Hay una fecha l??mite para utilizar mi clave de CD?</h4>
					<p>??No! No hay l??mite de tiempo, as?? que puedes utilizarlo cuando lo desees, o lo puedes usar para hacer un buen regalo.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Las claves son v??lidas en todos los pa??ses?</h4>
					<p>No, los editores est??n sometidos a una pol??tica de regulaci??n de importaci??n/exportaci??n de los juegos. Los c??digos a veces son objeto de una restricci??n nacional, pero no siempre es el caso. Puedes ver esta informaci??n en la p??gina de cada juego antes de comprarlo.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Es posible un reembolso?</h4>
					<p>Teniendo en cuenta la naturaleza de las claves de CD que vendemos, es posible hacer un reembolso, pero puede que necesitemos un plazo de 10 d??as para comprobar que el c??digo no haya sido utilizado.</p>
					<h4 class="espacidado" style="text-shadow: 0 0 9px rgba(255,255,255,.7);">??Cu??ntas veces puedo descargar un juego?</h4>
					<p>Una vez que la clave de CD est?? activada en tu cuenta, puedes volver a descargarlo tantas veces como desees (salvo si se indica lo contrario en la plataforma de descarga). Aseg??rate de conectarte con la misma cuenta utilizada para validar la clave de CD.</p>

					<h2 class="espacidado">??C??mo funciona?</h2>
					<h5>1 ??Por qu?? son tan bajos nuestros precios?</h5>
					<p class="ig-about-p">Instant Gaming es sobre todo un grupo de jugadores apasionados, de los que hac??an las largas colas de las grandes tiendas para gastarse sus ahorros y comprarse el ??ltimo juego que hubiese salido al mercado.<br><br>Como gamers, nuestra prioridad es ofrecerte un acceso inmediato a los mejores juegos y, sobre todo, a los mejores precios. Gracias a los juegos en formato electr??nico, recortamos considerablemente los gastos de almacenaje f??sico y de log??stica. Adem??s, adquirimos los juegos en grandes cantidades. Todo esto nos permite ofrecer estos precios.</p>
					<h5>2 ??C??mo funciona? ??Juega sin tener que desplazarte!</h5>
					<div style="padding: 25px">
						<h6>2.1 Plataformas oficiales</h6>
						<p>Obt??n el c??digo en unos segundos y v??lida la clave del CD oficial comprado en nuestra web:</p>
						<img style="padding: 25px" src="https://s3.gaming-cdn.com/themes/igv1/modules/faq/images/ig-about-platform.png">
						<h6>2.2 R??pido</h6>

						<p>Descarga tus juegos legalmente a trav??s de plataformas como Steam, Origin, Uplay ...</p>
						<img style="padding: 25px" src="https://s3.gaming-cdn.com/themes/igv1/modules/faq/images/ig-about-speed.png">
						<h6>2.3 No es caro</h6>

						<p>??Juega inmediatamente en tu PC habiendo ahorrado hasta un 80% dependiendo del juego!</p>
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
					<a href="<?php echo base_url() . "politicadeprivacidad"; ?>">POL??TICA DE PRIVACIDAD</a><br>
					<a href="<?php echo base_url() . "terminosycondiciones"; ?>">T??RMINOS Y CONDICIONES</a><br>
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
