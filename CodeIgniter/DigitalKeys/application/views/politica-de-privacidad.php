<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio -  DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Politica de Privacidad">
	<meta name="keywords" content="digitalkeys, privacidad, venta, claves, cd, clave cd">
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
            <div class="divisoria-2"><h3 class="titulo-h3">POL??TICA DE PRIVACIDAD</h3><div class="linea-divisoria-4"></div></div>

            <div class="container espacidado">
                <div class="temas-legales">
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Versi??n 1.1, ??ltima enmienda 2020-03-04</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En esta pol??tica de privacidad, nosotros, UAB Helis Play, c??digo de entidad legal 304923415, con nuestro domicilio social en Zaragozau Calle la Gasca, 7, Espa??a (" </font></font><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Digital Keys</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> "), explicamos c??mo manejamos sus datos personales cuando visita nuestro sitio web y utilice nuestros servicios.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Le pediremos su consentimiento para nuestro uso de cookies de acuerdo con los t??rminos de este aviso cuando visite nuestro sitio web por primera vez.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nuestro sitio web incorpora controles de privacidad que le brindan controles para decidir c??mo procesaremos sus datos personales. </font><font style="vertical-align: inherit;">Mediante el uso de controles de privacidad, puede especificar si desea recibir comunicaciones de marketing directo.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En este aviso encontrar?? las respuestas a las siguientes preguntas:</font></font></p>
                    <ol style="list-style-type: lower-alpha;">
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">c??mo usamos sus datos;</font></font></strong></li>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cuando proporcionamos sus datos a otros;</font></font></strong></li>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cu??nto tiempo almacenamos sus datos;</font></font></strong></li>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">cu??l es nuestra pol??tica de marketing;</font></font></strong></li>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">qu?? derechos relacionados con los datos personales posee;</font></font></strong></li>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">c??mo usamos las cookies;</font></font></strong></li>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">otras cuestiones que debes tener en cuenta.</font></font></strong></li>
                    </ol>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En caso de cualquier consulta o si desea ejercer alguno de sus derechos previstos en este aviso, puede enviar dichas consultas y solicitudes a trav??s de los medios proporcionados en la </font><font style="vertical-align: inherit;">secci??n </font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Puede contactarnos con respecto a todos los problemas relacionados con la privacidad por correo electr??nico: </font></font><a href="mailto:noreply.soporte.digitalkeys@gmail.com"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">noreply.soporte.digitalkeys@gmail.com</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> .</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Todos los t??rminos utilizados en los T??rminos y Condiciones de Digital Keys tienen el mismo significado que en esta Pol??tica de Privacidad.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En el caso de que la Pol??tica de privacidad se traduzca a otros idiomas y si existen diferencias entre la versi??n en ingl??s y dicha traducci??n, prevalecer?? la versi??n en ingl??s, a menos que se indique lo contrario.</font></font></p>
                    <ol>
                        <li><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">??C??mo utilizamos sus datos personales?</font></font></strong>
                            <ol>
                                <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Esta secci??n proporciona la siguiente informaci??n:
                                </font></font><ol style="list-style-type: lower-alpha;">
                                    <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">categor??as de datos personales que procesamos;</font></font></li>
                                    <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">en caso de que los datos personales que no obtuvimos directamente de usted, la fuente y las categor??as espec??ficas de esos datos;</font></font></li>
                                    <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">los fines para los que podemos procesar sus datos personales; </font><font style="vertical-align: inherit;">y</font></font></li>
                                    <li><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">las bases legales del tratamiento.</font></font></li>
                                </ol>
                                </li>
								<li> <font style = "vertical-align: heredar;"> <font style = "vertical-align: heredar;"> Procesamos datos sobre su uso de nuestro sitio web y servicios ("datos de uso"). </font> <font style = "vertical-align: heritage;"> Los datos de uso pueden incluir su direcci??n IP, ubicaci??n geogr??fica, tipo y versi??n de navegador, sistema operativo, fuente de referencia, duraci??n de la visita, visitas a la p??gina y rutas de navegaci??n del sitio web, as?? como informaci??n sobre el tiempo, la frecuencia y el patr??n de su servicio. </font> <font style = "vertical-align: heredar;"> Obtenemos dichos datos mediante el uso de cookies y tecnolog??as similares. </font> <font style = "vertical-align: heritage;"> Procesamos dichos datos para comprender mejor c??mo utiliza nuestro sitio web y nuestros servicios. </font> <font style = "vertical-align: heritage;"> La base legal para este procesamiento es nuestro inter??s leg??timo, es decir, monitorear y mejorar nuestro sitio web y nuestros servicios y adaptar los servicios a los intereses individuales de cada usuario. </font> </font> </li>
								<li> Procesamos los datos de su cuenta & nbsp; ("datos de la cuenta"). Los datos de la cuenta pueden incluir su nombre y direcci??n de correo electr??nico, n??mero de tel??fono y otros datos que proporcione al registrarse, as?? como su historial de compras. Obtenemos dichos datos directamente de usted. Procesamos los datos de la cuenta con el fin de operar nuestro sitio web, proporcionar nuestros servicios, garantizar la seguridad de nuestro sitio web y nuestros servicios y comunicarnos con usted. La base legal para este procesamiento es la ejecuci??n de un contrato entre usted y nosotros y / o tomar medidas, a petici??n suya, para celebrar dicho contrato, as?? como nuestro inter??s leg??timo, es decir, monitorear y mejorar nuestro sitio web y nuestros servicios. </ li>
								<li> Procesamos informaci??n relacionada con la prestaci??n de nuestros servicios a usted en nuestro sitio web & nbsp; ("datos de transacciones"). Los datos de la transacci??n pueden incluir sus datos de contacto, los datos de la cuenta bancaria y los datos de la transacci??n. Los datos de la transacci??n se procesan para suministrar bienes de compra y proporcionar servicios y mantener registros adecuados de esas transacciones. La base legal para este procesamiento es la ejecuci??n de un contrato entre usted y nosotros y / o tomar medidas, a petici??n suya, para celebrar dicho contrato y nuestros intereses leg??timos, es decir, la administraci??n adecuada de nuestro sitio web y nuestro negocio. </ Li >
								<li> Procesamos informaci??n relacionada con las medidas de prevenci??n de blanqueo de capitales & nbsp; ("datos ALD"). Los datos AML tambi??n pueden incluir direcci??n o residencia, documentaci??n de identificaci??n, incluida su foto, documentos relacionados con su fuente de riqueza, factura de servicios p??blicos y otros. La ley nos exige que solicitemos dicha informaci??n para cumplir con las obligaciones de "conocer a su cliente". </li>
								<li> Podemos procesar la informaci??n que nos proporciona con el fin de suscribirse a nuestros mensajes de correo electr??nico y boletines informativos & nbsp; ("datos de mensajer??a"). Los datos de los mensajes se procesan para enviarle los mensajes y boletines informativos relevantes. La base legal para este procesamiento es su consentimiento. Adem??s, si ya le hemos vendido productos o le hemos brindado servicios en nuestro sitio web y no se opone, tambi??n podemos procesar los datos de mensajer??a sobre la base de nuestro inter??s leg??timo, es decir, buscar mantener y mejorar las relaciones con los clientes. </li>
								<li> Podemos procesar informaci??n relacionada con cualquier comunicaci??n que nos env??e & nbsp; ("datos de correspondencia"). Los datos de correspondencia pueden incluir el contenido de la comunicaci??n y los metadatos asociados con la comunicaci??n. En caso de comunicaci??n a trav??s de nuestro sitio web, el sitio web generar?? los metadatos asociados a las comunicaciones realizadas mediante los formularios de contacto del sitio web. Los datos de correspondencia se procesan con el fin de comunicarse con usted y mantener registros. La base legal para este procesamiento son nuestros intereses leg??timos, a saber, la administraci??n adecuada de nuestro sitio web y nuestro negocio, asegurando una pr??ctica de consulta uniforme y de alta calidad y para investigar disputas entre usted y nuestros empleados. </li>
								<li> Podemos procesar cualquiera de sus datos personales identificados en este aviso cuando sea necesario para el establecimiento, ejercicio o defensa de reclamos legales, ya sea en procedimientos judiciales o en un procedimiento administrativo o extrajudicial. La base legal para este procesamiento son nuestros intereses leg??timos, es decir, la protecci??n y afirmaci??n de nuestros derechos legales, sus derechos legales y los derechos legales de otros. </li>
								<li> Podemos procesar cualquiera de sus datos personales identificados en este aviso cuando sea necesario con el fin de obtener o mantener una cobertura de seguro, administrar riesgos u obtener asesoramiento profesional. La base legal para este procesamiento son nuestros intereses leg??timos, es decir, la protecci??n adecuada de nuestro negocio contra los riesgos. </li>
								<li> Adem??s de los prop??sitos espec??ficos para los cuales podemos procesar sus datos personales establecidos en esta Secci??n, tambi??n podemos procesar cualquiera de sus datos personales cuando dicho procesamiento sea necesario para cumplir con una obligaci??n legal a la que estamos sujetos, o para proteger sus intereses vitales o los intereses vitales de otra persona. persona f??sica. </li>
							</ol>
                        </li>
                        <li><strong> ??Cu??ndo proporcionamos sus datos a otras personas? </strong>
							<ol>
								<li> Podemos divulgar sus datos personales & nbsp; a cualquier miembro de nuestro grupo de empresas & nbsp; (incluidas nuestras subsidiarias, nuestra sociedad de cartera final y todas sus subsidiarias) en la medida en que sea razonablemente necesario para los fines establecidos en este aviso. Esto puede incluir prop??sitos de administraci??n interna, as?? como la provisi??n / uso compartido de servicios de TI o centros de datos en el grupo. </li>
								<li> Podemos divulgar sus datos personales & nbsp; a nuestras aseguradoras y / o asesores profesionales & nbsp; en la medida en que sea razonablemente necesario con el fin de obtener o mantener una cobertura de seguro, gestionar riesgos, obtener asesoramiento profesional o establecer, ejercer o defender reclamaciones legales. , ya sea en un procedimiento judicial o en un procedimiento administrativo o extrajudicial. </li>
								<li> Podemos divulgar sus datos personales a nuestros proveedores antifraude, de riesgos y de cumplimiento & nbsp; en la medida en que sea razonablemente necesario para proteger sus datos personales y cumplir con nuestras obligaciones legales. </li>
								<li> Podemos divulgar sus datos personales & nbsp; a nuestros proveedores de servicios de pago. Compartiremos los datos de las transacciones con nuestros proveedores de servicios de pago solo en la medida necesaria para procesar sus pagos, transferir fondos y tratar las quejas y consultas relacionadas con dichos pagos y transferencias. </li>
								<li> Podemos divulgar sus datos personales & nbsp; a otros proveedores de servicios & nbsp; en la medida en que sea razonablemente necesario para proporcionar servicios espec??ficos (incluidos, proveedores de servidores y mantenimiento de los mismos, proveedores de servicios de correo electr??nico). Tomamos todas las medidas necesarias para garantizar que dichos subcontratistas implementen las medidas organizativas y t??cnicas adecuadas para garantizar la seguridad y privacidad de sus datos personales. </li>
								<li> Adem??s de las divulgaciones espec??ficas de datos personales establecidas en esta Secci??n, podemos divulgar sus datos personales cuando dicha divulgaci??n sea necesaria para cumplir con una obligaci??n legal a la que estamos sujetos, o para proteger sus intereses vitales o los intereses vitales de otra persona f??sica. </li>
								<li> Las personas indicadas en esta secci??n pueden estar establecidas fuera de la Rep??blica de Lituania, la Uni??n Europea y el Espacio Econ??mico Europeo. En caso de que transfiramos sus datos personales a dichas personas, tomaremos todas las medidas necesarias y en los actos legales indicados para garantizar que su privacidad permanezca debidamente protegida, incluida, en su caso, la firma de cl??usulas contractuales est??ndar para la transferencia de datos. Para obtener m??s informaci??n sobre las medidas de seguridad adecuadas, puede comunicarse con nosotros por correo electr??nico: <a href="mailto:noreply.soporte.digitalkeys@gmail.com"> noreply.soporte.digitalkeys@gmail.com </a>. </li>
							</ol>
                        </li>
                        <li><strong> ??Cu??nto tiempo almacenamos sus datos? </strong>
							<ol>
								<li> Sus datos personales que procesamos para cualquier prop??sito o prop??sitos no se conservar??n por m??s tiempo del necesario para ese prop??sito o esos prop??sitos. En cualquier caso, no se conservar?? m??s de:
									<ol style = "list-style-type: lower-alpha;">
										<li> los datos de la cuenta se conservar??n por no m??s de 5 (cinco) a??os despu??s de su ??ltima actualizaci??n en la cuenta; </li>
										<li> los datos de las transacciones se conservar??n durante no m??s de 10 (diez) a??os despu??s de la finalizaci??n de la prestaci??n de los servicios; </li>
										<li> Los datos de AML & nbsp; se conservar??n mientras sea necesario para cumplir con los requisitos legales relacionados; </li>
										<li> los datos de mensajer??a & nbsp; se conservar??n mientras su Cuenta est?? activa, a menos que retire su consentimiento antes; </li>
										<li> los datos de correspondencia & nbsp; se conservar??n durante no m??s de 6 (seis) meses despu??s de la finalizaci??n de dicha comunicaci??n. </li>
									</ol>
								</li>
								<li> En algunos casos, no es posible que especifiquemos por adelantado los per??odos durante los cuales se conservar??n sus datos personales. I. & nbsp; e. Los datos de uso & nbsp; se conservar??n tanto como sea necesario para los fines de procesamiento relevantes. </li>
								<li> Sin perjuicio de las dem??s disposiciones de esta Secci??n, podemos retener sus datos personales cuando dicha retenci??n sea necesaria para cumplir con una obligaci??n legal a la que estamos sujetos, o para proteger sus intereses vitales o los intereses vitales de otra persona f??sica. . </li>
							</ol>
                        </li>
                        <li><strong> Mensajes de marketing </strong>
							<ol>
								<li> En caso de que d?? su consentimiento, le enviaremos mensajes de marketing por correo electr??nico y / o dejaremos una notificaci??n en una Cuenta para informarle sobre lo que estamos haciendo. </li>
								<li> Adem??s, si ya le hemos brindado servicios y no se opone, le informaremos sobre nuestros otros productos que podr??an interesarle, incluida otra informaci??n relacionada con los mismos. </li>
								<li> Puede optar por no recibir mensajes de marketing en cualquier momento. </li>
								<li> Puede hacerlo de la siguiente manera:
									<ol style = "list-style-type: lower-alpha;">
										<li> elegir el enlace relevante en cualquiera de nuestros mensajes de marketing; </li>
										<li> poni??ndose en contacto con nosotros a trav??s de los medios proporcionados en la secci??n Tickets. </li>
									</ol>
								</li>
								<li> Una vez que haya cumplido con cualquiera de las acciones proporcionadas, actualizaremos su perfil para asegurarnos de que no recibir?? nuestros mensajes de marketing en el futuro. </li>
								<li> Tenga en cuenta que, dado que nuestras actividades comerciales consisten en una red de servicios estrechamente relacionados, pueden pasar algunos d??as hasta que se actualicen todos los sistemas, por lo que puede continuar recibiendo mensajes de marketing mientras a??n estamos procesando su solicitud. <li> / li>
								<li> La exclusi??n voluntaria de los mensajes de marketing no impedir?? que reciba mensajes directamente relacionados con la prestaci??n de servicios. </li>
							</ol>
                        </li>
                        <li><strong> Tus derechos </strong>
							<ol>
								<li> En esta secci??n, hemos resumido los derechos que tiene seg??n las leyes de protecci??n de datos. Algunos de los derechos son complejos, por lo que solo proporcionamos los aspectos principales de dichos derechos. En consecuencia, debe leer las leyes pertinentes y la orientaci??n de las autoridades reguladoras para obtener una explicaci??n completa de estos derechos. </li>
								<li> Sus otros derechos principales bajo la ley de protecci??n de datos son los siguientes:
									<ol style = "list-style-type: lower-alpha;">
										<li> el derecho a acceder a los datos; </li>
										<li> el derecho de rectificaci??n (tenga en cuenta que puede ejercer la mayor parte de este derecho iniciando sesi??n en su cuenta) </li>
										<li> el derecho a borrar sus datos personales; </li>
										<li> el derecho a restringir el procesamiento de sus datos personales; </li>
										<li> el derecho a oponerse al procesamiento de sus datos personales; </li>
										<li> el derecho a la portabilidad de datos; </li>
										<li> el derecho a presentar una queja ante una autoridad supervisora; y </li>
										<li> el derecho a retirar el consentimiento. </li>
									</ol>
								</li>
								<li> El derecho a acceder a los datos. Tiene derecho a que se le confirme si procesamos o no sus datos personales y, cuando lo hagamos, accedamos a los datos personales, junto con cierta informaci??n adicional. Esa informaci??n adicional incluye detalles de los prop??sitos del procesamiento, las categor??as de datos personales en cuesti??n y los destinatarios de los datos personales. Siempre que los derechos y libertades de los dem??s no se vean afectados, le proporcionaremos una copia de sus datos personales. La primera copia se proporcionar?? sin cargo, pero las copias adicionales pueden estar sujetas a una tarifa razonable. </li>
								<li> El derecho a la rectificaci??n. Tiene derecho a que se rectifique cualquier dato personal inexacto sobre usted y, teniendo en cuenta los fines del procesamiento, a que se complete cualquier dato personal incompleto sobre usted. </li>
								<li> En algunas circunstancias, tiene derecho a que se borren sus datos personales. Esas circunstancias incluyen cuando: (i) los datos personales ya no son necesarios en relaci??n con los fines para los que fueron recopilados o procesados; (ii) retira su consentimiento para el procesamiento basado en el consentimiento y no existe otra base legal para procesar los datos; (iii) se opone al procesamiento bajo ciertas reglas de las leyes de protecci??n de datos aplicables; (iv) el procesamiento es para fines de marketing directo; o (v) los datos personales han sido procesados ??????ilegalmente. Sin embargo, existen exclusiones del derecho a borrar. Tales exclusiones incluyen cuando el procesamiento es necesario: (i) & nbsp; para ejercer el derecho a la libertad de expresi??n e informaci??n; (ii) & nbsp; para el cumplimiento de nuestra obligaci??n legal; o (iii) para el establecimiento, ejercicio o defensa de reclamos legales. </li>
								<li> En algunas circunstancias, tiene derecho a restringir el procesamiento de sus datos personales. Esas circunstancias son cuando: (i) impugna la exactitud de los datos personales; (ii) & nbsp; el procesamiento es ilegal pero usted se opone al borrado; (iii) ya no necesitamos los datos personales para los fines de nuestro procesamiento, pero usted necesita datos personales para el establecimiento, ejercicio o defensa de reclamos legales; y (iv) se ha opuesto al procesamiento, a la espera de la verificaci??n de dicha objeci??n. Cuando el procesamiento se haya restringido sobre esta base, podemos continuar almacenando sus datos personales, sin embargo, solo procesaremos dichos datos de cualquier otra manera: (i) con su consentimiento; (ii) para el establecimiento, ejercicio o defensa de reclamaciones legales; (iii) para la protecci??n de los derechos de otra persona; o (iv) por razones de inter??s p??blico importante. </li>
								<li> Tiene derecho a oponerse a nuestro procesamiento de sus datos personales & nbsp; por motivos relacionados con su situaci??n particular, pero solo en la medida en que la base legal para el procesamiento sea que el procesamiento es necesario para: el desempe??o de una tarea realizadas en inter??s p??blico o con fines de intereses leg??timos perseguidos por nosotros o por un tercero. Si realiza tal objeci??n, dejaremos de procesar la informaci??n personal a menos que podamos demostrar motivos leg??timos convincentes para el procesamiento que anulan sus intereses, derechos y libertades, o el procesamiento es para el establecimiento, ejercicio o defensa de reclamos legales. < / li>
								<li> Tiene derecho a oponerse a nuestro procesamiento de sus datos personales con fines de marketing directo & nbsp; (incluida la elaboraci??n de perfiles con fines de marketing directo). Si hace tal objeci??n, dejaremos de procesar sus datos personales para este prop??sito. </li>
								<li> Tiene derecho a oponerse a nuestro procesamiento de sus datos personales con fines de investigaci??n cient??fica o hist??rica o con fines estad??sticos & nbsp; por motivos relacionados con su situaci??n particular, a menos que el procesamiento sea necesario para el desempe??o de una tarea realizada por razones de inter??s p??blico. </li>
								<li> El derecho a la portabilidad de datos. En la medida en que la base legal para nuestro procesamiento de sus datos personales sea:
									<ol style = "list-style-type: lower-alpha;">
										<li> consentimiento </li>
										<li> la ejecuci??n de un contrato o los pasos que se deben tomar a petici??n suya antes de celebrar un contrato, necesarios para celebrarlo, & nbsp; tiene derecho a recibir sus datos personales de nuestra parte en una m??quina estructurada, de uso com??n y formato legible. Sin embargo, este derecho no se aplica cuando afecte negativamente los derechos y libertades de los dem??s. </li>
									</ol>
								</li>
								<li> Si considera que nuestro procesamiento de su informaci??n personal infringe las leyes de protecci??n de datos, tiene el derecho legal de presentar una queja ante una autoridad supervisora ??????& nbsp; responsable de la protecci??n de datos. Puede hacerlo en el estado miembro de la UE de su residencia habitual, su lugar de trabajo o el lugar de la presunta infracci??n. Nuestro procesamiento de datos est?? supervisado por la Inspecci??n Estatal de Protecci??n de Datos de Espa??a, con domicilio social en Zaragoza Calle La Gasca. </li>
								<li> En la medida en que la base legal para nuestro procesamiento de su informaci??n personal sea el consentimiento, tiene derecho a retirar ese consentimiento en cualquier momento. El retiro no afectar?? la legalidad del procesamiento antes del retiro. </li>
								<li> Adem??s de la medida espec??fica provista en esta Secci??n o en el sitio web, tambi??n puede ejercer cualquiera de los derechos aqu?? indicados comunic??ndose con nosotros a trav??s de un Ticket </li>
							</ol>
						</li>
                        <li><strong> Acerca de las cookies </strong>
							<ol>
								<li> Las cookies son peque??os archivos de texto que contienen un identificador que un servidor web env??a a su navegador web y es almacenado por el navegador. Luego, el identificador se env??a de vuelta al servidor cada vez que el navegador solicita una p??gina del servidor. </li>
								<li> Las cookies no suelen contener informaci??n que identifique personalmente a un usuario, pero la informaci??n personal que almacenamos sobre usted puede estar vinculada a la informaci??n almacenada y obtenida de las cookies. </li>
							</ol>
						</li>
						<li> <strong> Cookies que utilizamos </strong>
							<p> En el sitio web utilizamos cookies de cuatro tipos principales, para los siguientes fines: </p>
							<ol style = "list-style-type: lower-alpha;">
								<li> Cookies necesarias: estas cookies son necesarias para que el sitio web funcione y no se pueden desactivar en nuestros sistemas. Por lo general, solo se establecen en respuesta a acciones realizadas por usted que equivalen a una solicitud de servicios, como establecer sus preferencias de privacidad, iniciar sesi??n o completar formularios. Puede configurar su navegador para bloquear o alertar sobre estas cookies, pero algunas partes del sitio no funcionar??n; </li>
								<li> Cookies anal??ticas: estas cookies nos permiten contar las visitas y las fuentes de tr??fico, para que podamos medir y mejorar el rendimiento de nuestro sitio. Nos ayudan a saber qu?? p??ginas son las m??s y las menos populares y a ver c??mo se mueven los visitantes por el sitio. Toda la informaci??n que recopilan estas cookies es agregada y, por lo tanto, an??nima. Si no permite estas cookies, no sabremos cu??ndo ha visitado nuestro sitio; </li>
								<li> Cookies de preferencia: estas cookies permiten que un sitio web recuerde informaci??n que cambia la forma en que se comporta o se ve el sitio web, como su regi??n preferida. </li>
								<li> Cookies de marketing: nuestros socios publicitarios pueden establecer estas cookies a trav??s de nuestro sitio. Estas empresas pueden utilizarlos para crear un perfil de sus intereses y mostrarle anuncios relevantes en otros sitios. No almacenan directamente informaci??n personal, sino que se basan en la identificaci??n ??nica de su navegador y dispositivo de Internet. Si no permite estas cookies, experimentar?? publicidad menos dirigida. </li>
							</ol>
                        </li>
                        <li><strong> Cookies utilizadas por nuestros proveedores de servicios </strong>
							<ol>
								<li> Nuestros proveedores de servicios utilizan cookies y esas cookies pueden almacenarse en su computadora cuando visita nuestro sitio web. </li>
								<li> Usamos:
									<ol style = "list-style-type: lower-alpha;">
										<li> Cookies de Hotjar & nbsp; para observar c??mo los usuarios interact??an con nuestro sitio web. Las cookies utilizadas para este fin nos ayudan a observar el rendimiento del sitio web y analizar c??mo podemos mejorarlo. Hotjar almacena esta informaci??n en un perfil de usuario seudonimizado. Hotjar no procesa esta informaci??n para identificar usuarios individuales o para compararla con datos adicionales sobre un usuario individual. Puede ver la pol??tica de privacidad de Hotjar  </li>
										<li> Cookies de Google & nbsp; para observar el tr??fico de nuestro sitio web, controlar las cookies publicitarias, mostrar videos incrustados y hacer que los anuncios que ve sean m??s relevantes para usted. Las cookies utilizadas para este prop??sito nos ayudan a medir el rendimiento del sitio web, distribuir correctamente los anuncios y el contenido del sitio web a los usuarios. Puede ver la pol??tica de privacidad de Google </li>
										<li> Cookies de Facebook & nbsp; para administrar la visualizaci??n de anuncios a nuestros usuarios. Las cookies utilizadas para este fin nos ayudan a distinguir a los usuarios que ya utilizan nuestros servicios y a reducir o dejar de mostrar nuestros anuncios a dichos usuarios. Puede ver la pol??tica de privacidad de Facebook </li>
										<li> Cookies de Criteo & nbsp; para personalizar nuestras campa??as de marketing y ofrecer anuncios relevantes a nuestros visitantes. La tecnolog??a nos permite recopilar una cantidad limitada de datos relacionados con su navegaci??n, como los productos que ha visto, puesto en su carrito de compras y comprado. No utiliza ning??n dato que nos permita identificarle directamente, como su nombre y apellido, direcci??n postal, direcci??n de correo electr??nico en texto plano, etc. Puede consultar la pol??tica de privacidad de criteo  </li>
										<li> Cookies de Microsoft Bing & nbsp; para personalizar nuestras campa??as de marketing y ofrecer anuncios relevantes a nuestros visitantes. Bing Ads quiere asegurarle que cualquier informaci??n que se recopile permanecer?? an??nima y no se podr?? utilizar para identificarlo. Puede leer m??s sobre la pol??tica de privacidad de publicidad de Microsoft Bing </li>
										<li> Cookies PostAffiliatePro & nbsp; para realizar un seguimiento del rendimiento de nuestro canal de marketing y atribuir las ganancias en funci??n de las ventas realizadas. Puede ver la pol??tica de privacidad de PostAffiliatePro ; </ li>
									</ol>
								</li>
							</ol>
                        </li>
                        <li><strong> ??C??mo puede administrar las cookies? </strong>
							<ol>
								<li> La mayor??a de los navegadores le permiten negarse a aceptar cookies y eliminar cookies. Los m??todos para hacerlo var??an de un navegador a otro y de una versi??n a otra. Sin embargo, puede obtener informaci??n actualizada sobre el bloqueo y la eliminaci??n de cookies a trav??s de la informaci??n proporcionada en el sitio web del navegador correspondiente, por ejemplo,  Chrome, Firefox, Internet Explorer, Safari. </li>
								<li> El bloqueo de todas las cookies tendr?? un impacto negativo en la usabilidad de muchos sitios web. </li>
								<li> Si bloquea las cookies, no podr?? utilizar todas las funciones de nuestro sitio web. </li>
								<li> Puede ajustar sus preferencias de cookies haciendo clic en el enlace Preferencias de cookies en el pie de p??gina de la p??gina. </li>
							</ol>
                        </li>
                        <li><strong> Sitios web de terceros </strong>
							<p> En el sitio web puede encontrar enlaces hacia y desde sitios asociados, fuentes de informaci??n y sitios web de partes relacionadas. Tenga en cuenta que los sitios web de terceros que visitar?? al hacer clic en los enlaces tienen sus propias pol??ticas de privacidad y no asumimos ninguna responsabilidad con respecto a dichas pol??ticas de privacidad. Recomendamos familiarizarse con las pol??ticas de privacidad de dichos sitios web antes de proporcionarles datos personales. </p>
						</li>
                        <li><strong> Datos personales de ni??os </strong>
							<ol>
								<li> Nuestro sitio web y nuestros servicios est??n dirigidos a personas mayores de 16 a??os u otra edad seg??n las leyes del pa??s respectivo, lo que le permite asumir la responsabilidad de las obligaciones que surgen de las relaciones contractuales y tiene plena capacidad para emprender acciones legales. </li>
								<li> Si tenemos motivos para creer que tenemos datos personales de una persona menor de esa edad en nuestras bases de datos sin el consentimiento del titular de los derechos de los padres, eliminaremos esos datos personales. </li>
							</ol>
						</li>
						<li> <strong> Actualizaci??n de sus datos </strong>
							<p> H??ganos saber si la informaci??n personal que tenemos sobre usted necesita ser corregida o actualizada. </p>
						</li>
						<li> <strong> Cambios en el aviso </strong>
							<p> Cualquier cambio a este aviso se publicar?? en el sitio web y, en caso de cambios materiales, podemos informarle por correo electr??nico. </p>
						</li>
                    </ol></div>
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
