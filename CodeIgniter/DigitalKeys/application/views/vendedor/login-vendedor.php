<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion -  DigitalKey</title>
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
        function validarLogin(){

            valor = document.getElementById("NickVendedor").value;
            if(valor.length == 0){
                alert("Falta el nick");
                return false;
            }

            valor = document.getElementById("PasswordVendedor").value;
            if(valor.length == 0){
                alert("Falta la contraseña");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="cuerpo espacidado">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Bienvenido al Panel de Vendedores</h1>

        </div>
		<div class="text-center mt-2">
			<h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
		</div>
        <div class="login espacidado">
            <form name="formularioLogin" class="user" method="post" action="<?php echo base_url() . "Vendedor/logearseVendedor"; ?>" onsubmit="return validarLogin()">
                <div class="form-group">
                    <input type="text" class="form-control-2 form-control-user" id="NickVendedor" name="NickVendedor" placeholder="Introduce tu nick">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control-2 form-control-user" id="PasswordVendedor" name="PasswordVendedor" placeholder="Contraseña">
                </div>
                <input type="submit" class="btn btn-primary-2 btn-user btn-block" id="enviar" name="enviar" value="Iniciar Sesion">
            </form>
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
						<a href="<?php echo base_url() . "Vendedor/miCuenta"; ?>">MI CUENTA</a><br>
						<br>
						<br>
					</div>
				</div>
				<div class="footer-main-3">
					<h3 class="footer-title">AYUDA</h3>
					<div class="footer-items">
						<a href="<?php echo base_url() . "FAQ"; ?>">FAQ</a><br>
						<br>
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
