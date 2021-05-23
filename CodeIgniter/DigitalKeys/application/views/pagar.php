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
	<title>Pago - DigitalKey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Realizar Pago">
	<meta name="keywords" content="digitalkeys, pago, pagar, comprar, gaming, keys, cd, clave, clave pc, steam, psn, xbox">
	<meta http-equiv="Content-Language" content="es">
	<link rel="icon" href="<?php echo base_url() . "assets/"; ?>img/logo4.png">
	<link rel="stylesheet" href="<?php echo base_url() . "assets/"; ?>css/estilos.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
			integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
			integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
			crossorigin="anonymous"></script>
	<script>
		function iniciar() {

			var estado = document.getElementById('estado');
			estado.onclick = validar;

			var button = document.getElementById('tarjeta');
			var button2 = document.getElementById('paypal');
			var button3 = document.getElementById('paysafecard');


			var clase = document.getElementsByClassName('fondo-tarjeta')[0];
			var radio = document.getElementsByClassName('radio')[0];

			var clase2 = document.getElementsByClassName('fondo-paypal')[0];
			var radio2 = document.getElementsByClassName('radio')[1];

			var clase3 = document.getElementsByClassName('fondo-paysafecard')[0];
			var radio3 = document.getElementsByClassName('radio')[2];

			button.onclick = function() {

				if (clase.style.display == 'block') {
					clase.style.display = 'none';
					radio.style.background = "none";
				}
				else {
					clase.style.display = 'block';
					radio.style.background = "white";

					clase2.style.display = 'none';
					radio2.style.background = "none";

					clase3.style.display = 'none';
					radio3.style.background = "none";
				}
			};

			button2.onclick = function() {

				if (clase2.style.display == 'block') {
					clase2.style.display = 'none';
					radio2.style.background = "none";
				}
				else {
					clase2.style.display = 'block';
					radio2.style.background = "white";

					clase.style.display = 'none';
					radio.style.background = "none";

					clase3.style.display = 'none';
					radio3.style.background = "none";
				}
			};

			button3.onclick = function() {

				if (clase3.style.display == 'block') {
					clase3.style.display = 'none';
					radio3.style.background = "none";
				}
				else {
					clase3.style.display = 'block';
					radio3.style.background = "white";

					clase.style.display = 'none';
					radio.style.background = "none";

					clase2.style.display = 'none';
					radio2.style.background = "none";
				}
			};
		}

		function redirigir(){
			location.href = '<?php  echo base_url() . "Pago/realizado"; ?>';
		}

		function validar() {

			var clase = document.getElementsByClassName('fondo-tarjeta')[0];
			var clase2 = document.getElementsByClassName('fondo-paypal')[0];
			var clase3 = document.getElementsByClassName('fondo-paysafecard')[0];

			let elementStyle = window.getComputedStyle(clase);
			let elementDisplay = elementStyle.getPropertyValue('display');

			let elementStyle2 = window.getComputedStyle(clase2);
			let elementDisplay2 = elementStyle2.getPropertyValue('display');

			let elementStyle3 = window.getComputedStyle(clase3);
			let elementDisplay3 = elementStyle3.getPropertyValue('display');

			if (elementDisplay == 'block'){

				var exp1 = new RegExp('[a-zA-Z]');
				if (exp1.test(document.getElementById("card1").value)){
					alert("Error con el numero de la tarjeta (Introduce solo numeros)");
					return false;
				}
				if (((document.getElementById("card1").value).length < 12 || (document.getElementById("card1").value).length > 18)){
					alert("Error con la longitud de la tarjeta");
					return false;
				}
				if ((document.getElementById("card2").value).length < 2 || (document.getElementById("card2").value).length > 30){
					alert("Error con el nombre del titular");
					return false;
				}
				var exp = new RegExp('[0-9]{2}/[0-9]{2}');
				if (!exp.test(document.getElementById("card3").value)){
					alert("Error con la fecha (mm/AA)");
					return false;
				}
				if ((document.getElementById("card3").value).length != 5){
					alert("Error con la fecha introduce el mes y el año (mm/AA)");
					return false;
				}
				if ((document.getElementById("card4").value).length != 3 ){
					alert("Error con el CVC");//+(document.getElementById("card4").value).length
					return false;
				}
				//alert("Tajeta");
				redirigir();
				//return true;

			}else if (elementDisplay2 == 'block'){
				if ((document.getElementById("email").value).length < 5 || (document.getElementById("email").value).length > 40){
					alert("Error con el email");
					return false;
				}
				if ((document.getElementById("pass").value).length < 1 || (document.getElementById("pass").value).length > 30){
					alert("Error con la contraseña");
					return false;
				}
				//alert("PayPal");
				redirigir();
				// return true;

			}else if (elementDisplay3 == 'block'){
				if ((document.getElementById("email2").value).length < 5 || (document.getElementById("email2").value).length > 40){
					alert("Error con el email");
					return false;
				}
				if ((document.getElementById("pass2").value).length < 2 || (document.getElementById("pass2").value).length > 30){
					alert("Error con la contraseña");
					return false;
				}
				if ((document.getElementById("codigo").value).length < 8 || (document.getElementById("codigo").value).length > 16){
					alert("Error con el codigo");
					return false;
				}
				//alert("PaySafe");
				redirigir();
				//return true;
			}else {
				alert("Debes elegir un metodo de pago")
			}
		}
	</script>
