<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function loginAdmin() {
		$this->load->view('admin/login-admin');
	}
    public function logearseAdmin() {

        $nick = $this->cifrado->supercifrar($this->input->post('NickAdmin'));
        $pass = $this->input->post('PasswordAdmin');

        $this->load->model('AdminModel');

        if ($nick && $pass && $this->AdminModel->validate_admin($nick, $pass)) {
            $this->load->view('admin/panel-admin');
        }else{
			echo "<script> alert('Credenciales Erroneas');</script>";
			$this->load->view('admin/login-admin');
		}
    }

    public function inicioAdmin(){
		$this->load->view('admin/panel-admin');
	}

	/**
	 * Modificar el admin sesion
	 */
	public function modificarDatosVista(){
		$this->load->view('admin/modificarDatos');
	}

	public function modificarDatos() {
		$id = $this->session->userdata('id');
		$nick = $this->cifrado->supercifrar($this->input->post('NickMod'));
		$nombre = $this->cifrado->supercifrar($this->input->post('NameMod'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('LastMod1'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('LastMod2'));
		$mail = $this->cifrado->supercifrar($this->input->post('EmailMod'));
		$telefono = $this->cifrado->supercifrar($this->input->post('TelefonoMod'));

		$this->update($id,$nick, $nombre,$apellido1,$apellido2,$mail,$telefono);

		$this->AdminModel->obtenerDatosPerfil($nick);
		$this->inicioAdmin();
	}

	public function modificarPassVista(){
		$this->load->view('admin/modificarPass');
	}

	public function modificarPass() {
		$nick = $this->session->userdata('nick');
		$passOld = $this->input->post('passOld');

		$this->load->model('AdminModel');
		if ($this->AdminModel->validate_admin($nick,$passOld)){
			$pass = password_hash($this->input->post('passMod'),PASSWORD_DEFAULT);

			$this->updatePass($nick,$pass);

			$this->AdminModel->obtenerDatosPerfil($nick);

			$nombre = $this->session->userdata('nombre');
			$apellido1 = $this->session->userdata('apellido1');
			$apellido2 = $this->session->userdata('apellido2');
			$mail = $this->session->userdata('mail');

			include "assets/mailPassCambiada.php";

			$this->inicioAdmin();
		}else{
			echo "<script> alert('Error, la contraseña antigua no coincide'); </script>";
		}
	}

	public function updatePass($nick, $pass) {
		$this->load->model('AdminModel');
		if ($this->AdminModel->update_pass($nick, $pass)) {
			// $this->UserModel->validate_user($nick, $pass);
			//$this->load->view('perfil');
		}
	}

	public function update($id,$nick, $nombre, $apellido1, $apellido2, $mail, $telefono) {
		$this->load->model('AdminModel');
		if ($this->AdminModel->update_admin($id,$nick, $nombre, $apellido1,$apellido2, $mail, $telefono)) {
			// $this->UserModel->validate_user($nick, $pass);
			//$this->load->view('perfil');
		}
	}

	/**
	 * Usuarios
	 */
	public function anadirUsuarioVista() {
		$this->load->view('admin/usuarios/anadir-usuario');
	}

	public function anadirUsuario() {

		$nick = $this->cifrado->supercifrar($this->input->post('nick'));
		$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$nombre = $this->cifrado->supercifrar($this->input->post('nombre'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('apellido1'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('apellido2'));
		$telefono = $this->cifrado->supercifrar($this->input->post('telefono'));
		$mail = $this->cifrado->supercifrar($this->input->post('mail'));


		$this->load->model('AdminModel');

		$existeNick = $this->AdminModel->obtenerNick($nick);
		$existeMail = $this->AdminModel->obtenerEmail($mail);

		if (($existeNick || $existeMail) == false){
			$this->AdminModel->add_user($nick, $password, $nombre, $apellido1, $apellido2, $telefono,$mail);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nick o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function modificarUsuarioVista(){
		$this->load->model('AdminModel');
		$datosUsuarios['usuarios'] = $this->AdminModel->obtenerUsuarios();

		$this->load->view('admin/usuarios/modificar-usuario-seleccion',$datosUsuarios);
	}

	public function modificarUsuarioVistaDatos(){
		$user = $this->input->post("userMod");
		$this->load->model('AdminModel');
		$userSeleccionado['userSel'] = $this->AdminModel->obtenerUsuarioSeleccionado($user);

		$this->load->view('admin/usuarios/modificar-usuario',$userSeleccionado);
	}

	public function modificarUsuario() {
		$id = $this->input->post('idMod');
		$nick = $this->cifrado->supercifrar($this->input->post('nickMod'));
		$password = password_hash($this->input->post('passwordMod'),PASSWORD_DEFAULT);
		$nombre = $this->cifrado->supercifrar($this->input->post('nombreMod'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('apellido1Mod'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('apellido2Mod'));
		$telefono = $this->cifrado->supercifrar($this->input->post('telefonoMod'));
		$mail = $this->cifrado->supercifrar($this->input->post('mailMod'));

		$this->updateUser($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail);

	}

	public function updateUser($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail) {
		$this->load->model('AdminModel');
		$existeNick = $this->AdminModel->obtenerNick($nick);
		$existeMail = $this->AdminModel->obtenerEmail($mail);

		if (($existeNick || $existeMail) == false){
			$this->AdminModel->update_usuario($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail);
			$this->load->view('admin/panel-admin');
			//cho $id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail;
		}else{
			echo "<script> alert('Error, el nick o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function eliminarUsuarioVista(){
		$this->load->model('AdminModel');
		$userSel['usuarios'] = $this->AdminModel->obtenerUsuarios();
		$this->load->view('admin/usuarios/eliminar-usuario-seleccion',$userSel);
	}

	public function eliminarUsuario() {
		$id = $this->input->post("userBorrar");
		$this->load->model('AdminModel');

		if ($this->AdminModel->delete_usuario($id)){
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error,al eliminar el usuario'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function verUsuarios(){
		$this->load->model('AdminModel');
		$usuarios['users'] = $this->AdminModel->obtenerUsuarios();

		$this->load->view('admin/usuarios/mostrar-usuario',$usuarios);
	}

	/**
	 * Vendedor
	 */
	public function anadirVendedorVista() {
		$this->load->view('admin/vendedores/anadir-vendedor');
	}

	public function anadirVendedor() {

		$nombre = $this->cifrado->supercifrar($this->input->post('nombre'));
		$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$telefono = $this->cifrado->supercifrar($this->input->post('telefono'));
		$mail = $this->cifrado->supercifrar($this->input->post('mail'));


		$this->load->model('AdminModel');

		$existeNombreVendedor = $this->AdminModel->obtenerNombreVendedor($nombre);
		$existeMailVendedor = $this->AdminModel->obtenerEmailVendedor($mail);

		if (($existeNombreVendedor || $existeMailVendedor) == false){
			$this->AdminModel->add_vendedor($nombre, $password, $telefono, $mail);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function modificarVendedorVista(){
		$this->load->model('AdminModel');
		$datosVendedores['vendedores'] = $this->AdminModel->obtenerVendedores();

		$this->load->view('admin/vendedores/modificar-vendedor-seleccion',$datosVendedores);
	}

	public function modificarVendedorVistaDatos(){
		$vendedor = $this->input->post("vendedorMod");
		$this->load->model('AdminModel');
		$vendedorSeleccionado['vendedorSel'] = $this->AdminModel->obtenerVendedorSeleccionado($vendedor);

		$this->load->view('admin/vendedores/modificar-vendedor',$vendedorSeleccionado);
	}

	public function modificarVendedor() {
		$id = $this->input->post('idMod');
		$nombre = $this->cifrado->supercifrar($this->input->post('nombreMod'));
		$password = password_hash($this->input->post('passwordMod'),PASSWORD_DEFAULT);
		$mail = $this->cifrado->supercifrar($this->input->post('mailMod'));
		$telefono = $this->cifrado->supercifrar($this->input->post('telefonoMod'));

		$this->updateVendedor($id,$nombre, $password,$mail,$telefono);
	}

	public function updateVendedor($id,$nombre, $password,$mail,$telefono) {
		$this->load->model('AdminModel');

		$existeNombreVendedor = $this->AdminModel->obtenerNombreVendedor($nombre);
		$existeMailVendedor = $this->AdminModel->obtenerEmailVendedor($mail);


		if (($existeNombreVendedor || $existeMailVendedor) == false){
			$this->AdminModel->update_vendedor($id,$nombre, $password,$mail,$telefono);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function eliminarVendedorVista(){
		$this->load->model('AdminModel');
		$vendedorSel['vendedor'] = $this->AdminModel->obtenerVendedores();
		$this->load->view('admin/vendedores/eliminar-vendedor-seleccion',$vendedorSel);
	}

	public function eliminarVendedor() {
		$id = $this->input->post("vendedorBorrar");
		$this->load->model('AdminModel');

		if ($this->AdminModel->delete_vendedor($id)){
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error,al eliminar el vendedor'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function verVendedores(){
		$this->load->model('AdminModel');
		$vendedores['vendedor'] = $this->AdminModel->obtenerVendedores();

		$this->load->view('admin/vendedores/mostrar-vendedor',$vendedores);
	}

	/**
	 * PRODUCTO
	 */
	public function anadirProductoVista() {
		$this->load->view('admin/productos/anadir-producto');
	}

	public function anadirProducto() {

		$nombre = $this->input->post('nombre');
		$descripcion = $this->input->post('descripcion');
		$genero = $this->input->post('genero');
		$tipo = $this->input->post('tipo');
		$plataforma = $this->input->post('plataforma');
		$plataformaPublicacion = $this->input->post('plataformaPublicacion');
		$precio = $this->input->post('precio');
		$fecha = $this->input->post('fecha');
		//$imagen = $this->input->post('imagen');
		//$idVendedor = $this->input->post('idVendedor');

		$foto = $_FILES['imagen']['name'];

		$extension = pathinfo($foto, PATHINFO_EXTENSION);
		$tamano = $_FILES['imagen']['size'];
		$directorio = '/DigitalKeys/uploads/';

		if (!is_file ($directorio.$foto)){
			move_uploaded_file($_FILES['imagen']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$foto);
		}
		$imagen = $directorio.$foto;


		$this->load->model('AdminModel');

		$existeNombreProducto = $this->AdminModel->obtenerNombreVendedor($nombre);

		if (($existeNombreProducto) == false){
			$this->AdminModel->add_producto($nombre, $descripcion, $genero, $tipo,$plataforma, $plataformaPublicacion, $precio, $imagen,$fecha);//$idVendedor
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function modificarProductoVista(){
		$this->load->model('AdminModel');
		$datosProducto['productos'] = $this->AdminModel->obtenerProductos();

		$this->load->view('admin/productos/modificar-producto-seleccion',$datosProducto);
	}

	public function modificarProductoVistaDatos(){
		$producto = $this->input->post("productoMod");
		$this->load->model('AdminModel');
		$productoSeleccionado['productoSel'] = $this->AdminModel->obtenerProductoSeleccionado($producto);

		$this->load->view('admin/productos/modificar-producto',$productoSeleccionado);
	}

	public function modificarProducto() {
		$id = $this->input->post('idMod');
		$nombre = $this->input->post('nombreMod');
		$descripcion = $this->input->post('descripcionMod');
		$genero = $this->input->post('generoMod');
		$tipo = $this->input->post('tipoMod');
		$plataforma = $this->input->post('plataformaMod');
		$plataformaPublicacion = $this->input->post('plataformaPublicacionMod');
		$precio = $this->input->post('precioMod');
		$fecha = $this->input->post('fechaMod');
		//$imagen = $this->input->post('imagenMod');
		$nick = $this->input->post('nickMod');

		$foto = $_FILES['imagenMod']['name'];

		$extension = pathinfo($foto, PATHINFO_EXTENSION);
		$tamano = $_FILES['imagenMod']['size'];
		$directorio = '/DigitalKeys/uploads/';

		if (!is_file ($directorio.$foto)){
			move_uploaded_file($_FILES['imagenMod']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$foto);
		}
		$imagen = $directorio.$foto;

		//$nick
		$this->updateProducto($nombre,$descripcion, $genero,$tipo,$plataforma,$plataformaPublicacion,$precio,$imagen,$fecha,$id);
	}
	//$nick
	public function updateProducto($nombre,$descripcion, $genero,$tipo,$plataforma,$plataformaPublicacion,$precio,$imagen,$fecha,$id) {
		$this->load->model('AdminModel');

		$existeNombreProducto = $this->AdminModel->obtenerNombreProducto($nombre);

		if (($existeNombreProducto) == false){
			$this->AdminModel->update_producto($nombre,$descripcion, $genero,$tipo,$plataforma,$plataformaPublicacion,$precio,$imagen,$fecha,$id);//$nick
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function eliminarProductoVista(){
		$this->load->model('AdminModel');
		$productoSel['producto'] = $this->AdminModel->obtenerProductos();
		$this->load->view('admin/productos/eliminar-producto-seleccion',$productoSel);
	}

	public function eliminarProducto() {
		$id = $this->input->post("productoBorrar");
		$this->load->model('AdminModel');

		if ($this->AdminModel->delete_producto($id)){
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error,al eliminar el vendedor'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function verProductos(){
		$this->load->model('AdminModel');
		$productos['producto'] = $this->AdminModel->obtenerProductos();

		$this->load->view('admin/productos/mostrar-producto',$productos);
	}

	/**
	 * ADMIN
	 */
	public function anadirAdminVista() {
		$this->load->view('admin/admins/anadir-admin');
	}

	public function anadirAdmin() {

		$nick = $this->cifrado->supercifrar($this->input->post('nick'));
		$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
		$nombre = $this->cifrado->supercifrar($this->input->post('nombre'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('apellido1'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('apellido2'));
		$telefono = $this->cifrado->supercifrar($this->input->post('telefono'));
		$mail = $this->cifrado->supercifrar($this->input->post('mail'));

		$this->load->model('AdminModel');

		$existeNickAdmin = $this->AdminModel->obtenerNickAdmin($nick);
		$existeMailAdmin = $this->AdminModel->obtenerEmailAdmin($mail);

		if (($existeNickAdmin || $existeMailAdmin) == false){
			$this->AdminModel->add_admin($nick, $password, $nombre, $apellido1, $apellido2, $telefono,$mail);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nick o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function modificarAdminVista(){
		$this->load->model('AdminModel');
		$datosAdmin['admin'] = $this->AdminModel->obtenerAdmins();

		$this->load->view('admin/admins/modificar-admin-seleccion',$datosAdmin);
	}

	public function modificarAdminVistaDatos(){
		$admin = $this->input->post("adminMod");
		$this->load->model('AdminModel');
		$adminSeleccionado['adminSel'] = $this->AdminModel->obtenerAdminSeleccionado($admin);

		$this->load->view('admin/admins/modificar-admin',$adminSeleccionado);
	}

	public function modificarAdmin() {
		$id = $this->input->post('idMod');
		$nick = $this->cifrado->supercifrar($this->input->post('nickMod'));
		$password = password_hash($this->input->post('passwordMod'),PASSWORD_DEFAULT);
		$nombre = $this->cifrado->supercifrar($this->input->post('nombreMod'));
		$apellido1 = $this->cifrado->supercifrar($this->input->post('apellido1Mod'));
		$apellido2 = $this->cifrado->supercifrar($this->input->post('apellido2Mod'));
		$telefono = $this->cifrado->supercifrar($this->input->post('telefonoMod'));
		$mail = $this->cifrado->supercifrar($this->input->post('mailMod'));

		$this->updateAdmin($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail);
	}

	public function updateAdmin($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail) {
		$this->load->model('AdminModel');

		$existeNombreProducto = $this->AdminModel->obtenerNickAdmin($nombre);

		if (($existeNombreProducto) == false){
			$this->AdminModel->update_admin($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre o el email no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function eliminarAdminVista(){
		$this->load->model('AdminModel');
		$adminSel['admin'] = $this->AdminModel->obtenerAdmins();
		$this->load->view('admin/admins/eliminar-admin-seleccion',$adminSel);
	}

	public function eliminarAdmin() {
		$id = $this->input->post("adminBorrar");
		$this->load->model('AdminModel');

		if ($this->AdminModel->delete_admin($id)){
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error,al eliminar el vendedor'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function verAdmins(){
		$this->load->model('AdminModel');
		$admins['admin'] = $this->AdminModel->obtenerAdmins();

		$this->load->view('admin/admins/mostrar-admin',$admins);
	}

	/**
	 * Keys
	 */

	public function anadirKeyVistaSeleccion() {
		$this->load->model('AdminModel');
		$datosProducto['productos'] = $this->AdminModel->obtenerProductos();

		$this->load->view('admin/keys/anadir-key-seleccion',$datosProducto);
	}

	public function anadirKeyVista(){
		$productoSelecc = $this->input->post("proSelecc");
		$this->load->model('AdminModel');
		$productoSeleccionado['productoSel'] = $productoSelecc;

		$this->load->view('admin/keys/anadir-key',$productoSeleccionado);
	}

	public function anadirKey() {
		$valor = $this->input->post('valor');
		$idvendedor = $this->input->post('idvendedor');
		$idproducto = $this->input->post('idproducto');
		$activado = false;

		var_dump($idproducto);
		$this->load->model('AdminModel');

		$existekey = $this->AdminModel->obtenerKeysIgual($valor);

		if (($existekey)){
			$this->AdminModel->add_key($valor, $idvendedor, $idproducto, $activado);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el valor no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	/**
	 * Banner
	 */
	public function anadirBannerVista() {
		$this->load->model('AdminModel');
		$data['productos'] = $this->AdminModel->obtenerPromo();

		$this->load->view('admin/banner/anadir-banner',$data);
	}

	public function anadirBanner() {

		$promocion = $this->input->post('promocion');
		$alt = $this->input->post('alt');
		$activado = false;
		$promoid = $this->input->post('promoid');

		$foto = $_FILES['imagen']['name'];

		$extension = pathinfo($foto, PATHINFO_EXTENSION);
		$tamano = $_FILES['imagen']['size'];
		$directorio = '/DigitalKeys/assets/img/carusel/';

		if (!is_file ($directorio.$foto)){
			move_uploaded_file($_FILES['imagen']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$foto);
		}
		$imagen = $directorio.$foto;


		$this->load->model('AdminModel');

		$existeNombreProducto = $this->AdminModel->obtenerPromoBanner($promocion);

		if (($existeNombreProducto) == false){
			$this->AdminModel->add_banner($promocion,$imagen,$alt,$activado,$promoid);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function modificarBannerVista(){
		$this->load->model('AdminModel');
		$datosProducto['productos'] = $this->AdminModel->obtenerBanners();

		$this->load->view('admin/banner/modificar-banner-seleccion',$datosProducto);
	}

	public function modificarBannerVistaDatos(){
		$banner = $this->input->post("bannerMod");
		$this->load->model('AdminModel');
		$productoSeleccionado['productos'] = $this->AdminModel->obtenerPromo();
		$productoSeleccionado['productoSel'] = $this->AdminModel->obtenerBannerSeleccionado($banner);

		$this->load->view('admin/banner/modificar-banner',$productoSeleccionado);
	}

	public function modificarBanner() {
		$id = $this->input->post('idMod');
		$promocion = $this->input->post('promocionMod');
		$alt = $this->input->post('altMod');
		$activado = $this->input->post('activadoMod');
		$promoid = $this->input->post('promoidMod');


		$this->updateBanner($promocion,$alt,$activado,$promoid,$id);
	}

	public function updateBanner($promocion,$alt,$activado,$promoid,$id) {
		$this->load->model('AdminModel');

		$this->AdminModel->update_banner($promocion,$alt,$activado,$promoid,$id);
		$this->load->view('admin/panel-admin');
	}

	public function eliminarBannerVista(){
		$this->load->model('AdminModel');
		$productoSel['producto'] = $this->AdminModel->obtenerBanners();
		$this->load->view('admin/banner/eliminar-banner-seleccion',$productoSel);
	}

	public function eliminarBanner() {
		$id = $this->input->post("bannerBorrar");
		$this->load->model('AdminModel');

		if ($this->AdminModel->delete_banner($id)){
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error,al eliminar el banner'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function verBanner(){
		$this->load->model('AdminModel');
		$banners['producto'] = $this->AdminModel->obtenerBanners();

		$this->load->view('admin/banner/mostrar-banner',$banners);
	}

	/**
	 * TICKET
	 */

	public function soporte(){
		$this->load->view('Admin/soporte/soporte');
	}

	public function crearTicket(){
		$this->load->model('AdminModel');

		$data['usuarios'] = $this->AdminModel->obtenerUsuarios();

		$this->load->view('Admin/soporte/crear-ticket',$data);
	}

	public function anadirTicket(){
		$this->load->model('AdminModel');

		$fecha = $this->cifrado->supercifrar($_POST['fechaSoporte']);
		$userid = $_POST['userid'];
		/*
		$nick = $this->session->userdata('nick');
		$email = $this->cifrado->supercifrar($_POST['emailSoporte']);*/

		$user = $this->AdminModel->obtenerUsuarioSeleccionado($userid);
		//var_dump($userid);

		//var_dump($user);
		$nick = $user[0]["nick"];
		$email = $user[0]["mail"];

		$asunto = $this->cifrado->supercifrar($_POST['asuntoSoporte']);
		$mensaje = $this->cifrado->supercifrar($_POST['mensajeSoporte']);
		$admin = $this->cifrado->supercifrar('Ticket Abierto Por Un Admin');

		$codigo = "";
		$longitud = 2;
		for ($i=1; $i<=$longitud; $i++){
			$numero = rand(0,9);
			$codigo .= $numero;
		}
		$numero_filas = $this->AdminModel->obtenerTicketsNumFilas($nick);
		if (is_null($numero_filas)){
			$numero_filas = 0;
		}

		$numero_filas_total=$numero_filas+1;
		$serie= $this->cifrado->supercifrar("TK".$codigo."N".$numero_filas_total);

		$estado = $this->cifrado->supercifrar("En proceso");
		$solucion = $this->cifrado->supercifrar("Esperando");

		if ($this->AdminModel->anadirTicket($fecha, $serie, $estado,$nick,$email,$asunto,$mensaje,$solucion,$admin)){
			$mail = $email;
			include "assets/mailTicketAdmin.php";
			$this->soporte();
		}else{
			echo "<script> alert('Error al crear el ticket');</script>";
			$this->soporte();
		}
	}

	public function consultarTickets(){

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('AdminModel');

		$nick = $this->session->userdata('nick');

		$config = array();
		$config["base_url"] = base_url() . "Admin/consultarTickets";
		$config["total_rows"] = $this->AdminModel->countConsultarTickets($nick);
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['tickets'] = $this->AdminModel->get_ticketsConsultar($nick,$config["per_page"], $page);

		$this->load->view('Admin/soporte/ver-tickets',$data);
	}

	public function verTicket($id){
		$this->load->model('AdminModel');
		$data['ticket'] = $this->AdminModel->verTicket($id);

		$this->load->view('Admin/soporte/mostrar-ticket',$data);
	}

	public function borrarTicket($id){
		$this->load->model('AdminModel');

		if ($this->AdminModel->eliminarTicket($id)){
			$this->soporte();
		}else{
			$this->soporte();
		}
	}

	public function editarTicket($id){
		$this->load->model('UserModel');

		$data['ticket'] = $this->UserModel->verTicket($id);
		$data['id'] = $id;

		$this->load->view('Admin/soporte/editar-ticket',$data);
	}

	public function modificarTicket(){
		$this->load->model('AdminModel');

		$fecha = $this->cifrado->supercifrar($_POST['fechaSoporteMod']);
		$nick = $_POST['nickSoporteMod'];
		$email = $_POST['emailSoporteMod'];
		$asunto = $this->cifrado->supercifrar($_POST['asuntoSoporteMod']);
		$mensaje = $this->cifrado->supercifrar($_POST['mensajeSoporteMod']);

		$estado = $this->cifrado->supercifrar($_POST['estadoSoporteMod']);
		$solucion = $this->cifrado->supercifrar($_POST['solucionSoporteMod']);

		if ($this->AdminModel->modificarTicket($fecha, $estado,$nick,$email,$asunto,$mensaje,$solucion)){
			$mail = $email;
			include "assets/mailTicketRespuesta.php";
			$this->soporte();
		}else{
			echo "<script> alert('Error al modificar el ticket');</script>";
			$this->soporte();
		}
	}

	/**
	 * PROMOCIONES
	 */
	public function anadirPromocionesVista() {
		$this->load->view('admin/promociones/anadir-promocion');
	}

	public function anadirPromociones() {

		$nombre = $this->input->post('promocion');
		$where_sql_veces = $this->input->post('where_sql_veces');
		$where_sql = $this->input->post('where_sql');
		$where_campo = $this->input->post('where_campo');
		$where_condicion = $this->input->post('where_condicion');
		$like_sql_veces = $this->input->post('like_sql_veces');
		$like_sql = $this->input->post('like_sql');
		$like_campo = $this->input->post('like_campo');
		$like_condicion = $this->input->post('like_condicion');
		$like_match = $this->input->post('like_match');
		$orderby_sql = $this->input->post('orderby_sql');
		$orderby_campo = $this->input->post('orderby_campo');
		$orderby_type = $this->input->post('orderby_type');

		$foto = $_FILES['imagen']['name'];

		$extension = pathinfo($foto, PATHINFO_EXTENSION);
		$tamano = $_FILES['imagen']['size'];
		$directorio = '/DigitalKeys/assets/img/carusel/';

		if (!is_file ($directorio.$foto)){
			move_uploaded_file($_FILES['imagen']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$foto);
		}
		$foto = $directorio.$foto;


		$this->load->model('AdminModel');

		$existeNombreProducto = $this->AdminModel->obtenerPromoNombre($nombre);

		if (($existeNombreProducto) == false){
			$this->AdminModel->add_promo($nombre,$where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type,$foto);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function modificarPromocionesVista(){
		$this->load->model('AdminModel');
		$datosProducto['productos'] = $this->AdminModel->obtenerPromo();

		$this->load->view('admin/promociones/modificar-promocion-seleccion',$datosProducto);
	}

	public function modificarPromocionesVistaDatos(){
		$idpromo = $this->input->post("promoMod");
		$this->load->model('AdminModel');
		$productoSeleccionado['productoSel'] = $this->AdminModel->obtenerPromoSeleccionado($idpromo);

		$this->load->view('admin/promociones/modificar-promocion',$productoSeleccionado);
	}

	public function modificarPromociones() {
		$id = $this->input->post('idMod');
		$nombre = $this->input->post('promocion');
		$where_sql_veces = $this->input->post('where_sql_veces');
		$where_sql = $this->input->post('where_sql');
		$where_campo = $this->input->post('where_campo');
		$where_condicion = $this->input->post('where_condicion');
		$like_sql_veces = $this->input->post('like_sql_veces');
		$like_sql = $this->input->post('like_sql');
		$like_campo = $this->input->post('like_campo');
		$like_condicion = $this->input->post('like_condicion');
		$like_match = $this->input->post('like_match');
		$orderby_sql = $this->input->post('orderby_sql');
		$orderby_campo = $this->input->post('orderby_campo');
		$orderby_type = $this->input->post('orderby_type');

		$foto = $_FILES['imagen']['name'];

		$extension = pathinfo($foto, PATHINFO_EXTENSION);
		$tamano = $_FILES['imagen']['size'];
		$directorio = '/DigitalKeys/assets/img/carusel/';

		if (!is_file ($directorio.$foto)){
			move_uploaded_file($_FILES['imagen']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$directorio.$foto);
		}
		$foto = $directorio.$foto;

		$this->updatePromociones($nombre,$where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type,$foto,$id);
	}
	//$nick
	public function updatePromociones($nombre,$where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_Sql,$orderby_campo,$orderby_type,$foto,$id) {
		$this->load->model('AdminModel');

		$existeNombreProducto = $this->AdminModel->obtenerPromoNombre($nombre);

		if (($existeNombreProducto) == false){
			$this->AdminModel->update_promo($nombre,$where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_Sql,$orderby_campo,$orderby_type,$foto,$id);
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error, el nombre no se encuentran disponibles'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function eliminarPromocionesVista(){
		$this->load->model('AdminModel');
		$productoSel['producto'] = $this->AdminModel->obtenerPromo();
		$this->load->view('admin/promociones/eliminar-promocion-seleccion',$productoSel);
	}

	public function eliminarPromociones() {
		$id = $this->input->post("promoBorrar");
		$this->load->model('AdminModel');

		if ($this->AdminModel->delete_promo($id)){
			$this->load->view('admin/panel-admin');
		}else{
			echo "<script> alert('Error,al eliminar el vendedor'); </script>";
			$this->load->view('admin/panel-admin');
		}
	}

	public function verPromociones(){
		$this->load->model('AdminModel');
		$productos['producto'] = $this->AdminModel->obtenerPromo();

		$this->load->view('admin/promociones/mostrar-promocion',$productos);
	}

	/**
	 *
	 */


	public function cerrarSesion(){
		$this->session->sess_destroy();
		$this->loginAdmin();
	}

	public function miCuentaAdmin(){
		$this->load->view('admin/perfil-admin');
	}
}
