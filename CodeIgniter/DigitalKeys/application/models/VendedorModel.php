<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class VendedorModel extends CI_Model {

    public function validate_vendedor($nombre, $pass) {

        $this->db->select('*');
        $this->db->from('vendedor');
        $this->db->where('nombre', $nombre);

        $resultado = $this->db->get();

        $array = $resultado->result_array();

        if (count($array) == 1) {
            $this->set_session($array[0]);
			if (password_verify($pass, $array[0]['password']))
				return true;
        }
    }

	public function set_session($usuario) {
		$this->session->set_userdata(array(
			'id' => $usuario['id'],
			'nombre' => $usuario['nombre'],
			'password' => $usuario['password'],
			'mail' => $usuario['mail'],
			'telefono' => $usuario['telefono'],
			'ventas' => $usuario['ventas'],
			'isLoggedIn' => true,
			'isAdminLoggedIn' => false,
			'isVendedorLoggedIn' => true
		));
	}

	public function update_pass($nick, $pass) {
		$this->db->set('nick', $nick);
		$this->db->set('password', $pass);

		if ($this->db->update('vendedor'))
			return true;
		else
			return false;
	}


	/**
	 * PRODUCTOS
	 */

	public function obtenerNombreProducto($nombre) {
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('nombre', $nombre);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerProductos(){
		$this->db->select('*');
		$this->db->from('productos');
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$productos = $array;
		return $productos;
	}

	public function obtenerProductosId($id){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$productos = $array;
		return $productos;
	}

	public function obtenerProductosIdVendedor($nombrevendedor){
		$this->db->select('*');
		$this->db->from('llaves');
		$this->db->where('idvendedor', $nombrevendedor);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$productos = $array;
		return $productos;
	}

	public function obtenerProductoSeleccionado($nombre){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('id',$nombre);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$vendedores = $array;
		return $vendedores;

	}

	/**
	 * KEYS
	 */

	public function obtenerKeysIgual($valor) {
		$this->db->select('*');
		$this->db->from('llaves');
		$this->db->where('valor', $valor);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return false;
		}else{
			return true;
		}
	}

	public function add_key($valor, $idvendedor, $idproducto, $activado) {
		$data = array(
			'valor' => $valor,
			'idvendedor' => $idvendedor,
			'idproducto'=> $idproducto,
			'activado' => $activado
		);

		if ($this->db->insert('llaves', $data))
			return true;
		else
			return false;
	}

	public function obtenerKeyVendidas($idvendedor){
		$this->db->select('*');
		$this->db->from('llaves');
		$this->db->where('idvendedor', $idvendedor);
		$this->db->where('activado', "1");

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$llaves = $array;

		return $llaves;
	}

	/**
	 *
	 */
}
