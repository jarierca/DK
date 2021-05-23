<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class AdminModel extends CI_Model {

    public function validate_admin($nick, $pass) {

        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('nick', $nick);

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
			'nick' => $usuario['nick'],
			'nombre' => $usuario['nombre'],
			'password' => $usuario['password'],
			'apellido1' => $usuario['apellido1'],
			'apellido2' => $usuario['apellido2'],
			'mail' => $usuario['mail'],
			'telefono' => $usuario['telefono'],
			'isLoggedIn' => true,
			'isAdminLoggedIn' => true
		));
	}

	public function update_pass($nick, $pass) {
		$this->db->set('password', $pass);
		$this->db->where('nick', $nick);

		if ($this->db->update('admin'))
			return true;
		else
			return false;
	}

    public function add_user1($nick, $password, $nombre, $apellido1, $apellido2, $telefono,$mail) {
        $data = array(
			'nick' => $nick,
			'password' => $password,
            'nombre'=> $nombre,
            'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'telefono' => $telefono,
			'mail' => $mail
        );

        if ($this->db->insert('usuario', $data))
            return true;
        else
            return false;
    }

	public function set_sessionProductos($usuario) {
		$this->session->set_pisos(array(
			'id' => 1,
			'titulo' => $usuario['nick'],
			'descripcion' => $usuario['descripcion'],
			'km' => $usuario['km'],
			'habitaciones' => $usuario['habitaciones'],
			'Telefono' => $usuario['Telefono'],
			'isLoggedIn' => true,
			'isAdminLoggedIn' => true
		));
	}


	/**
	 * USUARIOS
	*/
	public function add_user($nick, $password, $nombre, $apellido1, $apellido2, $telefono,$mail) {
		$data = array(
			'nick' => $nick,
			'password' => $password,
			'nombre'=> $nombre,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'telefono' => $telefono,
			'mail' => $mail
		);

		if ($this->db->insert('usuario', $data))
			return true;
		else
			return false;
	}

	public function obtenerNick($nick) {
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nick', $nick);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerEmail($mail) {
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('mail', $mail);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerUsuarios(){
		$this->db->select('*');
		$this->db->from('usuario');
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$usuarios = $array;
		return $usuarios;
	}

	public function obtenerUsuarioSeleccionado($user){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('id',$user);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$usuarios = $array;
		return $usuarios;

	}

	public function update_usuario($id,$nick, $password,$nombre,$apellido1,$apellido2,$telefono, $mail) {
		$this->db->set('nick', $nick);
		$this->db->set('nombre', $nombre);
		$this->db->set('password', $password);
		$this->db->set('apellido1', $apellido1);
		$this->db->set('apellido2', $apellido2);
		$this->db->set('mail', $mail);
		$this->db->set('telefono', $telefono);
		$this->db->where('id',$id);

		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}

	public function delete_usuario($id) {
		$this->db->where("id", $id);
		if ($this->db->delete("usuario"))
			return true;
		else {
			return false;
		}
	}

	/**
	 * VENDEDORES
	 */

	public function add_vendedor($nombre, $password, $telefono, $mail) {
		$data = array(
			'nombre' => $nombre,
			'password' => $password,
			'telefono'=> $telefono,
			'mail' => $mail
		);

		if ($this->db->insert('vendedor', $data))
			return true;
		else
			return false;
	}

	public function obtenerNombreVendedor($nombre) {
		$this->db->select('*');
		$this->db->from('vendedor');
		$this->db->where('nombre', $nombre);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerEmailVendedor($mail) {
		$this->db->select('*');
		$this->db->from('vendedor');
		$this->db->where('mail', $mail);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerVendedores(){
		$this->db->select('*');
		$this->db->from('vendedor');
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$vendedores = $array;
		return $vendedores;
	}

	public function obtenerVendedorSeleccionado($vendedor){
		$this->db->select('*');
		$this->db->from('vendedor');
		$this->db->where('id',$vendedor);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$vendedores = $array;
		return $vendedores;

	}

	public function update_vendedor($id,$nombre, $password,$mail,$telefono) {
		$this->db->set('nombre', $nombre);
		$this->db->set('password', $password);
		$this->db->set('mail', $mail);
		$this->db->set('telefono', $telefono);
		$this->db->where('id',$id);

		if ($this->db->update('vendedor'))
			return true;
		else
			return false;
	}

	public function delete_vendedor($id) {
		$this->db->where("id", $id);
		if ($this->db->delete("vendedor"))
			return true;
		else {
			return false;
		}
	}

	/**
	 * PRODUCTOS
	 */
	//,$idVendedor
	public function add_producto($nombre, $descripcion, $genero, $tipo, $plataforma, $plataformaPublicacion, $precio, $imagen,$fecha) {
		$data = array(
			'nombre' => $nombre,
			'descripcion' => $descripcion,
			'genero'=> $genero,
			'tipo' => $tipo,
			'plataforma' => $plataforma,
			'plataformaPublicacion' => $plataformaPublicacion,
			'precio' => $precio,
			'foto' => $imagen,
			'fecha' => $fecha,
			//'idvendedor' => $idVendedor
		);

		if ($this->db->insert('productos', $data))
			return true;
		else
			return false;
	}

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

	public function obtenerProductoSeleccionado($nombre){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('id',$nombre);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$vendedores = $array;
		return $vendedores;

	}

	public function update_producto($nombre,$descripcion, $genero,$tipo,$plataforma,$plataformaPublicacion,$precio,$imagen,$fecha, $id) {
		$this->db->set('nombre', $nombre);
		$this->db->set('descripcion', $descripcion);
		$this->db->set('genero', $genero);
		$this->db->set('tipo', $tipo);
		$this->db->set('plataforma', $plataforma);
		$this->db->set('plataformaPublicacion', $plataformaPublicacion);
		$this->db->set('precio', $precio);
		$this->db->set('foto', $imagen);
		$this->db->set('fecha', $fecha);
		//$this->db->set('idvendedor', $nick);
		$this->db->where('id',$id);

		if ($this->db->update('productos'))
			return true;
		else
			return false;
	}

	public function delete_producto($id) {
		$this->db->where("id", $id);
		if ($this->db->delete("productos"))
			return true;
		else {
			return false;
		}
	}

	/**
	 * USUARIOS
	 */
	public function add_admin($nick, $password, $nombre, $apellido1, $apellido2, $telefono,$mail) {
		$data = array(
			'nick' => $nick,
			'password' => $password,
			'nombre'=> $nombre,
			'apellido1' => $apellido1,
			'apellido2' => $apellido2,
			'telefono' => $telefono,
			'mail' => $mail
		);

		if ($this->db->insert('admin', $data))
			return true;
		else
			return false;
	}

	public function obtenerDatosPerfil($nick){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('nick', $nick);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) == 1) {
			$this->set_session($array[0]);
			return true;
		}
	}

	public function obtenerNickAdmin($nick) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('nick', $nick);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerEmailAdmin($mail) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('mail', $mail);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function obtenerAdmins(){
		$this->db->select('*');
		$this->db->from('admin');
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$admin = $array;
		return $admin;
	}

	public function obtenerAdminSeleccionado($admin){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id',$admin);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$admin = $array;
		return $admin;
	}

	public function update_admin($id,$nick,$nombre,$apellido1,$apellido2,$telefono, $mail) {
		$this->db->set('nick', $nick);
		$this->db->set('nombre', $nombre);
		$this->db->set('apellido1', $apellido1);
		$this->db->set('apellido2', $apellido2);
		$this->db->set('mail', $mail);
		$this->db->set('telefono', $telefono);
		$this->db->where('id',$id);

		if ($this->db->update('admin'))
			return true;
		else
			return false;
	}

	public function delete_admin($id) {
		$this->db->where("id", $id);
		if ($this->db->delete("admin"))
			return true;
		else {
			return false;
		}
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

	/**
	 * BANNER
	 */

	public function add_banner($promocion,$foto,$alt,$activado,$promoid) {
		$data = array(
			'promocion' => $promocion,
			'foto' => $foto,
			'alt'=> $alt,
			'activado' => $activado,
			'id_promocion' => $promoid
		);

		if ($this->db->insert('banner', $data))
			return true;
		else
			return false;
	}


	public function obtenerBanners(){
		$this->db->select('*');
		$this->db->from('banner');
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$productos = $array;
		return $productos;
	}

	public function obtenerBannersActivos(){
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->where('activado', "1");
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$productos = $array;
		return $productos;
	}


	public function obtenerBannerSeleccionado($id){
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->where('id',$id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$vendedores = $array;
		return $vendedores;

	}

	public function obtenerPromoBanner($promocion) {
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->where('promocion', $promocion);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function update_banner($promocion,$alt,$activado,$promoid,$id) {
		$this->db->set('promocion', $promocion);
		$this->db->set('alt', $alt);
		$this->db->set('activado', $activado);
		$this->db->set('id_promocion', $promoid);
		$this->db->where('id',$id);

		if ($this->db->update('banner'))
			return true;
		else
			return false;
	}

	public function delete_banner($id) {
		$this->db->where("id", $id);
		if ($this->db->delete("banner"))
			return true;
		else {
			return false;
		}
	}

	/**
	 * TICKETS
	 */

	public function anadirTicket($fecha, $serie, $estado,$nick_user,$email_user,$asunto,$mensaje,$solucion,$admin){

		$data = array(
			'fecha' => $fecha,
			'serie' => $serie,
			'estado' => $estado,
			'nick_user'=> $nick_user,
			'email_user'=> $email_user,
			'asunto' => $asunto,
			'mensaje'=> $mensaje,
			'solucion'=> $solucion,
			'admin' => $admin
		);
		if ($this->db->insert('ticket', $data))
			return true;
		else
			return false;
	}

	public function obtenerTickets($nickuser){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('nick_user', $nickuser);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$tickets = $array;
		return $tickets;
	}

	public function obtenerTicketsNumFilas($nickuser){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('nick_user', $nickuser);
		$resultado = $this->db->get();

		$array = $resultado->num_rows();

		$tickets = $array;
		return $tickets;
	}

	public function verTicket($id){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$ticket = $array;
		return $ticket;
	}

	public function eliminarTicket($id){
		$this->db->where("id", $id);
		if ($this->db->delete("ticket"))
			return true;
		else {
			return false;
		}
	}

	public function countConsultarTickets($nickuser){
		$this->db->select('*');
		$this->db->from('ticket');
		//$this->db->where('nick_user', $nickuser);
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_ticketsConsultar($nickuser, $limit, $start){
		$this->db->select('*');
		$this->db->from('ticket');
		//$this->db->where('nick_user', $nickuser);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function modificarTicket($fecha, $estado,$nick_user,$email_user,$asunto,$mensaje,$solucion){
		$this->db->set('fecha', $fecha);
		$this->db->set('estado', $estado);
		$this->db->set('email_user', $email_user);
		$this->db->set('asunto', $asunto);
		$this->db->set('mensaje', $mensaje);
		$this->db->set('solucion', $solucion);

		$this->db->where('nick_user',$nick_user);

		if ($this->db->update('ticket'))
			return true;
		else
			return false;
	}

	/**
	 * PROMOCION
	 */

	public function add_promo($nombre,$where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type,$foto) {
		$data = array(
			'nombre' => $nombre,
			'where_sql_veces' => $where_sql_veces,
			'where_sql'=> $where_sql,
			'where_campo' => $where_campo,
			'where_condicion' => $where_condicion,
			'like_sql_veces' => $like_sql_veces,
			'like_sql' => $like_sql,
			'like_campo' => $like_campo,
			'like_condicion' => $like_condicion,
			'like_match' => $like_match,
			'orderby_sql' => $orderby_sql,
			'orderby_campo' => $orderby_campo,
			'orderby_type' => $orderby_type,
			'foto' => $foto
		);

		if ($this->db->insert('promociones', $data))
			return true;
		else
			return false;
	}


	public function obtenerPromo(){
		$this->db->select('*');
		$this->db->from('promociones');
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		return $array;
	}

	public function obtenerPromoActivos($id){
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->where('activado', "1");
		$this->db->where('id_promocion', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		return $array;
	}

	public function obtenerPromoSeleccionado($id){
		$this->db->select('*');
		$this->db->from('promociones');
		$this->db->where('id',$id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$vendedores = $array;
		return $vendedores;

	}

	public function obtenerPromoNombre($nombren) {
		$this->db->select('*');
		$this->db->from('promociones');
		$this->db->where('nombre', $nombren);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		return $array;
	}

	public function update_promo($nombre,$where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type,$foto,$id) {
		$this->db->set('nombre', $nombre);
		$this->db->set(	'where_sql_veces',$where_sql_veces);
		$this->db->set(	'where_sql',$where_sql);
		$this->db->set(	'where_campo',$where_campo);
		$this->db->set(	'where_condicion',$where_condicion);
		$this->db->set(	'like_sql_veces',$like_sql_veces);
		$this->db->set(	'like_sql',$like_sql);
		$this->db->set(	'like_campo',$like_campo);
		$this->db->set('like_condicion',$like_condicion);
		$this->db->set('like_match',$like_match);
		$this->db->set('orderby_sql',$orderby_sql);
		$this->db->set(	'orderby_campo',$orderby_campo);
		$this->db->set(	'orderby_type',$orderby_type);
		$this->db->set(	'foto',$foto);

		$this->db->where('id',$id);

		if ($this->db->update('promociones'))
			return true;
		else
			return false;
	}

	public function delete_promo($id) {
		$this->db->where("id", $id);
		if ($this->db->delete("promociones"))
			return true;
		else {
			return false;
		}
	}

	public function mostrarPromo($where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type){
		$this->db->select('*');
		$this->db->from('productos');

		if ($where_sql){
			$where_campo = explode("/",$where_campo);
			$where_condicion = explode("/",$where_condicion);

			for ($i = 0; $i < $where_sql_veces; $i++){
				$this->db->where($where_campo[$i],$where_condicion[$i]);
			}
		}
		if ($like_sql){
			$like_campo = explode("/",$like_campo);
			$like_condicion = explode("/",$like_condicion);
			$like_match = explode("/",$like_match);

			for ($i = 0; $i < $like_sql_veces; $i++){
				$this->db->like($like_campo[$i],$like_condicion[$i],$like_match[$i]);
			}
		}
		if ($orderby_sql){
			$this->db->order_by($orderby_campo, $orderby_type);
		}

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		return $array;
	}

	/**
	 *
	 */
}
