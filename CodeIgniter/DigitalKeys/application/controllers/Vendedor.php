<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vendedor extends CI_Controller {

	public function loginVendedor() {
		$this->load->view('vendedor/login-vendedor');
	}
    public function logearseVendedor() {

        $nick = $this->cifrado->supercifrar($this->input->post('NickVendedor'));
        $pass = $this->input->post('PasswordVendedor');

        $this->load->model('VendedorModel');

        if ($nick && $pass && $this->VendedorModel->validate_vendedor($nick, $pass)) {
            $this->load->view('vendedor/panel-vendedor');
        }else{
			echo "<script> alert('Credenciales Erroneas');</script>";
			$this->load->view('vendedor/login-vendedor');
		}
    }

    public function inicio(){
		$this->load->view('vendedor/panel-vendedor');
	}

	/**
	 * PRODUCTO
	 */

	public function verProductos(){
		$nombrevendedor = $this->cifrado->superdescifrar($this->session->userdata('nombre'));

		$this->load->model('VendedorModel');
		$producto = $this->VendedorModel->obtenerProductosIdVendedor($nombrevendedor);

		$longitud = count($producto);
		for ($j = 0; $j < $longitud; $j++){
			$productosAnadidos[] = $this->VendedorModel->obtenerProductosId($producto[$j]['idproducto']);
		}
		$productos['producto'] = $productosAnadidos;

		$this->load->view('vendedor/productos/mostrar-producto',$productos);
	}

	public function verGanancias(){
		$nombrevendedor = $this->cifrado->superdescifrar($this->session->userdata('nombre'));

		$this->load->model('VendedorModel');

		$producto = $this->VendedorModel->obtenerKeyVendidas($nombrevendedor);
		$ganancias = 0;

		$longitud = count($producto);
		for ($j = 0; $j < $longitud; $j++){
			$precio = $this->VendedorModel->obtenerProductosId($producto[$j]['idproducto']);
			$ganancias = $ganancias + $precio[0]['precio'];

			$productos[] = $this->VendedorModel->obtenerProductosId($producto[$j]['idproducto']);
		}

		if (!isset($productos)){
			$productos ="";
		}
		$data['producto'] = $productos;
		$data['ganancias'] = $ganancias;

		$this->load->view('vendedor/productos/mostrar-ganancias',$data);
	}

	/**
	 * Keys
	 */

	public function anadirKeyVistaSeleccion() {
		$this->load->model('VendedorModel');
		$datosProducto['productos'] = $this->VendedorModel->obtenerProductos();

		$this->load->view('vendedor/keys/anadir-key-seleccion',$datosProducto);
	}

	public function anadirKeyVista(){
		$productoSelecc = $this->input->post("proSelecc");
		$this->load->model('VendedorModel');
		$productoSeleccionado['productoSel'] = $productoSelecc;

		$this->load->view('vendedor/keys/anadir-key',$productoSeleccionado);
	}

	public function anadirKey() {
		$valor = $this->input->post('valor');
		$idvendedor = $this->input->post('idvendedor');
		$idproducto = $this->input->post('idproducto');
		$activado = false;

		var_dump($idproducto);
		$this->load->model('VendedorModel');

		$existekey = $this->VendedorModel->obtenerKeysIgual($valor);

		if (($existekey)){
			$this->VendedorModel->add_key($valor, $idvendedor, $idproducto, $activado);
			$this->load->view('vendedor/panel-vendedor');
		}else{
			echo "<script> alert('Error, el valor no se encuentran disponibles'); </script>";
			$this->load->view('vendedor/panel-vendedor');
		}
	}

	/**
	 *
	 */

	public function cerrarSesion(){
		$this->session->sess_destroy();
		$this->load->view('vendedor/login-vendedor');
	}

	public function miCuentaVendedor(){
		$this->load->view('vendedor/perfil-vendedor');
	}
}
