<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Terminos y Condiciones">
	<meta name="keywords" content="digitalkeys, condiciones, condición, venta, claves, cd, clave cd">
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
        <div class="divisoria-2"><h3 class="titulo-h3">TÉRMINOS Y CONDICIONES</h3><div class="linea-divisoria-4"></div></div>

        <div class="container espacidado">
            <div class="temas-legales"style="vertical-align: inherit;">
                Versión 2.1, última modificación 2021-01-21
                <ol>
                    <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Provisiones generales</font></font></strong>
                        <ol>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estos Términos y condiciones, junto con la Política de privacidad y cualquier otra documentación del sitio web, tienen como objetivo proporcionar información sobre Digital Keys, proporcionar a los usuarios y proveedores las reglas sobre el comportamiento aceptable en el sitio web y establecer pautas básicas para las personas que operan a través del sitio web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">El sitio web es un lugar en línea que proporciona a los entusiastas de los videojuegos un espacio seguro para conectarse y comprar diversos contenidos relacionados con los juegos, ofrecidos por los proveedores u otros usuarios que participan en el sitio web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tenga en cuenta que el sitio web no es una tienda en línea, sino una plataforma en línea y todas las transacciones se llevan a cabo entre los usuarios, o entre los usuarios y los proveedores, mientras que Digital Keys, a menos que se indique expresamente lo contrario, no se dedica a la venta o compra de contenido digital o productos físicos.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Para evitar dudas:
                            </font></font><ol>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">las ventas realizadas a través del sitio web se realizan entre los respectivos usuarios, o entre usuarios y proveedores, mientras que Digital Keys solo proporciona servicios secundarios relacionados con el establecimiento y mantenimiento del sitio web y la prestación de servicios adicionales relacionados con garantizar una experiencia fluida y segura para los usuarios y proveedores;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">estos Términos y Condiciones establecen las relaciones contractuales entre Digital Keys y los Usuarios, y entre Digital Keys y los Proveedores en relación con la administración del Sitio Web por parte de Digital Keys;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">estos Términos y Condiciones no rigen las relaciones entre Usuarios o entre Usuarios y Proveedores;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">estos Términos y Condiciones no rigen los términos de uso para recibir y realizar pagos a través del sitio web. </font><font style="vertical-align: inherit;">Las instrucciones para realizar pagos a través del sitio web se pueden encontrar </font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> . </font><font style="vertical-align: inherit;">Estas instrucciones son parte integral de los Términos y Condiciones. </font><font style="vertical-align: inherit;">Además, tenga en cuenta que Digital Keys utiliza los servicios de pago de Hyperwallet para ayudar en las transacciones realizadas entre Usuarios o entre Usuarios y Proveedores. </font><font style="vertical-align: inherit;">Dichos servicios de pago están sujetos a los </font></font><a href="https://www.hyperwallet.com/agreements-terms" target="_blank" rel="noreferrer noopener nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Términos de servicio de </font></font></a><font style="vertical-align: inherit;"></font><a href="https://www.hyperwallet.com/agreements-privacy" target="_blank" rel="noreferrer noopener nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hyperwallet</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> y la </font><a href="https://www.hyperwallet.com/agreements-privacy" target="_blank" rel="noreferrer noopener nofollow"><font style="vertical-align: inherit;">Política de privacidad de Hyperwallet</font></a><font style="vertical-align: inherit;"> ;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En particular, estos Términos y Condiciones no establecen los términos de transacciones específicas que se celebran entre Usuarios, o Usuarios y Proveedores, tales como: precio de compra, contenido y calidad del Contenido Digital, disposiciones de seguridad, garantía y responsabilidad relacionadas con la venta de Contenido Digital. a través del sitio web. </font><font style="vertical-align: inherit;">Digital Keys no verifica la veracidad y exactitud de los datos proporcionados por Usuarios y Proveedores.
                                </font></font></li>
                            </ol>
                            </li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No obstante lo anterior, únicamente con el propósito de mantener la marca Digital Keys, asegurar el buen funcionamiento del Sitio Web y evitar prácticas desleales y actividades ilegales en el Sitio Web, Digital Keys se reserva el derecho de establecer pautas generales relacionadas con la venta y compra de contenido digital o productos físicos. a través del sitio web.
                            </font></font></li>
                            <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los términos para la venta y compra de productos físicos relacionados con los juegos a través del sitio web se proporcionan en un </font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Anexo</font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> separado </font><font style="vertical-align: inherit;">de estos Términos y Condiciones, que forma parte inseparable del mismo. </font><font style="vertical-align: inherit;">En caso de discrepancias entre los Términos y Condiciones y el Programa, prevalecerán las disposiciones del Programa con respecto a las transacciones de productos físicos.</font></font></strong>
                            </li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tenga en cuenta que estos Términos y condiciones pueden cambiar de vez en cuando de acuerdo con el procedimiento proporcionado en la Sección 3.6 a continuación. </font><font style="vertical-align: inherit;">Digital Keys recomienda encarecidamente a los Usuarios y Proveedores que lean los Términos y Condiciones de vez en cuando para familiarizarse completamente con los términos particulares vigentes en cada momento.
                            </font></font></li>
                        </ol>
                    </li>
                    <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Definiciones</font></font></strong>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cuenta</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> : una cuenta que brinda la posibilidad al Usuario o al Proveedor de utilizar los Servicios provistos en el Sitio Web y obtener todos los beneficios de él.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contenido</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> digital: contenido digital que tiene el código de activación y solo se puede usar después de que se active en la plataforma informática del Usuario u otro contenido digital ofrecido para la compra por los Proveedores a través del sitio web.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="">Digital Keys</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class=""> - UAB Helis play, con domicilio social en Gyneju St. 4-333, Vilnius, República de Lituania.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Política de privacidad</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> &nbsp;: reglas que establecen los datos personales y los procesos de protección de la privacidad que aplica Digital Keys.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contrato de venta</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> &nbsp;: cualquier contrato entre el Usuario y el Vendedor que obliga al Vendedor a transferir el acceso al Contenido digital al Usuario y el Usuario a pagar el precio del mismo.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Servicio</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> &nbsp;: uno de los servicios que proporciona Digital Keys como se describe en estos Términos y Condiciones.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Términos y condiciones</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> &nbsp;: este conjunto de reglas que determina los derechos y obligaciones de los usuarios, proveedores y Digital Keys y los términos que regulan el uso del sitio web.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> : una persona física que actúa en relación con estos Términos y condiciones para fines distintos a su comercio, negocio, oficio o profesión (es decir, consumidor), y ha registrado una Cuenta en el Sitio web y (o) tiene la intención de comprar Contenido digital, o comprar o vender productos físicos mediante el uso de los Servicios proporcionados por Digital Keys.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Proveedor</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> : un empresario que opera en cualquier forma que vende contenido digital a los usuarios a través del sitio web.
                        </font></font></p>
                        <p>
                            <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sitio web</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> &nbsp;: un sitio web que está disponible en Internet con la dirección: </font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .
                        </font></font></p>
                    </li>
                    <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aplicabilidad de estos términos y condiciones</font></font></strong>
                        <ol>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios y proveedores acuerdan y aceptan estos Términos y condiciones, incluida la Política de privacidad, en su totalidad y sin reservas. </font><font style="vertical-align: inherit;">La aceptación de estos Términos y Condiciones es una condición necesaria para la prestación de los Servicios.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Para evitar dudas, estos Términos y Condiciones también son aplicables a cualquier usuario anónimo que ingrese al Sitio Web y, al ingresar, dichas personas aceptan estos Términos y Condiciones, la Política de Privacidad y cualquier otra documentación del Sitio Web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Se solicita a los usuarios que tienen prohibido el uso del sitio web debido a las regulaciones de las restricciones estatales o regionales respectivas, incluido el país / región de residencia actual del usuario y el lugar de uso de los servicios, que se abstengan de usar el sitio web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cada Usuario confirma que tiene al menos 16 (dieciséis) años o ha alcanzado la edad según las leyes del país respectivo, lo que le permite asumir la responsabilidad de las obligaciones que surgen de las relaciones contractuales y tiene plena capacidad para emprender acciones legales. </font><font style="vertical-align: inherit;">Además, cada Usuario confirma que no existen restricciones en virtud de las leyes de los respectivos países para utilizar los Servicios proporcionados por Digital Keys.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cada Proveedor confirma que es un empresario y acepta estos Términos y Condiciones. </font><font style="vertical-align: inherit;">Cada Proveedor declara por la presente que no existen fundamentos fácticos o legales que les impidan aceptar estos Términos y Condiciones y celebrar Contratos de Venta con los Usuarios a través del Sitio Web destinados a la venta de Contenido Digital a los Usuarios.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Digital Keys tiene derecho a realizar cambios y modificaciones a estos Términos y Condiciones, incluido el derecho a extraer nuevas disposiciones y retirar las antiguas, a su propia discreción, de forma unilateral y en cualquier momento mediante el anuncio de las modificaciones de los Términos y Condiciones en el Sitio Web. . </font><font style="vertical-align: inherit;">Al seguir utilizando el sitio web y los servicios, los usuarios y proveedores confirman que están sujetos a todos los cambios a estos términos y condiciones. </font><font style="vertical-align: inherit;">Las modificaciones de los Términos y condiciones entran en vigor 10 (diez) días después del anuncio en el sitio web, a menos que se indique explícitamente lo contrario.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios y proveedores pueden celebrar acuerdos adicionales por separado con Digital Keys. </font><font style="vertical-align: inherit;">En caso de cualquier conflicto entre las disposiciones de estos Términos y Condiciones y dichos acuerdos adicionales, prevalecerán las disposiciones de los acuerdos adicionales a menos que se indique explícitamente lo contrario en dichos acuerdos adicionales.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Digital Keys se comunica con los Usuarios y Proveedores mediante el envío de correos electrónicos, a través del sistema electrónico de la Cuenta del Sitio Web dejándoles avisos, o mediante la distribución de avisos a través de canales de comunicación dentro de otros servicios. </font><font style="vertical-align: inherit;">Los Usuarios y Proveedores consienten incondicionalmente en recibir comunicaciones electrónicamente y acuerdan que todos los acuerdos, avisos, divulgaciones y otras comunicaciones que Digital Keys proporcione electrónicamente deberán cumplir con los requisitos legales de dicha comunicación por escrito.
                            </font></font></li>
                        </ol>
                    </li>
                    <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tarifas de servicios</font></font></strong>
                        <ol>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Salvo que se disponga expresamente lo contrario, Digital Keys cobra su comisión y cualesquiera otras posibles tarifas de los precios determinados por el Vendedor en relación con cada transacción. </font><font style="vertical-align: inherit;">Durante el proceso de creación y subasta, un Proveedor recibe toda la información sobre comisiones y otras tarifas a las que está sujeto el Proveedor en relación con la inclusión de una subasta en particular en el Sitio web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">El uso del sitio web, la creación de una cuenta y la compra de contenido digital a través del sitio web es gratuito para los usuarios. </font><font style="vertical-align: inherit;">La comisión de Digital Keys se cobra del precio de venta del Contenido digital especificado por el Proveedor. </font><font style="vertical-align: inherit;">No obstante, a los Usuarios se les podrá cobrar por servicios adicionales contratados con Digital Keys a través del Sitio Web. </font><font style="vertical-align: inherit;">Al monto de las tarifas por dichos servicios adicionales, Digital Keys podrá agregar el monto del Impuesto sobre el Valor Agregado (IVA) a la tasa aplicable en el lugar de residencia del Usuario en el territorio de la Unión Europea que se relacione con las obligaciones del IVA de conformidad con la Comunidad. Ley, en particular art. </font><font style="vertical-align: inherit;">58 de la Directiva 2006/112 / WE del Consejo y los Reglamentos de Ejecución n.o 282/2011 y 1042/2013.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios y proveedores son los únicos responsables de pagar las tarifas e impuestos relacionados con el uso de los servicios disponibles en el sitio web. </font><font style="vertical-align: inherit;">Los usuarios y proveedores son particularmente responsables de pagar los impuestos, tarifas u otros montos adeudados requeridos en relación con los contratos celebrados a través del sitio web por su cuenta. </font><font style="vertical-align: inherit;">En todo caso Digital Keys no será responsable de liquidar tales tasas e impuestos. </font><font style="vertical-align: inherit;">Si un determinado método de pago falla o una factura está vencida, Digital Keys se reserva el derecho de exigir el pago mediante otro método de pago, incluidos todos los posibles costos adicionales de dicho método.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Siempre que Digital Keys proporcione Servicios a cualquier persona que se considere un empresario, dicha persona reconoce y acepta contabilizar cualquier Impuesto sobre bienes y servicios (GST), IVA, Impuesto sobre las ventas o cualquier impuesto similar a través del mecanismo de carga inversa aplicable.
                            </font></font></li>
                        </ol>
                    </li>
                    <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cuentas</font></font></strong>
                        <ol>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Una persona que desee acceder a todos los servicios proporcionados en el sitio web debe registrarse y crear una cuenta. </font><font style="vertical-align: inherit;">Sin embargo, una cuenta no es necesaria para comprar contenido digital a través del sitio web. </font><font style="vertical-align: inherit;">El registro procede al completar toda la información necesaria en un formulario de registro que se puede encontrar en el sitio web. </font><font style="vertical-align: inherit;">Se le pedirá a la persona que envíe su nombre de usuario, dirección de correo electrónico, contraseña y otra información. </font><font style="vertical-align: inherit;">Para completar el registro, la persona deberá aceptar los Términos y condiciones y la Política de privacidad y cualquier otra documentación del sitio web, si corresponde. </font><font style="vertical-align: inherit;">No proporcionar cualquier información que, a la sola discreción de Digital Keys, sea necesaria para verificar a dicho nuevo Usuario (independientemente de si dicha información se indica expresamente en estos Términos y Condiciones),
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cada Usuario está obligado a revelar su lugar de residencia. </font><font style="vertical-align: inherit;">Se informa a los usuarios que Digital Keys podrá utilizar herramientas para detectar la localización del dispositivo de red informática (y la conexión) en cuanto al país de origen desde el que se realiza el registro. </font><font style="vertical-align: inherit;">Digital Keys puede negarse a configurar la Cuenta o suspender o rescindirla en caso de que el lugar de residencia indicado por el Usuario difiera de los resultados de la verificación realizada por Digital Keys, en particular por la localización de los dispositivos de la red informática (y la conexión), en lo que respecta el país de origen desde el que se accede al sitio web. </font><font style="vertical-align: inherit;">Cada Usuario tiene derecho a configurar una sola cuenta, a menos que se acuerde expresamente lo contrario, caso por caso. </font><font style="vertical-align: inherit;">Para evitar dudas, los usuarios no deben utilizar la conexión VPN durante el uso del sitio web, a menos que se acuerde expresamente lo contrario en cada caso.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">De acuerdo con sus procedimientos internos, Digital Keys puede, de vez en cuando, llevar a cabo procedimientos KYC y solicitar a sus Usuarios y Proveedores la presentación de documentos e información adecuados relacionados con su identidad y actividades dentro del Sitio Web. </font><font style="vertical-align: inherit;">Entre ellos se pueden incluir los documentos de identificación del Usuario, así como la documentación del Vendedor, que confirme el estado legal del Vendedor, la dirección registrada, la autorización para representar al Vendedor, el número de identificación de IVA y otros datos que puedan ser necesarios en un caso determinado. </font><font style="vertical-align: inherit;">El no proporcionar dichos documentos e información dentro del plazo establecido por Digital Keys puede constituir la razón para rechazar el registro y (o) ser motivo para suspender o cancelar una Cuenta ya registrada.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tras el registro correcto en el sitio web por parte del usuario, se le proporciona un acceso a la funcionalidad completa del sitio web después de ingresar su nombre de usuario y contraseña.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">El registro en el sitio web por parte del usuario es equivalente a que dicha persona haya leído, entendido y aceptado estos Términos y Condiciones en su totalidad, incluida la Política de Privacidad y cualquier otra documentación del sitio web, y haya dado su consentimiento para el procesamiento por parte de Digital Keys ahora y en el futuro, de datos personales transferidos a Digital Keys durante el proceso de registro del Sitio Web. </font><font style="vertical-align: inherit;">Independientemente de lo anterior, también se considera que una persona que no se ha registrado en el Sitio Web y no ha obtenido una Cuenta, ha aceptado estos Términos y Condiciones, la Política de Privacidad y cualquier otra documentación del Sitio Web, desde el momento en que opta por utilizar cualquiera de los las funcionalidades del sitio web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En cualquier momento, si Digital Keys cree que la Cuenta tiene un alto riesgo de dañar a cualquier persona, Digital Keys tiene todos los derechos para suspender el uso de la Cuenta restringiendo el acceso al inicio de sesión en la Cuenta, reteniendo transacciones, etc. Una vez eliminado el riesgo (a criterio exclusivo de Digital Keys), Digital Keys reactivará la Cuenta. </font><font style="vertical-align: inherit;">En caso de que el administrador de una Cuenta viole la ley o estos Términos y Condiciones, Digital Keys tiene derecho a cancelar la Cuenta. </font><font style="vertical-align: inherit;">Digital Keys tendrá derecho a suspender o dar por terminado el uso de la Cuenta siempre que a juicio de Digital Keys ocurra cualquier otra circunstancia que pueda resultar en riesgo para cualquier persona o incumplimiento de las leyes.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios son responsables del cuidado razonable de su Cuenta y deben asegurarse de que su dirección de correo electrónico esté actualizada. </font><font style="vertical-align: inherit;">Digital Keys no se hace responsable de situaciones en las que los Usuarios no reciban información debido a su negligencia.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En el caso de que Digital Keys decida que el sitio web debe ser modernizado o tiene problemas técnicos, Digital Keys tiene el derecho de restringir la posibilidad de iniciar sesión en las cuentas o utilizar los servicios respectivos o incluso el acceso general al sitio web.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios reconocen que regalar los datos de inicio de sesión de su Cuenta a otra persona podría causar daños a Digital Keys oa terceros. </font><font style="vertical-align: inherit;">Los usuarios son responsables de asegurar ese tipo de información y, en el caso de que no se aseguren de ello, los usuarios son responsables de eliminar todos los daños causados.&nbsp;
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">La Cuenta se pone a disposición del Usuario por Digital Keys de forma gratuita y le permite utilizar los Servicios ofrecidos a través del Sitio Web, lo que es posible desde cualquier lugar del mundo a través de la red de Internet.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los servicios (o cualquier otra funcionalidad incorporada en el sitio web) pueden diferir entre diferentes países o regiones. </font><font style="vertical-align: inherit;">Digital Keys no ofrece garantía alguna en el sentido de que un servicio o funcionalidad de cierto tipo o alcance estará disponible para todos los Usuarios. </font><font style="vertical-align: inherit;">Digital Keys se reserva el derecho de restringir, rechazar o crear otro nivel de acceso relacionado con el uso de los Servicios (o cualquier otra funcionalidad incorporada en el Sitio Web) para diferentes Usuarios individuales.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">También se crean cuentas para proveedores. </font><font style="vertical-align: inherit;">Para comenzar a vender a través del Sitio Web, el Vendedor debe comunicarse con Digital Keys completando el formulario de registro y proporcionando los documentos e información solicitados. </font><font style="vertical-align: inherit;">Después del registro exitoso, Digital Keys creará una Cuenta y proporcionará al Vendedor los datos de inicio de sesión, que posteriormente podrán ser modificados por el Vendedor.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En caso de cualquier violación de estos Términos y Condiciones y las leyes aplicables por parte del Proveedor, Digital Keys se reserva el derecho de suspender o cancelar la Cuenta del Proveedor. </font><font style="vertical-align: inherit;">Las secciones 5.6-5.9 también se aplican a los proveedores.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No obstante lo anterior, la Cuenta del Proveedor también puede suspenderse o cancelarse si se advierte que el Contenido Digital puesto a la venta viola los derechos de propiedad intelectual de terceros o ya ha sido utilizado.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios y proveedores no utilizarán otras cuentas y no pondrán sus cuentas a disposición de otros usuarios o terceros. </font><font style="vertical-align: inherit;">Lo anterior no se aplicará a que los Proveedores pongan su Cuenta a disposición de las personas debidamente autorizadas para actuar en su nombre, así como de sus empleados, autorizados por el Proveedor para usar la Cuenta. </font><font style="vertical-align: inherit;">En la medida en que lo permita la ley, Digital Keys estará exenta de cualquier responsabilidad contra los Usuarios y Proveedores relacionada con la violación de esta disposición. </font><font style="vertical-align: inherit;">Para evitar dudas, los Usuarios y Proveedores asumirán toda la responsabilidad por las acciones y los resultados de las acciones de las personas a las que proporcionaron acceso a su Cuenta.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tanto los Usuarios como los Vendedores están obligados a mantener actualizados sus datos de registro e informar rápidamente a Digital Keys sobre cualquier cambio de dichos datos.
                            </font></font></li>
                        </ol>
                    </li>
                    <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Términos y condiciones de uso</font></font></strong>
                        <ol>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">De acuerdo con estos Términos y Condiciones, Digital Keys otorga a los Usuarios una licencia limitada, no exclusiva, intransferible y no sublicenciable para acceder y hacer uso personal y no comercial de los Servicios prestados por Digital Keys. </font><font style="vertical-align: inherit;">Dicha licencia se limita estrictamente a las funcionalidades del sitio web y no se extiende a ninguna licencia de contenido digital (incluidos los códigos de activación de juegos ofrecidos por los proveedores a través del sitio web). </font><font style="vertical-align: inherit;">Para evitar dudas, las licencias de contenido digital solo se pueden otorgar a discreción de sus propietarios u otras personas autorizadas.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios están obligados a no abusar de los Servicios de Digital Keys y solo a usarlos según lo establecido por la ley y estos Términos y Condiciones. </font><font style="vertical-align: inherit;">El uso inadecuado de los Servicios podría causar efectos negativos a Digital Keys o terceros y si los Usuarios violan los términos de uso de los Servicios, son responsables de eliminar todos los daños causados.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Todos los derechos no otorgados expresamente a los Usuarios en estos Términos y Condiciones están reservados y retenidos por Digital Keys o sus propietarios, licenciantes, proveedores, editores u otras personas autorizadas.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cualquier objeto de propiedad intelectual como textos, materiales gráficos, funciones interactivas, logotipos, fotografías, archivos, software en el Sitio Web, excepto los cargados, transmitidos, puestos a disposición, publicados por Usuarios y Proveedores, así como la selección, organización, la coordinación, la recopilación de los materiales y el esquema general y la naturaleza del Sitio Web constituyen propiedad intelectual de Digital Keys. </font><font style="vertical-align: inherit;">Están protegidos por derechos de autor, marcas registradas, patentes, derechos de diseño industrial y cualquier otro derecho y disposición, incluidos los convenios internacionales y los derechos de propiedad. </font><font style="vertical-align: inherit;">Cualquiera de estos derechos está reservado para Digital Keys. </font><font style="vertical-align: inherit;">Todas las marcas comerciales, marcas y nombres comerciales constituyen propiedad de Digital Keys.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A menos que cuente con el consentimiento expreso por escrito de Digital Keys, ni los Usuarios ni los Vendedores están autorizados a: duplicar, copiar, descargar, difundir, vender, distribuir o revender cualquier servicio, información, textos, gráficos, videoclips, sonidos, guiones, archivos, bases de datos o listas de cualquier tipo. disponibles en oa través del sitio web ni utilizarlos de otra manera. </font><font style="vertical-align: inherit;">Está prohibido recuperar el contenido del Sitio Web de forma sistemática para crear o compilar, ya sea directa o indirectamente, una colección, compilación, base de datos y catálogo (mediante el uso de robots, buscadores, dispositivos automáticos o manuales) sin el permiso expreso por escrito de Digital Keys. </font><font style="vertical-align: inherit;">Se prohíbe el uso de cualquier contenido o material disponible en el sitio web para fines no especificados en los Términos y condiciones, especialmente cualquier uso, publicación, copia en cualquier forma, ya sea electrónica, mecánica, fotográfica u otra (Todos los derechos reservados).
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios están obligados a leer y aceptar los Términos y Condiciones y la Política de Privacidad, así como cualquier otra documentación del Sitio Web, con el fin de garantizar la protección de sus datos personales cargados a través del Sitio Web. </font><font style="vertical-align: inherit;">Al usar el Sitio, cada Usuario consiente en cumplir con los Términos y Condiciones relacionados con la protección de la privacidad y la protección de datos personales definidos en la Política de Privacidad.&nbsp;
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Digital Keys puede proporcionar a los Usuarios hipervínculos en el sitio web (es decir, banners, canales) con acceso al contenido, productos o servicios ofrecidos por otros proveedores que los conducen a los sitios web de dichos proveedores. </font><font style="vertical-align: inherit;">Digital Keys no se hace responsable de la certeza, exactitud o confiabilidad de la información enviada por los proveedores mencionados. </font><font style="vertical-align: inherit;">Digital Keys recomienda leer todos los documentos en los sitios de dichos proveedores. </font><font style="vertical-align: inherit;">Los usuarios reconocen que Digital Keys no tiene control sobre las acciones de estos proveedores.
                            </font></font></li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Los usuarios y proveedores, incluidos, entre otros, confirman y declaran que:
                            </font></font><ol>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no publicará información indebida o defectuosa que pueda ser perjudicial para Digital Keys, otros Usuarios, Vendedores o terceras personas;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no cargará ni difundirá información en el sitio web que pueda violar leyes, acuerdos contractuales o derechos de terceros. </font><font style="vertical-align: inherit;">Dicha información potencialmente sensible podría ser material protegido por derechos de autor, datos personales, secretos comerciales y otros;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no se hará pasar por otra persona o entidad, ya sea existente o ficticia, ni mantendrá falsamente relacionado con ninguna otra persona o entidad, ni accederá a las Cuentas de otros Usuarios o Proveedores, ni proporcionará información falsa que pueda inducir a error a Digital Keys, a otros Usuarios o Proveedores;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no intentará piratear, modificar, deshabilitar o afectar de ninguna otra manera el sitio web ni desafiar su seguridad;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no utilizará el sitio web para ningún otro fin que no sea el que se pretende utilizar teniendo en cuenta los fines de los servicios de Digital Keys;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no intentará recopilar ningún dato personal que se mantenga en el sistema del sitio web sin el consentimiento de un sujeto de datos en particular y no ofenderá ni engañará a otros usuarios o proveedores;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no utilizará el sitio web para ningún propósito ilegal o para violar cualquier ley, incluidas las disposiciones relacionadas con los derechos de autor, los derechos de propiedad intelectual y otros derechos de propiedad;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no intentará interferir con la actividad del sitio web ni prohibirá a otros usuarios o proveedores usar el sitio web (o dificultar su uso);
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no transferirá a cambio de remuneración ni de ninguna otra manera pondrá a disposición de remuneración parte o la totalidad de su Cuenta;
                                </font></font></li>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">no realizará transacciones con dinero de fuentes ilegales o no divulgadas.
                                </font></font><p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Todas las acciones mencionadas anteriormente incluyen intentos de realizar una de ellas o crear circunstancias para que tales acciones se materialicen.
                                </font></font></p>
                                    <ol>

                                    </ol>
                                </li>
                            </ol>
                            </li>
                            <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Al publicar o publicar sus propios materiales en el sitio web o mediante cualquier otra distribución de los mismos a Digital Keys, los Usuarios y Proveedores dentro del alcance permitido por las leyes otorgan una licencia irrevocable, permanente y gratuita para que Digital Keys utilice estos materiales, incluyendo, pero sin limitarse a, presentar, transmitir, distribuir, reproducir, publicar, duplicar, adaptar, modificar, traducir, crear contenido relacionado y de otro modo, de cualquier forma y para cualquier fin que pueda ser beneficioso para el funcionamiento de Digital Keys, actualmente o en el futuro. </font><font style="vertical-align: inherit;">Los usuarios y proveedores reconocen y garantizan a Digital Keys que tienen los medios y los derechos suficientes para garantizar dicha licencia.&nbsp;
                            </font></font></li>
							<li> LOS PROVEEDORES ESTÁN ESTRICTAMENTE PROHIBIDOS DE PUBLICAR Y VENDER CUALQUIER CONTENIDO DIGITAL QUE INFRIGA EL
								LEYES APLICABLES, DERECHOS DE TERCEROS (INCLUIDOS LOS DERECHOS DE AUTOR) O ESTOS TÉRMINOS Y CONDICIONES.
							</li>
                        </ol>
                    </li>
                    <li><strong> Tratos entre usuarios y proveedores y la función de las claves digitales </strong>
						<ol>
							<li> Digital Keys es un administrador del sitio web, proporciona a los proveedores que cumplen ciertos requisitos una
								oportunidad de vender contenido digital a los usuarios a través del sitio web.
							</li>
							<li> Cada Proveedor determina el precio del Contenido digital que pretende vender a través del Sitio web.
								A menos que se indique expresamente lo contrario y sujeto a las Secciones 4.1-4.2, Digital Keys cobra su comisión y
								cualquier otra tarifa posible del monto de dicho precio. Los usuarios y proveedores confirman su comprensión
								que las llaves digitales y los proveedores individuales también pueden acordar en acuerdos adicionales indicados en la sección 3.7 sobre
								otras comisiones y honorarios.
							</li>
							<li> Al incluir contenido digital en el sitio web, el proveedor indica a las claves digitales que se publiquen en el sitio web del proveedor.
								invitación a celebrar un acuerdo para los usuarios que deseen comprar contenido digital a un precio determinado
								por el vendedor. Como tal, no constituirá una oferta de venta en el sentido de la ley civil. Vendedor
								tendrá derecho a modificar el precio de los Contenidos Digitales ofrecidos, siempre que ningún Usuario haya
								expresó la voluntad de comprarlo. Cada Proveedor reconoce y consiente que los precios del producto y
								las descripciones se hacen públicas y están disponibles para todos los usuarios del sitio web.
							</li>
							<li> Con el fin de incluir contenido digital en el sitio web, los proveedores brindan información sobre los productos
								ponerse a la venta en el sitio web y dar su consentimiento para que las claves digitales revisen y finalicen las descripciones en orden
								para garantizar el estándar general de las descripciones de los listados en el sitio web. Cada vendedor se compromete a
								proporcionar la información verdadera y completa necesaria para completar dichas descripciones. La información proporcionada debe
								reflejar adecuadamente las características reales del producto. Digital Keys no será responsable de ninguna inexactitud
								de las descripciones de productos que surjan debido a que los Proveedores proporcionan claves digitales con información incorrecta. Vendedores
								por la presente autorizamos a Digital Keys a utilizar la información indicada en esta Sección de forma gratuita, para preparar
								descripciones de los productos que se venden, incluidas modificaciones, alteraciones y traducciones de este
								información.
							</li>
							<li> Cada Usuario es consciente y por la presente reconoce que al expresar su voluntad de comprar Contenido Digital
								(es decir, realizar un pedido relacionado con la compra de contenido digital) del vendedor a través del sitio web
								puede implicar una obligación de pago, siempre que exista voluntad de celebrar un contrato y cobrar al Usuario
								expresado por el vendedor. Para evitar dudas, los Usuarios que expresen su voluntad de comprar el Digital
								El contenido debe ser consciente de que el vendedor puede tener derecho a rescindir la celebración de un contrato de venta.
								de acuerdo con las preferencias de autorización de entrega y pago elegidas por el Vendedor.
							</li>
							<li> Digital Keys no autoriza la entrega de Contenido digital vendido por Proveedores y no es responsable ni hace
								no autorizar los pagos por el Contenido digital entregado a través del sitio web por parte de los Proveedores.
							</li>
							<li> Las claves digitales permiten a los usuarios y proveedores hacer que los pagos adeudados de los usuarios se paguen mediante un pago específico
								canales disponibles en el sitio web. Para evitar dudas, los Proveedores pueden permitir que se realicen dichos pagos.
								fuera del ecosistema de Claves Digitales, en cuyo caso los Usuarios serán responsables de asegurar que el pago
								se ha realizado, documentado de forma debida y segura y toda la información ha sido comunicada con el Proveedor.
								Con respecto a los pagos realizados dentro del ecosistema de Claves Digitales, por la presente cada Proveedor consiente y otorga
								permiso a las claves digitales para deducir sus comisiones y otras tarifas de los fondos recaudados en sus bancos
								cuenta y transferir la parte restante a la cuenta bancaria del vendedor.
							</li>
							<li> Digital Keys fomenta la resolución amistosa de cualquier disputa entre Usuarios y Proveedores. Para este propósito, llaves digitales
								proporciona a los usuarios y proveedores un mecanismo de resolución de disputas, a través de la funcionalidad del centro de ayuda disponible
								en el sitio web. En el mismo, los Usuarios y Proveedores pueden acordar que los fondos se devuelvan al Usuario o que los
								comprado producto defectuoso cambiado. Para mantener la marca Digital Keys, evite prácticas desleales e ilegales.
								actividades en el Sitio Web, Digital Keys podrá participar en dicho proceso como intermediario, sin embargo el
								El derecho a resolver tales disputas permanecerá en manos de los Vendedores. En caso de que el Usuario no esté satisfecho con la
								conclusión de dicha resolución, podrán plantear las respectivas reclamaciones contra el Vendedor en el tribunal o en
								Cualquier otra manera.
							</li>
							<li> Los usuarios y proveedores reconocen que la celebración de cualquier contrato en el sitio web implica el riesgo de negociar
								con personas abusivas. Digital Keys actúa con cuidado y utiliza medidas razonables para verificar la
								veracidad de la información y los datos facilitados por Usuarios y Vendedores con el fin de identificar
								respectivos Usuarios y Proveedores y determinar su idoneidad para utilizar este Sitio Web y disponer de Cuentas.
								Sin embargo, los Usuarios y Proveedores también deben hacer todos los esfuerzos razonables para asegurarse de que los respectivos
								El usuario o proveedor es adecuado para cualquier transacción y relación comercial.
							</li>
							<li> Los usuarios y proveedores son personalmente responsables de observar todos los términos y condiciones de las transacciones.
								realizado en, a través o como resultado del uso del Sitio web o los Servicios, en particular los Términos y
								Condiciones y otros compromisos. Esto también incluye, pero no se limita a, condiciones de pago, garantía,
								devoluciones, entrega, tiempo de entrega, seguros, tarifas, impuestos, licencias o multas.
							</li>
							<li> Con el fin de unificar las reglas de las transacciones realizadas a través del sitio web y garantizar un estándar de equidad
								práctica al llevar a cabo los usuarios y proveedores anteriores por la presente confirman que el contrato de venta entre los
								El Usuario y el Vendedor se vuelven válidos una vez que la provisión del acceso al Contenido Digital y el cargo
								al Usuario están autorizados por el Vendedor. Todas las demás acciones relacionadas con el contrato de venta, derechos
								y obligaciones, están reguladas por leyes o acuerdos adecuados entre Usuarios y Proveedores.
							</li>
							<li> Las claves digitales cooperarán con los usuarios y proveedores con respecto a todas las preguntas relacionadas con
								Provisión de servicios. La comunicación entre las claves digitales, los usuarios y los proveedores se realizará a través del
								El centro de ayuda del sitio web, el correo electrónico u otros canales de comunicación se acuerdan por separado.
							</li>
							<li> Las claves digitales proporcionarán a los usuarios y proveedores asistencia técnica siempre que encuentren algún problema en
								relación con la funcionalidad de la Cuenta o el Sitio web.
							</li>
						</ol>
                    </li>
                    <li><strong> Obligaciones de los proveedores </strong>
						<ol>
							<li> Al aceptar estos Términos y condiciones y al poner a la venta cualquier Contenido digital en el sitio web,
								cada Proveedor garantiza y reconoce que:
								<ol>
									<li> tiene plena capacidad y derecho a aceptar los Términos y Condiciones y cualquier documentación relacionada,
										otorgar licencias y autorizaciones y asumir las obligaciones aquí descritas;
									</li>
									<li> dicho Contenido digital se obtiene legalmente y se origina en fuentes legales, está libre de cualquier
										defectos y cualquier derecho y reclamación de terceros, y el Vendedor posee todos los
										licencias, derechos, permisos y consentimientos para su uso, distribución, publicación, publicación, venta,
										incluyendo el derecho de venta a través de Internet, sistema en línea, así como que los derechos son
										no limitado de ninguna manera;
									</li>
									<li> dicho Contenido digital no viola ningún derecho de terceros, incluidos los derechos de autor, marcas comerciales,
										derechos de patente, secretos comerciales, derechos de privacidad, derechos de imagen, ni ningún otro derecho de propiedad o
										derechos de propiedad intelectual;
									</li>
									<li> se compromete a utilizar el sitio web y los servicios de acuerdo con estos términos y condiciones, aplicables
										leyes y buenas prácticas;
									</li>
									<li> no participará en ninguna actividad que pueda ser perjudicial para la marca Digital Keys o que pueda haber
										efecto negativo en el sitio web o el contenido digital vendido a través del sitio web;
									</li>
									<li> no utilizará el sitio web para actividades relacionadas con el blanqueo de capitales ni para acciones que
										puede, en opinión de las claves digitales, aumentar el riesgo de ser acusado de usar el sitio web por dinero
										fines de blanqueo;
									</li>
									<li> no utilizará el sitio web para revender Contenido digital adquirido de forma gratuita o con un descuento
										relacionado con un evento de caridad o que apoye tal evento;
									</li>
									<li> no utilizará la conexión VPN durante el uso del sitio web, a menos que se acuerde expresamente lo contrario en un
										caso por caso;
									</li>
									<li> no enumerará ni venderá en el sitio web Contenido digital que contenga o pueda usarse para
										recibir, directa o indirectamente, contenidos y servicios ilegales.
									</li>
								</ol>
							</li>
							<li> Cada Proveedor acepta y reconoce que:
								<ol>
									<li> es el vendedor y proveedor del Contenido digital y esto se definirá claramente en su
										acuerdos contractuales con los Usuarios, así como las facturas, facturas o ventas relevantes
										ingresos;
									</li>
									<li> establecerá los términos y condiciones generales de las ventas realizadas a los Usuarios;
									</li>
									<li> autorizará el cargo correspondiente a los Usuarios y la entrega de Contenido Digital;
									</li>
									<li> es el único responsable de pagar el IVA, el GST, el impuesto sobre las ventas o cualquier pasivo fiscal similar en
										cumplimiento de las leyes aplicables resultantes de la venta de Contenido Digital a Usuarios a través del
										Sitio web (si lo hubiera).
									</li>
								</ol>
							</li>
							<li> En caso de que el Proveedor sea un representante comercial de la entidad legal, garantiza, representa y
								certifica que como tal representante posee los consentimientos y autorizaciones necesarios de
								su director para actuar como representante de ventas y publicar el contacto detalles necesarios para
								conduciendo negocios.
							</li>
							<li> Los proveedores están obligados a proporcionar información o documentos relacionados con su negocio, empresa o servicios digitales.
								Contenido a primera solicitud de claves digitales. Cada proveedor representa, garantiza, reconoce y acepta
								responsabilidad que:
								<ol>
									<li> la información y los documentos presentados durante el proceso de registro o el uso posterior del
										Los sitios web son verdaderos, precisos, válidos y completos;
									</li>
									<li> informará de inmediato todos los cambios en los documentos en consecuencia para mantenerlos verdaderos,
										válido y completo.
									</li>
								</ol>
							</li>
							<li> Cada Proveedor acepta proporcionar toda la información, materiales y permisos necesarios y todos los
								apoyo y cooperación a Claves Digitales, para que esta última brinde sus Servicios dependiendo de si el
								El Proveedor ha violado los Términos y Condiciones y / o se ha presentado una queja contra el Proveedor. Si
								Si no lo hace, se debe a una demora, suspensión o denegación de acceso a cualquier Servicio, las llaves digitales no lo harán.
								estar obligado a extender el plazo de dicho servicio o ser responsable de cualquier pérdida o daño causado por dicho servicio
								retraso, suspensión o negación.
							</li>
							<li> Cada Proveedor acepta y reconoce que está obligado a actuar de conformidad con todas las leyes y
								regulaciones aplicables a ellos mismos, la transacción y el respectivo Usuario.
							</li>
							<li> A menos que las claves digitales indiquen expresamente lo contrario, los proveedores reconocen y aceptan que solo utilizarán
								Sitio web para vender productos en forma digital, lo que significa que los productos estarán disponibles para su descarga por
								Usuarios a sus discos duros y no serán entregados ni almacenados en soportes de medios materiales.
							</li>
							<li> Con respecto a la comunicación posventa, cada Proveedor se compromete a:
								<ol>
									<li> utilizar la funcionalidad indicada en la Sección 7.8 para resolver todos los problemas posteriores a la venta;
									</li>
									<li> no participar en prácticas desleales y resolver los problemas que surjan de buena fe, es decir, intentar activamente
										resolver los problemas de los usuarios y evitar retrasos en la respuesta más allá de lo razonablemente necesario para
										investigar y resolver tales problemas;
									</li>
									<li> no publicar, promover ni transmitir ningún tipo de información ilegal, acosadora, difamatoria, dañina, vulgar, obscena o
										material de cualquier otro tipo objetable de cualquier tipo o naturaleza;
									</li>
									<li> no engañar a los usuarios ni publicar información falsa;
									</li>
									<li> no se refiera a las claves digitales como la parte responsable de resolver los problemas de posventa, excepto en el
										caso de mal funcionamiento de los Servicios prestados por el Sitio Web.
									</li>
								</ol>
							</li>
							<li> Digital Keys se reserva el derecho de tomar acciones contra cualquier Proveedor que se encuentre en incumplimiento de los términos establecidos
								establecido en la Sección 8.8 anterior, hasta e incluyendo la restricción de los Servicios proporcionados a través del sitio web. Para el
								Para evitar dudas, Digital Keys actúa únicamente como intermediario y no es responsable del contenido del
								conversaciones entre usuarios y proveedores.
							</li>
						</ol>
                    </li>
                    <li><strong> Responsabilidad </strong>
						<ol>
							<li> La responsabilidad de Digital Keys está excluida en relación con:
								<ol>
									<li> Usuarios o proveedores que actúan más allá del control de las claves digitales y que provocan daños (es decir, infringen
										Términos y condiciones, Política de privacidad, leyes aplicables, proporcionar acceso a la Cuenta a otro
										persona o realizó otras acciones);
									</li>
									<li> cualquier consecuencia adversa que resulte del acceso, uso o imposibilidad de usar el sitio web debido a
										razones más allá del control de Digital Keys;
									</li>
									<li> las acciones tomadas por las claves digitales en relación con los usuarios o proveedores relacionadas con la infracción de estas
										Términos y condiciones o leyes aplicables. Tales incluyen suspender o cancelar cuentas o
										limitar la funcionalidad del sitio web;
									</li>
									<li> implicaciones de cualquier acceso a datos e información a que accedan terceras personas en un
										forma no autorizada que no fue posible rastrear a tiempo, a menos que las llaves digitales no tomaran un tiempo razonable
										acciones tan pronto como sea posible para prevenir las consecuencias, también cuando cualquier consecuencia adversa para
										los datos privados están sujetos a acciones y omisiones de Usuarios y Proveedores;
									</li>
									<li> cualquier consecuencia adversa debida a virus, troyanos, etc.que puedan transferirse al
										Sitio web oa través del Sitio web por parte de terceros, excepto que las Claves Digitales garantizarán que todos los
										se toman las medidas razonablemente disponibles para eliminar tales amenazas;
									</li>
									<li> leyes o derechos de terceros infringidos por Usuarios y Proveedores, en particular en relación con cualquier
										daños causados ​​a terceros por Usuarios y Vendedores como resultado de la violación de derechos de autor,
										derechos de propiedad industrial, etc., en particular para cualquier exigencia en relación con la transmisión,
										distribución, publicación, oferta, presentación de datos a los que las terceras personas tienen
										reclamaciones o derechos sobre el Contenido digital o los productos físicos;
									</li>
									<li> transacción de compra no completada debido a problemas técnicos en uno de los
										métodos de pago propuestos en el sitio web;
									</li>
									<li> comprado contenido digital o productos físicos que no funcionan de la manera que deberían;
									</li>
									<li> Usuarios o proveedores que envían declaraciones, información, garantías y sujetos de datos falsos o no verdaderos
										a los Términos y condiciones, la Política de privacidad y la documentación de cualquier otro sitio web;
									</li>
									<li> cualquier forma de daño causado por los usuarios o proveedores debido a su incumplimiento o inapropiada
										el cumplimiento de los Términos y Condiciones, la Política de Privacidad u otros documentos del Sitio Web, así como
										como cualquier derecho y obligación hacia los demás.
									</li>
								</ol>
							</li>
							<li> Las claves digitales no pueden garantizar razonablemente que los usuarios y proveedores tengan la capacidad total para realizar cualquier venta
								Contratos celebrados en el sitio web. Los usuarios y proveedores son los únicos responsables del desempeño de
								sus Contratos de Venta.
							</li>
							<li> Digital Keys rechaza todas las garantías que consisten en garantías de condición, idoneidad, calidad o funcionamiento
								relacionados con los servicios disponibles en el sitio web, así como con el contenido digital vendido por los proveedores. Claves digitales es
								solo responsable de la disponibilidad adecuada de los Servicios de uso. Los proveedores serán los únicos responsables de la
								Contenido digital vendido a través del sitio web. Digital Keys no asumirá ninguna responsabilidad frente a terceros.relacionado en particular con el incumplimiento o el desempeño inadecuado por parte de los proveedores de sus contratos de venta
								celebrado con los Usuarios, o por cualquier delito cometido por los Proveedores, cualquier infracción por parte de los Proveedores de la ley
								vigentes o relacionadas con cualquier información, garantías o declaraciones falsas enviadas por los Proveedores. Si alguna
								reclamos, quejas, peticiones, pretensiones, etc., sean dirigidas por terceros a Claves Digitales, relacionadas con cualquier
								El comportamiento del Vendedor indicado en esta Sección anterior, dicho Vendedor estará obligado a tomar
								responsabilidad frente a estas entidades y el Proveedor asumirá todos los costos relacionados con las mismas y
								a cargo de Digital Keys. Además, cuando terceros presenten reclamaciones contra claves digitales relacionadas con cualquier
								violaciones por parte de cualquier Proveedor, en particular la violación de los derechos de autor, dicho Proveedor reemplazará las Claves Digitales
								en dichos procedimientos o actuará como un tercero demandado. Esta Sección 9.3. se aplicará en consecuencia
								a los Usuarios vendedores en la medida en que no infrinja los derechos del consumidor.
							</li>
							<li> En la máxima medida permitida por la ley, todos los servicios prestados por Claves digitales en oa través del sitio web se realizan
								disponible TAL CUAL, SI ESTÁ DISPONIBLE y CON TODOS LOS DEFECTOS, y las Claves digitales rechazan expresamente todos los
								garantías, que incluyen, entre otras, cualquier garantía de condición, calidad, durabilidad, funcionamiento,
								confiabilidad, comerciabilidad o idoneidad para cualquier propósito específico del Contenido Digital vendido por
								Proveedores, a menos que las leyes de protección de los derechos de los consumidores dispongan lo contrario.
							</li>
							<li> La responsabilidad total de las claves digitales frente a los proveedores se limita a la cantidad de 300 euros. La oración anterior
								no renuncia a la necesidad de acreditar y documentar el daño respectivo alegado por el
								Vendedor. Los proveedores deben probar el daño sufrido para adquirir el derecho a exigir el monto del daño.
								de Digital Keys. Cualquier reclamo sobre claves digitales debe presentarse dentro de los 20 (veinte) días posteriores a la fecha en que se produjo un problema.
								ocurre. En países donde es posible la limitación de responsabilidad frente a los consumidores, los términos del primer
								y la segunda frase de esta Sección se aplicará en consecuencia.
							</li>
							<li> Cada Proveedor y Usuario vendedor deberá indemnizar, eximir de responsabilidad y defender (a los efectos de este
								Sección 9, indemnización e indemnización) Digital Keys y sus directores, funcionarios, empleados, agentes,
								accionistas y afiliados (a los efectos de esta Sección 9, Partes indemnizadas) de y contra
								todos los reclamos, demandas, acciones, juicios, daños, responsabilidades, pérdidas, acuerdos, juicios, costos y
								gastos (incluidos, entre otros, los honorarios y costos razonables de abogados), que surgen de o
								se relacionan con (i) & nbsp; cualquier incumplimiento de cualquier representación o garantía del Proveedor o del Usuario vendedor
								contenidos en estos Términos y Condiciones, (ii) cualquier incumplimiento o violación de cualquier pacto u otro
								obligación o deber del Vendedor o del Usuario vendedor en virtud de estos Términos y Condiciones o en virtud de
								ley aplicable, (iii) cualquier supuesto incumplimiento o violación por parte del Vendedor o del Usuario vendedor de un tercero
								derechos, incluidos los derechos de propiedad intelectual, (v) cualquier reclamo relacionado con la subasta o transacción
								enumerados por el vendedor o el usuario vendedor, o enumerados por claves digitales en nombre del vendedor o del usuario vendedor
								en cada caso, sea o no causado por la negligencia de las Llaves Digitales o cualquier otra Parte Indemnizada y si
								o no el reclamo relevante tiene mérito.
							</li>
							<li> Cada Proveedor y Usuario vendedor deberá informar a Digital Keys por escrito de cualquier reclamo, demanda o demanda y deberá
								cooperar en la defensa de los mismos. Ningún Proveedor o Usuario vendedor aceptará la liquidación de tales
								reclamar, demandar o demandar antes de la sentencia final al respecto sin el consentimiento de las Claves Digitales, cuyo consentimiento puedeser retenido a entera y exclusiva discreción de Digital Keys.
							</li>
							<li> A menos que la ley aplicable disponga lo contrario, Digital Keys tiene derecho a realizar, a su absoluta discreción, cualquier
								compensación de fondos acumulados por cualquier Proveedor o Usuario vendedor.
							</li>
							<li> Cada Proveedor y Usuario vendedor reconoce y acepta que durante la vigencia de estos Términos y
								Condiciones y después de su terminación o expiración por cualquier motivo, Proveedor y Usuario vendedor
								seguirá siendo responsable de todas las obligaciones de indemnización de conformidad con estos Términos y
								Condiciones y todos los demás montos adeudados o que puedan llegar a ser pagaderos en virtud de estos Términos y condiciones. Esto
								La responsabilidad no está sujeta a ninguna limitación de responsabilidad que pueda expresarse en otra parte de estos Términos.
								Y condiciones.
							</li>
						</ol>
                    </li>
                    <li><strong> Eventos fuera del control de teclas digitales </strong>
						<ol>
							<li> Digital Keys no será responsable de ninguna falla en el desempeño o demora en el desempeño de cualquiera de
								Obligaciones de Llaves digitales bajo estos Términos y condiciones causadas por un Evento fuera del Control de Llaves digitales. Un
								Evento fuera del control de llaves digitales se define a continuación en la Sección 10.2.
							</li>
							<li> Un evento fuera del control de las llaves digitales significa cualquier acto o evento más allá del control razonable de las llaves digitales, incluso sin
								huelgas de limitación, cierres patronales u otra acción industrial por parte de terceros, conmoción civil, disturbios,
								invasión, ataque terrorista o amenaza de ataque terrorista, guerra (declarada o no) o amenaza o
								preparación para la guerra, fuego, explosión, tormenta, inundación, terremoto, hundimiento, epidemia u otro natural
								desastre, o falla de las redes de telecomunicaciones públicas o privadas o imposibilidad de uso de
								ferrocarriles, barcos, aviones, transporte motorizado u otros medios de transporte público o privado.
							</li>
							<li> Si se produce un evento fuera del control de claves digitales que afecte el desempeño de las obligaciones de claves digitales según
								estos Términos y Condiciones:
								<ol>
									<li> Digital Keys se pondrá en contacto con los Usuarios y Proveedores afectados tan pronto como sea razonablemente posible para notificarlos;
										y
									</li>
									<li> Las obligaciones de las claves digitales en virtud de estos Términos y condiciones se suspenderán y el tiempo para
										el cumplimiento de las obligaciones de las claves digitales se extenderá durante la duración del evento fuera de las claves digitales
									</li>
								</ol>
							</li>
						</ol>
                    </li>
                    <li><strong> Quejas </strong>
						<ol>
							<li> Si los usuarios o proveedores han experimentado alguna violación de sus derechos causada por los servicios de claves digitales proporcionados en
								Términos y Condiciones y / o Política de Privacidad, tienen derecho a presentar una queja. La denuncia debe
								ser enviado a Digital Keys por el centro de ayuda del sitio web o por correo electrónico que se especifica en la Sección 13.7. Llaves digitales
								hace todo lo posible para que todas las quejas se resuelvan dentro de los 14 (catorce) días posteriores a su recepción.
							</li>
							<li> En caso de que el Usuario tenga quejas sobre el Contenido digital comprado sujeto a las disposiciones de la Sección
								7.8 pueden presentar una queja al Proveedor dentro de la funcionalidad del centro de ayuda disponible en el
								Sitio web. En tales casos, Digital Keys solo ayuda a iniciar el procedimiento de queja y facilita
								comunicación entre las partes contendientes pero no resuelve la queja.
							</li>
							<li> Si el Usuario compró el Contenido digital y no lo ha revisado en la plataforma de Claves digitales, puede regresar
								dicho Contenido digital siempre que el Vendedor otorgue al Usuario el derecho a devolver el Digital
								Contenido. Los vendedores determinarán e indicarán inequívocamente en sus condiciones de venta si otorgan tal
								derecho con respecto a un Contenido digital determinado o un Usuario determinado.
							</li>
						</ol>
					</li>
					<li> <strong> Rescisión </strong>
						<ol>
							<li> Los usuarios y proveedores pueden rescindir el acuerdo con las claves digitales eliminando su cuenta del sitio web. Eso
								se puede hacer enviando la solicitud en el sistema de su Cuenta. Digital Keys elimina la cuenta dentro de 7
								(siete) días después del día en que se presentó la solicitud. Durante este período, el respectivo Usuario o Proveedor
								tiene derecho a cancelar la eliminación de la Cuenta. & nbsp;
							</li>
							<li> Durante el período de terminación del contrato, el Usuario o Proveedor no puede crear otra Cuenta en el
								Sitio web.
							</li>
							<li> Las llaves digitales pueden rescindir dicho acuerdo eliminando la cuenta del usuario o del proveedor o bloqueando su acceso.
								al sitio web. El acceso puede bloquearse si hay sospechas sobre acciones ilegales y puede
								durar hasta que las circunstancias desaparezcan o se eliminen. Las claves digitales eliminan las del usuario o del proveedor.
								Cuenta en situaciones en las que violan gravemente los Términos y condiciones, la Política de privacidad, las leyes u otros
								documentos.
							</li>
							<li> Las llaves digitales pueden restringir o suspender temporalmente el acceso a la cuenta del usuario o del proveedor si su seguridad es
								comprometido de alguna manera o si hay violaciones significativas de este acuerdo o la ley (por parte de los Usuarios o
								Proveedores) se descubren (si Digital Keys no rescinde el contrato debido a esto). Ejecución de
								las decisiones provistas en esta Sección 12 no pueden violar los derechos del consumidor.
							</li>
						</ol>
                    </li>
                    <li><strong> Disposiciones finales </strong>
						<ol>
							<li> La Política de privacidad y la documentación de cualquier otro sitio web son parte integral de estos Términos y condiciones y
								vincular a todos los usuarios y proveedores.
							</li>
							<li> Sin el permiso de las claves digitales, los usuarios no tienen derecho a transferir sus obligaciones, reclamos o derechos a
								terceras personas. Los usuarios aceptan que Digital Keys tendrá derecho a transferir sus derechos y obligaciones.
								derivados de los acuerdos a terceros. Digital Keys informará de dicha transferencia en el Sitio Web.
							</li>
							<li> Si alguna disposición de estos Términos y condiciones se considera ilegal, inválida o inaplicable por un
								corte o tribunal arbitral, las demás disposiciones de estos Términos y condiciones permanecerán en plena vigencia.
								y efecto. Cualquier disposición de estos Términos y Condiciones considerada ilegal, inválida o inaplicable.
								sólo en parte, o hasta cierto punto, permanecerá en pleno vigor y efecto en la medida en que no sea
								considerado ilegal, inválido o inaplicable.
							</li>
							<li> Estos Términos y Condiciones y las relaciones entre las Claves Digitales y los Usuarios con respecto a estos Términos y
								Condiciones (incluida la ejecución, validez, invalidez, implementación y terminación de estos Términos
								y Condiciones) se rigen e interpretan de acuerdo con las leyes de la República de Lituania
								salvo que la legislación nacional aplicable al Usuario como consumidor disponga lo contrario. Cualquier disputa
								controversia o reclamo, que surja de o se relacione con estos Términos y Condiciones, su incumplimiento,
								la terminación o la validez se resolverán definitivamente en el tribunal respectivo de la República de Lituania
								sujeto a las reglas de jurisdicción, a menos que la ley nacional aplicable al Usuario sea un consumidor
								establece lo contrario.
							</li>
							<li> Salvo que se disponga lo contrario en estos Términos y condiciones, ninguna demora de las Claves digitales o del Usuario para ejercer ningún derecho
								o para cumplir con una obligación en virtud de estos Términos y condiciones se considerará como una renuncia a tal
								derecho o excusa del cumplimiento de dicha obligación y el cumplimiento separado o parcial de cualquier
								obligación. El ejercicio separado o parcial de cualquier derecho no significará que esta obligación no tenga que ser
								realizado, o este derecho no podrá ejercerse en el futuro.
							</li>
							<li> Todos los datos e información almacenados en el sitio web pueden ser utilizados por Digital Keys a propósito para su funcionamiento.
							</li>
							<li> La comunicación con el soporte de Digital Keys se realiza a través de la dirección de correo electrónico <a href="mailto:noreply.soporte.digitalkeys@gmail.com"> noreply.soporte.digitalkeys@gmail.com </a>.
							</li>
							<li> Las leyes de diferentes países pueden hacer que algunos usuarios o proveedores no estén disponibles para usar los servicios respectivos.
								del sitio web.
							</li>
							<li> En caso de que los Términos y condiciones se traduzcan a otros idiomas y haya diferencias
								entre la versión en inglés y dicha traducción, prevalecerá la versión en inglés, a menos que se proporcione
								de lo contrario o a menos que dicha aparente inconsistencia surja de una diferencia en los requisitos legales en un
								jurisdicción específica.
							</li>
						</ol>
                    </li>
                </ol>
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