</head>
<body onload="iniciar()">
<div id="page-top">&nbsp;</div>
<header class="barra-navegacion pt-2 fixed-top">
	<nav class="navbar navbar-expand  topbar mb-2">
		<div class="barra-principal">
			<div class=" row mx-auto">

				<a class="navbar-brand" href="<?php echo base_url(); ?>">
					<img class="img-logo" src="<?php echo base_url() . "assets/"; ?>img/logo2.png" alt="Logo de la empresa" title="Logo"/>
				</a>

				<form class="d-none d-md-inline-block form-inline mt-3 mw-100 navbar-search barra-busqueda"
					  action="<?php echo base_url() . "Productos/buscar"; ?>" method="post">
					<div class="input-group" data-children-count="1">
						<input type="text" id="buscar" name="buscar"
							   class="form-control borde-buscar bg-light border-0 small" placeholder="Buscar">
						<div class="input-group-append btn-lupa">
							<button class="btn" type="submit">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</form>

				<div class="navbar-nav barra-botones">

					<li class="nav-item dropdown no-arrow d-md-none">
						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
						   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search fa-fw"></i>
						</a>

						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
							 aria-labelledby="searchDropdown">
							<form class="form-inline mr-auto w-100 navbar-search"
								  action="<?php echo base_url() . "Productos/buscar"; ?>" method="post">
								<div class="input-group" data-children-count="1">
									<input type="text" class="form-control bg-light border-0 small" id="buscar"
										   name="buscar" placeholder="Buscar" aria-label="Buscar"
										   aria-describedby="basic-addon2">
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

	<div class="divisoria-2">
		<div class="linea-divisoria-2"></div>
	</div>

</header>
<div class="categorias"></div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-modal="true">
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
				<a class="btn btn-cerrar-sesion" href="<?php echo base_url() . "User/cerrarSesion"; ?>">Cerrar
					Sesión</a>
			</div>
		</div>
	</div>
</div>

