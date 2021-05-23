<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('AdminModel');
		$this->load->model('UserModel');
		$data['banner'] = $this->AdminModel->obtenerBannersActivos();
		$data['novedades'] = $this->UserModel->obtenerNovedades();
		$data['masVendidos'] = $this->UserModel->obtenerVentas();
		$data['stock'] =  $this->UserModel->obtenerKeys();
		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$this->load->view('index',$data);
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
}
