<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login() {
		$this->load->view('login');
	}
    public function logearse() {

        //Se obtienen los parametros introducidos por POST
        $nick = $this->cifrado->supercifrar($this->input->post('NickLogin'));
        $pass = $this->input->post('PasswordLogin');

        $this->load->model('UserModel');

        //Se comprueba si los datos de login son correctos
        if ($nick && $pass && $this->UserModel->validate_user($nick, $pass)) {
            $data['texto'] = "esto es un mensaje";

			$this->load->model('AdminModel');

			$data['banner'] = $this->AdminModel->obtenerBannersActivos();
			$data['novedades'] = $this->UserModel->obtenerNovedades();
			$data['masVendidos'] = $this->UserModel->obtenerVentas();
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
			$data['stock'] =  $this->UserModel->obtenerKeys();

			$msg = [
				"mensaje" => "Has iniciado sesión correctamente",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('index',$data);
			//Funciona con el redirect pero el data no lo pilla
			//redirect('inicio');

            //$this->load->view('index',$info_candidato);
        }else{
			//echo "<script> alert('Credenciales Erroneas');</script>";
			//exito  o  error
			$msg = [
				"mensaje" => "Error, Credendiales Erroneos",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('login',$data);
		}
        //$this->load->view('login');
    }

    public function inicio(){
		$this->load->model('AdminModel');
		$this->load->model('UserModel');
		$data['banner'] = $this->AdminModel->obtenerBannersActivos();
		$data['novedades'] = $this->UserModel->obtenerNovedades();
		$data['masVendidos'] = $this->UserModel->obtenerVentas();
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$data['stock'] =  $this->UserModel->obtenerKeys();

		$this->load->view('index',$data);
	}

    public function registro() {
        $this->load->view('registro');
    }
    
    public function registrar() {

		$nick = $this->cifrado->supercifrar($this->input->post('Nick'));
		$pass = password_hash($this->input->post('InputPassword'),PASSWORD_DEFAULT);
		$nombre = $this->cifrado->supercifrar($this->input->post('FirstName'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('LastName'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('LastName2'));
		$mail = $this->cifrado->supercifrar($this->input->post('InputEmail'));
		$telefono = $this->cifrado->supercifrar($this->input->post('Telefono'));

		$this->load->model('UserModel');

		$existeNick = $this->UserModel->obtenerNick($nick);
		$existeMail = $this->UserModel->obtenerEmail($mail);

		if (($existeNick || $existeMail) == false){
			if ($this->UserModel->add_user($nick, $pass, $nombre, $apellido1, $apellido2, $mail, $telefono)){
				include "assets/mail.php";

				$msg = [
					"mensaje" => "Te has registrado correctamente. Ahora puedes iniciar sesión",
					"tipoMSG" => "exito"
				];
				$data['mostrarMSG'] = $msg;

				$this->load->view('login',$data);
			}
		}else{
			//echo "<script> alert('Error, el nick o el email no se encuentran disponibles'); </script>";

			$this->load->model('AdminModel');

			$data['banner'] = $this->AdminModel->obtenerBannersActivos();
			$data['novedades'] = $this->UserModel->obtenerNovedades();
			$data['masVendidos'] = $this->UserModel->obtenerVentas();
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
			$data['stock'] =  $this->UserModel->obtenerKeys();

			$msg = [
				"mensaje" => "Error, el nick o el email no se encuentran disponibles",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('index',$data);
		}
    }

    public function olvidopass(){
		$this->load->view('forgot-pass/contrasena-olvidada');
	}

	public function recuperarPass(){
		$nick = $this->session->userdata('nick');
		$mail = $this->cifrado->supercifrar($this->input->post('emailLoss'));
		$this->load->model('UserModel');

		if ($this->UserModel->recuperarPass($mail)){

			$codigoAleatorio = mt_rand(0,9999);

			$this->load->model('UserModel');
			$this->UserModel->insertarCodigo($codigoAleatorio,$nick);

			include "assets/mailForgotPass.php";

			$this->UserModel->set_email($mail);

			$msg = [
				"mensaje" => "Te has registrado correctamente. Ahora puedes iniciar sesión",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('forgot-pass/reseteo-pass',$data);
		}else{
			//echo "<script> alert('Error, vuelve a intentarlo mas tarde'); </script>";

			$msg = [
				"mensaje" => "Error, vuelve a intentarlo mas tarde",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('login',$data);
		}
	}

	public function comprobarCodigo(){
		$mail = $this->session->userdata('mail');
		$codigo = $this->input->post('codigo');

		$this->load->model('UserModel');
		if ($this->UserModel->comprobarCodigoEmail($mail,$codigo)){

			$msg = [
				"mensaje" => "Te has registrado correctamente. Ahora puedes iniciar sesión",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('forgot-pass/cambiar-pass-olvidada',$data);
		}else{
			//echo "<script> alert('Codigo erroneo o sesion expirada'); </script>";
			$msg = [
				"mensaje" => "Error, codigo erroneo o sesion expirada",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('login',$data);
		}
	}

	public function cambiarPassOlvidada(){
		$email = $this->session->userdata('mail');
		$newPass = password_hash($this->input->post('newPass'),PASSWORD_DEFAULT);

		$this->load->model('UserModel');

		if ($this->UserModel->updatePassOlvidada($email,$newPass)){
			$nombre = "";
			$apellido1 = "";
			$apellido2 = "";
			$mail = $email;

			include "assets/mailPassCambiada.php";

			$this->session->sess_destroy();

			$msg = [
				"mensaje" => "Has modificado la contraseña correctamente. Ahora puedes iniciar sesión",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('login',$data);
		}else{
			//echo "<script> alert('Error'); </script>";
			$msg = [
				"mensaje" => "Error, vuelve a intentalo más tarde",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('login',$data);
		}
	}

    public function modificarDatosVista(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('modificarDatos',$data);
	}
    
    public function modificarDatos() {
		$nick = $this->cifrado->supercifrar($this->input->post('NickMod'));
		$nombre = $this->cifrado->supercifrar($this->input->post('NameMod'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('LastMod1'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('LastMod2'));
		$mail = $this->cifrado->supercifrar($this->input->post('EmailMod'));
		$telefono = $this->cifrado->supercifrar($this->input->post('TelefonoMod'));

		$this->update($nick, $nombre,$apellido1,$apellido2,$mail,$telefono);

		$this->UserModel->obtenerDatosPerfil($nick);
		$this->verPerfil();
    }

	public function modificarPassVista(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('modificarPass',$data);
	}

	public function modificarPass() {
		$nick = $this->session->userdata('nick');
		$passOld = $this->input->post('passOld');

		$this->load->model('UserModel');
		if ($this->UserModel->validate_user($nick,$passOld)){
			$pass = password_hash($this->input->post('passMod'),PASSWORD_DEFAULT);

			$this->updatePass($nick,$pass);

			$this->UserModel->obtenerDatosPerfil($nick);

			$nombre = $this->session->userdata('nombre');
			$apellido1 = $this->session->userdata('apellido1');
			$apellido2 = $this->session->userdata('apellido2');
			$mail = $this->session->userdata('mail');

			include "assets/mailPassCambiada.php";

			$msg = [
				"mensaje" => "Has modificado la contraseña correctamente.",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('perfil',$data);
		}else{
			//echo "<script> alert('Error, la contraseña antigua no coincide'); </script>";
			//$this->load->view('modificarPassVista');
			$msg = [
				"mensaje" => "Error, la contraseña antigua no coincide",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->view('modificarPass',$data);

		}
	}

	public function updatePass($nick, $pass) {
		$this->load->model('UserModel');
		if ($this->UserModel->update_pass($nick, $pass)) {
			// $this->UserModel->validate_user($nick, $pass);
			//$this->load->view('perfil');
		}
	}

    public function update($nick, $nombre, $apellido1, $apellido2, $mail, $telefono) {
        $this->load->model('UserModel');
        if ($this->UserModel->update_user($nick, $nombre, $apellido1,$apellido2, $mail, $telefono)) {
           // $this->UserModel->validate_user($nick, $pass);
            //$this->load->view('perfil');
        }
    }

    
    public function darseDeBaja() {
        $this->load->model('UserModel');
        $nick = $this->session->userdata('nick');

		$nombre = $this->session->userdata('nombre');
		$apellido1 = $this->session->userdata('apellido1');
		$apellido2 = $this->session->userdata('apellido2');
		$mail = $this->session->userdata('mail');

        if ($this->UserModel->delete_user($nick)){
			include "assets/mailBaja.php";
			$this->load->view('login');
		}
    }


    public function verPerfil(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('perfil',$data);
	}

	public function cerrarSesion(){
		$this->session->sess_destroy();

		$this->load->model('UserModel');
		$this->load->model('AdminModel');
		$data['banner'] = $this->AdminModel->obtenerBannersActivos();
		$data['novedades'] = $this->UserModel->obtenerNovedades();
		$data['masVendidos'] = $this->UserModel->obtenerVentas();

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		redirect('');//redirect('index');
		//$this->load->view('index',$data);
	}

	public function whitelist(){

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$nick = $this->session->userdata('nick');
		$favsUser = $this->UserModel->obtenerWhiteList($nick);

		$favsUser = explode("/", $favsUser[0]['whitelist']);

		$nick = $this->session->userdata('nick');

		$config = array();
		$config["base_url"] = base_url() . "User/whitelist";
		$config["total_rows"] = $this->UserModel->countWhitelist($favsUser);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['whitelist'] = $this->UserModel->get_productosWhitelist($favsUser,$config["per_page"], $page);

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('whitelist',$data);
	}

	public function cantidadProductosCarrito(){
		$this->load->model('UserModel');

		$nick = $this->session->userdata('nick');

		if ($nick != ""){
			$favsUser = $this->UserModel->obtenerCarrito($nick);

			if ($favsUser[0]['carrito'] == ""){
				$cantidadDelCarrito = "";
			}else{
				$favsUser = explode("/", $favsUser[0]['carrito']);
				$cantidadDelCarrito = count($favsUser);
			}
			return $cantidadDelCarrito;
		}else{
			return "";
		}
	}

	public function carrito(){
		$this->load->model('UserModel');

		$nick = $this->session->userdata('nick');
		$favsUser = $this->UserModel->obtenerCarrito($nick);

		$favsUser = explode("/", $favsUser[0]['carrito']);

		$longitud = count($favsUser);
		for ($i = 0; $i < $longitud; $i++){
			$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
		}
		$data['carrito'] = $favs;
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('carrito',$data);
	}

	public function acercadenosotros(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('acerca-de-nosotros',$data);
	}

	public function politicadeprivacidad(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('politica-de-privacidad',$data);
	}

	public function terminosycondiciones(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('terminos-y-condiciones',$data);
	}

	public function miCuenta(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('perfil',$data);
	}

	public function misPedidos(){
		$this->load->model('UserModel');
		$id = $this->session->userdata('id');

		$pedidos = $this->UserModel->obtenerPedidos($id);

		$productosPedido = array();

		$longitud = count($pedidos);
		for ($i = 0; $i < $longitud; $i++){
			$newproductos = explode("/",  $pedidos[$i]['idproductos']);

			$long = count($newproductos);
			for ($j = 0; $j < $long; $j++){
				$productosPedido[] = $this->UserModel->obtenerProductoPorId2($newproductos[$j]);
			}
		}

		$data['productos'] = $productosPedido;
		$data['pedidos'] = $pedidos;
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('pedidos',$data);
	}

	public function FAQ(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('faq',$data);
	}

	public function localizacion(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('localizacion',$data);
	}

	public function categoriaTipos($tipos){
		$tipo = str_replace("-"," ",$tipos);

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaTipos/".$tipos;
		$config["total_rows"] = $this->UserModel->countTipo($tipo);
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosTipo($tipo,$config["per_page"], $page);
		$data['plat'] = $tipo;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] = $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function categoriaPc(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "PC";

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaPc";
		$config["total_rows"] = $this->UserModel->countPlataforma($platafoma);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosPlataforma($platafoma,$config["per_page"], $page);
		$data['plat'] = $platafoma;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] = $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function categoriaPsn(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "PSN";

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaPsn";
		$config["total_rows"] = $this->UserModel->countPlataforma($platafoma);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);


		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosPlataforma($platafoma,$config["per_page"], $page);
		$data['plat'] = $platafoma;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] = $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function categoriaXbox(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "XBOX";

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaXbox";
		$config["total_rows"] = $this->UserModel->countPlataforma($platafoma);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosPlataforma($platafoma,$config["per_page"], $page);
		$data['plat'] = $platafoma;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] = $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function categoriaNintendo(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "NINTENDO";

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaNintendo";
		$config["total_rows"] = $this->UserModel->countPlataforma($platafoma);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosPlataforma($platafoma,$config["per_page"], $page);
		$data['plat'] = $platafoma;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);

	}

	public function categoriaHerramientas(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "HERRAMIENTAS";

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaHerramientas";
		$config["total_rows"] = $this->UserModel->countPlataforma($platafoma);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosPlataforma($platafoma,$config["per_page"], $page);
		$data['plat'] = $platafoma;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] = $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function categoriaPromociones(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "PROMOCIONES";

		$config = array();
		$config["base_url"] = base_url() . "User/categoriaPromociones";
		$config["total_rows"] = $this->UserModel->countPromo();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);


		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_promo($config["per_page"], $page);
		$data['plat'] = $platafoma;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('categorias/index-promo',$data);
	}

	public function paginaProducto($nombre){
		$nombre = str_replace("-"," ",$nombre);
		$this->load->model('UserModel');
		$product = $this->UserModel->obtenerProductoPorNombre($nombre);
		$data['pagiPC'] = $product;

		if ($this->UserModel->obtenerKey($product[0]["id"])){
			$data['stock'] = true;
		}else{
			$data['stock'] = false;
		}

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('categorias/pagina-producto',$data);
	}

	public function buscar(){
		$dato = $this->input->post('buscar');

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$config = array();
		$config["base_url"] = base_url() . "User/busqueda/$dato";
		$config["total_rows"] = $this->UserModel->countBuscar($dato);
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);


		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosBuscar($dato,$config["per_page"], $page);
		$data['plat'] = "Resultado de la Busqueda";
		$data['dato'] = $dato;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] = $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function busqueda($dato){

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$config = array();
		$config["base_url"] = base_url() . "User/busqueda/$dato";
		$config["total_rows"] = $this->UserModel->countBuscar($dato);
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;

		$this->pagination->initialize($config);


		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosBuscar($dato,$config["per_page"], $page);
		$data['plat'] = "Resultado de la Busqueda";
		$data['dato'] = $dato;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function anadirAWhitelist($nuevoFav){
		$this->load->model('UserModel');

		$nuevoFav = str_replace("-"," ",$nuevoFav);
		$ids = $this->UserModel->obtenerProductoPorNombre($nuevoFav);
		$idnuevoFav = $ids[0]["id"];

		if (!$this->UserModel->comprobarProductoEnFavoritos($idnuevoFav)){
			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerWhiteList($nick);

			$favsUser = $favsUser[0]["whitelist"];

			if($this->UserModel->anadirAWhitelistBBDD($favsUser, $idnuevoFav, $nick)){
				$msg = [
					"mensaje" => "Has añadido el producto a tu whitelist",
					"tipoMSG" => "exito"
				];
				$data['mostrarMSG'] = $msg;

				$this->load->helper('url','form');
				$this->load->library("pagination");
				$this->load->model('UserModel');

				$nick = $this->session->userdata('nick');
				$favsUser = $this->UserModel->obtenerWhiteList($nick);

				$favsUser = explode("/", $favsUser[0]['whitelist']);

				$nick = $this->session->userdata('nick');

				$config = array();
				$config["base_url"] = base_url() . "User/whitelist";
				$config["total_rows"] = $this->UserModel->countWhitelist($favsUser);
				$config["per_page"] = 20;
				$config["uri_segment"] = 3;

				$this->pagination->initialize($config);

				$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

				$data["links"] = $this->pagination->create_links();

				$data['whitelist'] = $this->UserModel->get_productosWhitelist($favsUser,$config["per_page"], $page);

				$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

				$this->load->view('whitelist',$data);
			}else{
				$this->load->model('AdminModel');

				$data['banner'] = $this->AdminModel->obtenerBannersActivos();
				$data['novedades'] = $this->UserModel->obtenerNovedades();
				$data['masVendidos'] = $this->UserModel->obtenerVentas();
				$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
				$data['stock'] =  $this->UserModel->obtenerKeys();

				$msg = [
					"mensaje" => "Error, Prueba a añadir un producto mas tarde",
					"tipoMSG" => "error"
				];
				$data['mostrarMSG'] = $msg;

				$this->load->view('index',$data);
			}
		}
		else{
			//echo "<script> alert('Ya tienes este producto en tu whitelist');</script>";
			$msg = [
				"mensaje" => "Error, Ya tienes este producto en tu whitelist",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->helper('url','form');
			$this->load->library("pagination");
			$this->load->model('UserModel');

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerWhiteList($nick);

			$favsUser = explode("/", $favsUser[0]['whitelist']);

			$nick = $this->session->userdata('nick');

			$config = array();
			$config["base_url"] = base_url() . "User/whitelist";
			$config["total_rows"] = $this->UserModel->countWhitelist($favsUser);
			$config["per_page"] = 20;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['whitelist'] = $this->UserModel->get_productosWhitelist($favsUser,$config["per_page"], $page);

			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('whitelist',$data);
		}
	}

	public function borrarProductoDeLaWhitelist($idBorrar){
		$this->load->model('UserModel');

		$idBorrar = str_replace("-"," ",$idBorrar);

		$ids = $this->UserModel->obtenerProductoPorNombre($idBorrar);
		$idsinFav = $ids[0]["id"];

		if ($this->UserModel->comprobarProductoEnFavoritos($idsinFav)){
			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerWhiteList($nick);

			$favsUser = $favsUser[0]["whitelist"];

			$this->UserModel->eliminarDeLaWhitelistBBDD($favsUser, $idsinFav, $nick);
			$msg = [
				"mensaje" => "Has eliminado el producto de tu whitelist",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->helper('url','form');
			$this->load->library("pagination");
			$this->load->model('UserModel');

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerWhiteList($nick);

			$favsUser = explode("/", $favsUser[0]['whitelist']);

			$nick = $this->session->userdata('nick');

			$config = array();
			$config["base_url"] = base_url() . "User/whitelist";
			$config["total_rows"] = $this->UserModel->countWhitelist($favsUser);
			$config["per_page"] = 20;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['whitelist'] = $this->UserModel->get_productosWhitelist($favsUser,$config["per_page"], $page);

			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('whitelist',$data);

		}else{
			//echo "<script> alert('Este producto no esta en tu whitelist');</script>";
			$msg = [
				"mensaje" => "Error, Este producto no esta en tu whitelist",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$this->load->helper('url','form');
			$this->load->library("pagination");
			$this->load->model('UserModel');

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerWhiteList($nick);

			$favsUser = explode("/", $favsUser[0]['whitelist']);

			$nick = $this->session->userdata('nick');

			$config = array();
			$config["base_url"] = base_url() . "User/whitelist";
			$config["total_rows"] = $this->UserModel->countWhitelist($favsUser);
			$config["per_page"] = 20;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

			$data["links"] = $this->pagination->create_links();

			$data['whitelist'] = $this->UserModel->get_productosWhitelist($favsUser,$config["per_page"], $page);

			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('whitelist',$data);
		}
	}

	public function anadirAlCarrito($nuevoCar){
		$this->load->model('UserModel');

		$nuevoCar = str_replace("-"," ",$nuevoCar);
		$ids = $this->UserModel->obtenerProductoPorNombre($nuevoCar);
		$idnuevoCar = $ids[0]["id"];

		if ($this->UserModel->obtenerKey($idnuevoCar) != false){
			if (!$this->UserModel->comprobarProductoEnCarrito($idnuevoCar)){
				$nick = $this->session->userdata('nick');
				$favsUser = $this->UserModel->obtenerCarrito($nick);

				$favsUser = $favsUser[0]["carrito"];

				if($this->UserModel->anadirACarritoBBDD($favsUser, $idnuevoCar, $nick)){
					$msg = [
						"mensaje" => "Has añadido el producto en tu carrito",
						"tipoMSG" => "exito"
					];
					$data['mostrarMSG'] = $msg;

					$nick = $this->session->userdata('nick');
					$favsUser = $this->UserModel->obtenerCarrito($nick);

					$favsUser = explode("/", $favsUser[0]['carrito']);

					$longitud = count($favsUser);
					for ($i = 0; $i < $longitud; $i++){
						$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
					}
					$data['carrito'] = $favs;
					$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

					$this->load->view('carrito',$data);
				}else{
					$this->load->model('AdminModel');

					$data['banner'] = $this->AdminModel->obtenerBannersActivos();
					$data['novedades'] = $this->UserModel->obtenerNovedades();
					$data['masVendidos'] = $this->UserModel->obtenerVentas();
					$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
					$data['stock'] =  $this->UserModel->obtenerKeys();

					$msg = [
						"mensaje" => "Error, Prueba a añadir un producto mas tarde",
						"tipoMSG" => "error"
					];
					$data['mostrarMSG'] = $msg;

					$this->load->view('index',$data);
				}
			}else{
				//echo "<script> alert('Ya tienes este producto en tu carrito');</script>";
				$msg = [
					"mensaje" => "Error, Ya tienes este producto en tu carrito",
					"tipoMSG" => "error"
				];
				$data['mostrarMSG'] = $msg;

				$nick = $this->session->userdata('nick');
				$favsUser = $this->UserModel->obtenerCarrito($nick);

				$favsUser = explode("/", $favsUser[0]['carrito']);

				$longitud = count($favsUser);
				for ($i = 0; $i < $longitud; $i++){
					$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
				}
				$data['carrito'] = $favs;
				$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

				$this->load->view('carrito',$data);
			}
		}else{
			//echo "<script> alert('No hay suficiente stock de este producto');</script>";
			$msg = [
				"mensaje" => "Error, No hay suficiente stock de este producto",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerCarrito($nick);

			$favsUser = explode("/", $favsUser[0]['carrito']);

			$longitud = count($favsUser);
			for ($i = 0; $i < $longitud; $i++){
				$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
			}
			$data['carrito'] = $favs;
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('carrito',$data);
		}
	}

	public function borrarDelCarrito($idBorrar){
		$this->load->model('UserModel');

		$idBorrar = str_replace("-"," ",$idBorrar);

		$ids = $this->UserModel->obtenerProductoPorNombre($idBorrar);
		$idsinFav = $ids[0]["id"];

		if ($this->UserModel->comprobarProductoEnCarrito($idsinFav)){
			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerCarrito($nick);

			$favsUser = $favsUser[0]["carrito"];

			$this->UserModel->eliminarDelCarritoBBDD($favsUser, $idsinFav, $nick);

			$msg = [
				"mensaje" => "Has borrado el producto de tu carrito",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerCarrito($nick);

			$favsUser = explode("/", $favsUser[0]['carrito']);

			$longitud = count($favsUser);
			for ($i = 0; $i < $longitud; $i++){
				$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
			}
			$data['carrito'] = $favs;
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('carrito',$data);

		}else{
			//echo "<script> alert('Este producto no esta en tu whitelist');</script>";
			$msg = [
				"mensaje" => "Error, el producto no esta en tu carrito",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerCarrito($nick);

			$favsUser = explode("/", $favsUser[0]['carrito']);

			$longitud = count($favsUser);
			for ($i = 0; $i < $longitud; $i++){
				$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
			}
			$data['carrito'] = $favs;
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('carrito',$data);
		}
	}

	public function pagar(){
		$this->load->model('UserModel');
		$nick = $this->session->userdata('nick');
		$favsUser = $this->UserModel->obtenerCarrito($nick);

		$favsUser = explode("/", $favsUser[0]['carrito']);

		$longitud = count($favsUser);
		for ($i = 0; $i < $longitud; $i++){
			$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
		}
		$data['carrito'] = $favs;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('pagar',$data);
	}

	public function pagoAceptado($estado){
		if ($estado){
			$this->load->model('UserModel');

			$id = $this->session->userdata('id');
			$nick = $this->session->userdata('nick');
			$mail = $this->session->userdata('mail');

			$carrito = $this->UserModel->obtenerCarrito($nick);
			$carrito = explode("/", $carrito[0]['carrito']);

			$precioTotal = 0;

			$longitud = count($carrito);
			for ($j = 0; $j < $longitud; $j++) {
				$favs[] = $this->UserModel->obtenerProductoPorId($carrito[$j]);

				$precioTotal = $precioTotal + $favs[$j][0]["precio"];

				if ($this->UserModel->obtenerKey($favs[$j][0]["id"]) != false){
					$llaves[] = $this->UserModel->obtener1Key($favs[$j][0]["id"]);
					$this->UserModel->activarKey($llaves[$j][0]['id']);


					$newVentas = $this->UserModel->obtenerVentasID($favs[$j][0]['id']);
					$newVentas = $newVentas[0]['ventas'];
					$newVentas++;
					$this->UserModel->anadirVentas($newVentas,$favs[$j][0]['id']);
				}else{
					//echo "<script> alert('Error al realizar el pago');</script>";
					$msg = [
						"mensaje" => "Error, al realizar el pago",
						"tipoMSG" => "error"
					];
					$data['mostrarMSG'] = $msg;

					$nick = $this->session->userdata('nick');
					$favsUser = $this->UserModel->obtenerCarrito($nick);

					$favsUser = explode("/", $favsUser[0]['carrito']);

					$longitud = count($favsUser);
					for ($i = 0; $i < $longitud; $i++){
						$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
					}
					$data['carrito'] = $favs;
					$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

					$this->load->view('carrito',$data);
				}
			}

			if (!isset($llaves)){
				$msg = [
					"mensaje" => "Error, no hay stock de algun producto de tu carrito",
					"tipoMSG" => "error"
				];
				$data['mostrarMSG'] = $msg;

				$nick = $this->session->userdata('nick');
				$favsUser = $this->UserModel->obtenerCarrito($nick);

				$favsUser = explode("/", $favsUser[0]['carrito']);

				$longitud = count($favsUser);
				for ($i = 0; $i < $longitud; $i++){
					$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
				}
				$data['carrito'] = $favs;
				$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

				$this->load->view('carrito',$data);
			}else{
				if ($this->UserModel->anadirPedido($favs, $llaves, $id)){
					$this->UserModel->borrarCarrito($nick);
					include "assets/mailCompra.php";

					$msg = [
						"mensaje" => "Has realizado la compra correctamente",
						"tipoMSG" => "exito"
					];
					$data['mostrarMSG'] = $msg;

					$id = $this->session->userdata('id');

					$pedidos = $this->UserModel->obtenerPedidos($id);

					$productosPedido = array();

					$longitud = count($pedidos);
					for ($i = 0; $i < $longitud; $i++){
						$newproductos = explode("/",  $pedidos[$i]['idproductos']);

						$long = count($newproductos);
						for ($j = 0; $j < $long; $j++){
							$productosPedido[] = $this->UserModel->obtenerProductoPorId2($newproductos[$j]);
						}
					}

					$data['productos'] = $productosPedido;
					$data['pedidos'] = $pedidos;
					$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

					$this->load->view('pedidos',$data);
				}
				else{
					//echo "<script> alert('Error al realizar el pedido');</script>";
					$msg = [
						"mensaje" => "Error, al realizar el pedido",
						"tipoMSG" => "error"
					];
					$data['mostrarMSG'] = $msg;

					$nick = $this->session->userdata('nick');
					$favsUser = $this->UserModel->obtenerCarrito($nick);

					$favsUser = explode("/", $favsUser[0]['carrito']);

					$longitud = count($favsUser);
					for ($i = 0; $i < $longitud; $i++){
						$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
					}
					$data['carrito'] = $favs;
					$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

					$this->load->view('carrito',$data);
				}
			}

		}else{
			//echo "<script> alert('Error al realizar el pago');</script>";
			$msg = [
				"mensaje" => "Error, al realizar el pago",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$nick = $this->session->userdata('nick');
			$favsUser = $this->UserModel->obtenerCarrito($nick);

			$favsUser = explode("/", $favsUser[0]['carrito']);

			$longitud = count($favsUser);
			for ($i = 0; $i < $longitud; $i++){
				$favs[] = $this->UserModel->obtenerProductoPorId($favsUser[$i]);
			}
			$data['carrito'] = $favs;
			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

			$this->load->view('carrito',$data);
		}
	}

	public function Factura(){
		$this->load->model('UserModel');
		$id = $_POST['downloadPDF'];

		if (!is_null($id)){
			$pedidos = $this->UserModel->obtenerPedidosporIdP($id);

			$productosPedido = array();

			$longitud = count($pedidos);
			for ($i = 0; $i < $longitud; $i++){
				$newproductos = explode("/",  $pedidos[$i]['idproductos']);

				$long = count($newproductos);
				for ($j = 0; $j < $long; $j++){
					$productosPedido[] = $this->UserModel->obtenerProductoPorId2($newproductos[$j]);
				}
			}

			$data['productos'] = $productosPedido;
			$data['pedidos'] = $pedidos;

			$this->load->view('factura',$data);
		}else{
			$this->misPedidos();
		}
	}

	/**
	 * TICKET
	 */

	public function soporte(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('soporte/soporte',$data);
	}

	public function crearTicket(){
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
		$this->load->view('soporte/crear-ticket',$data);
	}

	public function anadirTicket(){
		$this->load->model('UserModel');

		$mail = $this->session->userdata('mail');

		$fecha = $this->cifrado->supercifrar($_POST['fechaSoporte']);
		$nick = $this->session->userdata('nick');
		$email = $this->cifrado->supercifrar($_POST['emailSoporte']);
		$asunto = $this->cifrado->supercifrar($_POST['asuntoSoporte']);
		$mensaje = $this->cifrado->supercifrar($_POST['mensajeSoporte']);

		$codigo = "";
		$longitud = 2;
		for ($i=1; $i<=$longitud; $i++){
			$numero = rand(0,9);
			$codigo .= $numero;
		}
		$numero_filas = $this->UserModel->obtenerTicketsNumFilas($nick);
		if (is_null($numero_filas)){
			$numero_filas = 0;
		}

		$numero_filas_total=$numero_filas+1;
		$serie= $this->cifrado->supercifrar("TK".$codigo."N".$numero_filas_total);

		$estado = $this->cifrado->supercifrar("En proceso");
		$solucion = $this->cifrado->supercifrar("Esperando");

		if ($this->UserModel->anadirTicket($fecha, $serie, $estado,$nick,$email,$asunto,$mensaje,$solucion)){
			include "assets/mailTicket.php";

			$msg = [
				"mensaje" => "Has creado el ticket correctamente",
				"tipoMSG" => "exito"
			];
			$data['mostrarMSG'] = $msg;

			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
			$this->load->view('soporte/soporte',$data);

		}else{
			//echo "<script> alert('Error al crear el ticket');</script>";

			$msg = [
				"mensaje" => "Error, al crear el ticket",
				"tipoMSG" => "error"
			];
			$data['mostrarMSG'] = $msg;

			$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();
			$this->load->view('soporte/soporte',$data);
		}
	}

	public function consultarTickets(){

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$nick = $this->session->userdata('nick');

		$config = array();
		$config["base_url"] = base_url() . "User/soporte/ver-tickets";
		$config["total_rows"] = $this->UserModel->countConsultarTickets($nick);
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['tickets'] = $this->UserModel->get_ticketsConsultar($nick,$config["per_page"], $page);
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('soporte/ver-tickets',$data);
	}

	public function verTicket($id){
		$this->load->model('UserModel');
		$data['ticket'] = $this->UserModel->verTicket($id);
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('soporte/mostrar-ticket',$data);
	}

	public function borrarTicket($id){
		$this->load->model('UserModel');

		if ($this->UserModel->eliminarTicket($id)){
			$this->soporte();
		}else{
			$this->soporte();
		}
	}

}