<div class="cuerpo">
	<div class="container espacidado">
		<div class="divisoria-2"><h3 class="titulo-h3">Metodos de Pago</h3>
			<div class="linea-divisoria-4"></div>
		</div>
		<div class="flex espacidado">
			<div class="menu-carrito-producto">
				<div class="tarjeta">
					<div id="tarjeta" class="radioLabel pagos"><span class="radio"></span>
						<div><h4>Tarjeta de crédito</h4>
							<p>Paga con tarjeta de crédito Maestro, Mastercard o Visa</p></div>
						<div class="imagen-pagos"><img src="https://cdn-products.eneba.com/payments/v2/color/checkout.svg" alt="Tarjeta de crédito"></div>
					</div>
					<div class="fondo-tarjeta">
						<div class="vista-tarjeta">
							<div class="tarjeta1">
								<label class="titulo1-tarjeta-pago" for="cardnumber">
									<span class="titulo-pagos">Número de tarjeta </span>
									<input  name="cardHolder" id="card1"class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
								<label for="cardHolder">
									<span class="titulo-pagos">Nombre del titular de la tarjeta </span>
									<input name="cardHolder" id="card2" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
								<label for="exp-date">
									<span class="titulo-pagos">Fecha de caducidad</span>
									<input name="cardHolder" id="card3" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
							</div>
							<div class="tarjeta2">
								<label class="cvc-pago-tarjeta" for="cvc">
									<span class="titulo-pagos">cvc</span>
									<input name="cardHolder" id="card4" class="input-pagos-cvc" autocomplete="off" id="cardHolder">
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="paypal">
					<div id="paypal" class="radioLabel pagos"><span class="radio"></span>
						<div><h4>Paypal</h4></div>
						<div class="imagen-pagos"><img src="https://cdn-products.eneba.com/payments/v2/color/braintree_paypal.svg" alt="Paypal"></div>
					</div>
					<div class="fondo-paypal">
						<div class="vista-paypal">
							<div class="tarjeta1">
								<label class="titulo1-tarjeta-pago" for="cardnumber">
									<span class="titulo-pagos">Email</span>
									<input id="email" type="email" name="cardHolder" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
								<label class="titulo1-tarjeta-pago" for="cardHolder">
									<span class="titulo-pagos">Contraseña</span>
									<input id="pass" type="password" name="cardHolder" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="paysafecard">
					<div id="paysafecard" class="radioLabel pagos"><span class="radio"></span>
						<div><h4>Paysafecard</h4>
							<p>Paga a través de Paysafecard - no se necesita cuenta bancaria o tarjeta de crédito.</p>
						</div>
						<div class="imagen-pagos"><img src="https://cdn-products.eneba.com/payments/v2/color/paysafecard.svg" alt="Paysafecard"></div>
					</div>
					<div class="fondo-paysafecard">
						<div class="vista-paysafecard">
							<div class="tarjeta1">
								<label class="titulo1-tarjeta-pago" for="cardnumber">
									<span class="titulo-pagos">Email</span>
									<input id="email2" type="email" name="cardHolder" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
								<label class="titulo1-tarjeta-pago" for="cardHolder">
									<span class="titulo-pagos">Contraseña</span>
									<input type="password" id="pass2" name="cardHolder" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
								<label class="titulo1-tarjeta-pago" for="cardnumber">
									<span class="titulo-pagos">Codigo</span>
									<input id="codigo"name="cardHolder" class="input-pagos" autocomplete="off" id="cardHolder">
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if (count($carrito[0]) > 0){
				$precioTotal = 0;
				$longitud = count($carrito);
				for ($j = 0; $j < $longitud; $j++){
					$nombreProducto = str_replace(" ","-",$carrito[$j][0]['nombre']);
					$precioTotal = $precioTotal + $carrito[$j][0]["precio"];
				}
				//-------------------------------
				echo '<div class="carrito">';
				echo '<h2 class="carrito-precio-total">Resumen</h2><div class="divisoria-2"><div class="linea-divisoria-2"></div></div>';
				echo '<div class="carrito-precio-total">';
				echo 'Productos';
				echo '<span class="carrito-precio-total-2">'.$longitud.'</span>';
				echo '</div>';
				echo '<div class="carrito-precio-total">';
				echo 'Total';
				echo '<span class="carrito-precio-total-2">'.$precioTotal.'€</span>';
				echo '</div>';
				echo '<div id="pago" class="carrito-precio-total-pagar">';
				printf('<button id="estado" type="button" class="btn-carrito-pagar">Continuar&nbsp;&nbsp;<i class="fas fa-fw fa-shopping-cart"></i></button>');
				echo '</div>';
				echo '</div>';
				echo '</div>';
				//-------------
				echo '</div>';

				//---
				echo '<div class="container espacidado">';
				echo '<div class="carrito-2">';
				echo '<h2 class="carrito-precio-total">Resumen</h2><div class="divisoria-2"><div class="linea-divisoria-2"></div></div>';
				echo '<div class="carrito-precio-total">';
				echo 'Productos&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<span class="carrito-precio-total-2">'.$longitud.'</span>';
				echo '</div>';
				echo '<div class="carrito-precio-total">';
				echo 'Total&nbsp;&nbsp;&nbsp;&nbsp;';
				echo '<span class="carrito-precio-total-2">'.$precioTotal.'€</span>';
				echo '</div>';
				echo '<div id="pago" class="carrito-precio-total-pagar">';
				printf('<button id="estado" type="button" class="btn-carrito-pagar">Continuar&nbsp;&nbsp;<i class="fas fa-fw fa-shopping-cart"></i></button>');
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}else{
				echo '<div class="container-fluid espacidado">';
				echo 'Error';
				echo '<script>location.href = "'.base_url() . "User/carrito".'"</script>';
				echo '</div>';
			}
			?>
		</div>
		<div class="espacidado"></div>
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
		<div class="divisoria">
			<div class="linea-divisoria"></div>
		</div>
		<div id="redes">
			<h4>Siguenos en</h4>
			<a class="btn-red btn-social" href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
			<a class="btn-red btn-social" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
			<a class="btn-red btn-social" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
		</div>
		<div class="divisoria">
			<div class="linea-divisoria"></div>
		</div>
		<div id="copyright">Copyright &copy; 2021 DigitalKeys - All rights reserved</div>
	</div>
</footer>
</body>
</html>
