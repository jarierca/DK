<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class UserModel extends CI_Model {

    public function validate_user($nick, $pass) {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('nick', $nick);

        $resultado = $this->db->get();

        $array = $resultado->result_array();

        if (count($array) == 1) {
            $this->set_session($array[0]);
            if (password_verify($pass, $array[0]['password']))
            return true;
        }else{
        	return false;
		}
    }

    public function set_session($usuario) {
        $this->session->set_userdata(array(
            'id' => 1,
            'nick' => $usuario['nick'],
			'nombre' => $usuario['nombre'],
			'password' => $usuario['password'],
			'apellido1' => $usuario['apellido1'],
			'apellido2' => $usuario['apellido2'],
			'mail' => $usuario['mail'],
			'telefono' => $usuario['telefono'],
            'isLoggedIn' => true,
			'isAdminLoggedIn' => false
		));
    }

    public function update_user($nick, $nombre, $apellido1, $apellido2, $mail, $telefono) {
        $this->db->set('nombre', $nombre);
		$this->db->set('apellido1', $apellido1);
		$this->db->set('apellido2', $apellido2);
		$this->db->set('mail', $mail);
		$this->db->set('telefono', $telefono);
        $this->db->where('nick', $nick);

        if ($this->db->update('usuario'))
            return true;
        else
            return false;
    }

	public function update_pass($nick, $pass) {
		$this->db->set('password', $pass);
		$this->db->where('nick', $nick);

		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}

    public function delete_user($nick) {
        $this->db->where("nick", $nick);
        if ($this->db->delete("usuario"))
            return true;
        else {
            return false;
        }
    }

    public function add_user($nick, $pass, $nombre, $apellido1,$apellido2, $mail, $telefono) {
        $data = array(
			'nick' => $nick,
			'password' => $pass,
            'nombre' => $nombre,
            'apellido1'=> $apellido1,
			'apellido2'=> $apellido2,
            'mail' => $mail,
			'telefono' => $telefono,
        );

        if ($this->db->insert('usuario', $data))
            return true;
        else
            return false;
    }

    public function obtenerDatosPerfil($nick){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nick', $nick);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) == 1) {
			$this->set_session($array[0]);
			return true;
		}

		//Como se obtendrían los datos del usuario

		/*
		  $usuario = $array[0];

		  echo $usuario['Nombre'];
		  echo $usuario['Contrasena'];
		 */
	}

	public function recuperarPass($mail){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('mail', $mail);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) == 1) {
			$this->set_session($array[0]);
			return true;
		}

		//Como se obtendrían los datos del usuario

		/*
		  $usuario = $array[0];

		  echo $usuario['Nombre'];
		  echo $usuario['Contrasena'];
		 */
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

	public function insertarCodigo($codigo,$nick){
		$this->db->set('codigo', $codigo);
		$this->db->where('nick', $nick);

		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}

	public function comprobarCodigoEmail($mail,$codigo) {
    	if ($this->obtenerEmail($mail)){
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where('codigo', $codigo);

			$resultado = $this->db->get();

			$array = $resultado->result_array();

			if (count($array) >= 1) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function updatePassOlvidada($mail, $pass) {
		$this->db->set('password', $pass);
		$this->db->where('mail', $mail);

		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}

	public function set_email($email) {
		$mail = $this->session->set_userdata($email);
	}
/*
	public function obtenerProductoPorPlataforma($platafoma){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('plataforma', $platafoma);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$platafoma = $array;
		return $platafoma;
	}*/

	public function obtenerProductoPorTipo($tipo){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('tipo', $tipo);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$tipo = $array;
		return $tipo;
	}

	public function obtenerProductoPorNombre($nombre){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('nombre', $nombre);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$producto = $array;
		return $producto;
	}

	public function obtenerProductoPorId($id){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$producto = $array;
		return $producto;
	}

	public function obtenerProductoPorId2($id){
		$this->db->select('id,nombre,precio,foto');
		$this->db->from('productos');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$producto = $array;
		return $producto;
	}

	public function comprobarProductoEnFavoritos($id){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->like('whitelist', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}

	public function comprobarProductoEnCarrito($id){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->like('carrito', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		if (count($array) >= 1) {
			return true;
		}else{
			return false;
		}
	}
/*
	public function obtenerBusquedaDeProducto($datoABuscar){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->like('nombre', $datoABuscar);
		$this->db->or_like('plataforma', $datoABuscar);
		$this->db->or_like('genero', $datoABuscar);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$producto = $array;
		return $producto;
	}*/

	public function countPlataforma($platafoma){
		$this->db->from('productos');
		$this->db->where('plataforma', $platafoma);
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_productosPlataforma($platafoma,$limit, $start){
		$this->db->from('productos');
		$this->db->where('plataforma', $platafoma);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function countPromo(){
		$this->db->from('promociones');
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_promo($limit, $start){
		$this->db->from('promociones');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function countTipo($tipo){
		$this->db->from('productos');
		$this->db->where('tipo', $tipo);
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_productosTipo($tipo,$limit, $start){
		$this->db->from('productos');
		$this->db->where('tipo', $tipo);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function countBuscar($datoABuscar){
		$this->db->from('productos');
		$this->db->like('nombre', $datoABuscar, 'after');
		$this->db->or_like('plataforma', $datoABuscar, 'after');
		$this->db->or_like('genero', $datoABuscar, 'after');
		$this->db->or_like('plataformaPublicacion', $datoABuscar, 'after');
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_productosBuscar($datoABuscar,$limit, $start){
		$this->db->from('productos');
		$this->db->like('nombre', $datoABuscar, 'after');
		$this->db->or_like('plataforma', $datoABuscar, 'after');
		$this->db->or_like('genero', $datoABuscar, 'after');
		$this->db->or_like('plataformaPublicacion', $datoABuscar, 'after');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function countWhitelist($favsUser){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where_in('id', $favsUser);
		$count = $this->db->count_all_results();
		return $count;
	}
	//CONSULTA
	//SELECT * FROM `productos` WHERE id = 7 and id = 25 and id = 22 and id = 18
	public function get_productosWhitelist($favsUser, $limit, $start){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where_in('id', $favsUser);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function anadirAWhitelistBBDD($favsUser, $idnuevoFav, $nick){

		if ($favsUser != ""){
			$idnuevoFav = "/".$idnuevoFav;

			$this->db->set('whitelist', $favsUser.$idnuevoFav);
		}else{
			$this->db->set('whitelist', $idnuevoFav);
		}

		$this->db->where('nick', $nick);


		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}
//BBDD  de favoritos // ID del producto a eliminar // nick del user
	public function eliminarDeLaWhitelistBBDD($favsUser, $idsinFav, $nick){
		$eliminarFavId = explode("/", $favsUser);
		$noBorrado = "";

		for ($i= 0; $i < count($eliminarFavId); $i++) {

			if ($eliminarFavId[$i] != $idsinFav) {
				if ($noBorrado == ""){
					$noBorrado = $noBorrado.$eliminarFavId[$i];
				}else{
					$noBorrado = $noBorrado."/".$eliminarFavId[$i];
				}

				$this->db->set('whitelist', $noBorrado);
			}else if ($eliminarFavId[$i] == $idsinFav){
				$this->db->set('whitelist', $noBorrado);
			}
			$this->db->where('nick', $nick);

			$this->db->update('usuario');
		}
	}

	public function obtenerWhiteList($nick){
		$this->db->select('whitelist');
		$this->db->from('usuario');
		$this->db->where('nick', $nick);
		//$this->db->where('whitelist', !"");

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$whitelist = $array;

		if (count($whitelist) >= 1) {
			return $whitelist;
		}else{
			return false;
		}
	}

	public function anadirACarritoBBDD($favsUser, $idnuevoFav, $nick){

		if ($favsUser != ""){
			$idnuevoFav = "/".$idnuevoFav;

			$this->db->set('carrito', $favsUser.$idnuevoFav);
		}else{
			$this->db->set('carrito', $idnuevoFav);
		}

		$this->db->where('nick', $nick);


		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}
//BBDD  de favoritos // ID del producto a eliminar // nick del user
	public function eliminarDelCarritoBBDD($favsUser, $idsinFav, $nick){
		$eliminarFavId = explode("/", $favsUser);
		$noBorrado = "";

		for ($i= 0; $i < count($eliminarFavId); $i++) {

			if ($eliminarFavId[$i] != $idsinFav) {
				if ($noBorrado == ""){
					$noBorrado = $noBorrado.$eliminarFavId[$i];
				}else{
					$noBorrado = $noBorrado."/".$eliminarFavId[$i];
				}

				$this->db->set('carrito', $noBorrado);
			}else if ($eliminarFavId[$i] == $idsinFav){
				$this->db->set('carrito', $noBorrado);
			}
			$this->db->where('nick', $nick);

			$this->db->update('usuario');
		}
	}

	public function obtenerCarrito($nick){
		$this->db->select('carrito');
		$this->db->from('usuario');
		$this->db->where('nick', $nick);
		//$this->db->where('whitelist', !"");

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$carrito = $array;

		if (count($carrito) >= 1) {
			return $carrito;
		}else{
			return false;
		}
	}

	public function borrarCarrito($nick){
    	$this->db->set('carrito', "");
		$this->db->where('nick', $nick);

		if ($this->db->update('usuario'))
			return true;
		else
			return false;
	}

	public function obtenerKey($idProducto){
		$this->db->select('*');
		$this->db->from('llaves');
		$this->db->where('idproducto', $idProducto);
		$this->db->where('activado', "false");

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$llaves = $array;

		if (count($llaves) >= 1) {
			return $llaves;
		}else{
			return false;
		}
	}

	public function obtenerKeys(){
		$this->db->select('*');
		$this->db->from('llaves');
		$this->db->where('activado', false);

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$llaves = $array;

		return $llaves;
	}

	public function obtener1Key($idProducto){
		$this->db->select('*');
		$this->db->from('llaves');
		$this->db->where('idproducto', $idProducto);
		$this->db->where('activado', false);
		$this->db->limit(1);

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$llaves = $array;

		if (count($llaves) >= 1) {
			return $llaves;
		}else{
			return false;
		}
	}

	public function activarKey($id) {
		$this->db->set('activado', true);
		$this->db->where('id', $id);

		if ($this->db->update('llaves'))
			return true;
		else
			return false;
	}

	public function anadirPedido($favs, $llaves, $id){

		$longitud = count($favs);
		$productoCadena = "";
		$llavescadena = "";
		$precioTotal = 0;
		$fecha =  date("d")."-". date("m")."-".date("Y");

		for ($j = 0; $j < $longitud; $j++) {
			if ($productoCadena == ""){
				$productoCadena = $productoCadena.$favs[$j][0]['id'];
			}else{
				$productoCadena = $productoCadena."/".$favs[$j][0]['id'];
			}
			if ($llavescadena == ""){
				$llavescadena = $llavescadena.$llaves[$j][0]['valor'];
			}else{
				$llavescadena = $llavescadena."/".$llaves[$j][0]['valor'];
			}
			$precioTotal = $precioTotal + $favs[$j][0]["precio"];
			//$llaves = $this->UserModel->obtenerKey($favs[0][0]["id"]);
		}

		if ($productoCadena != "" && $llavescadena != ""){
			$data = array(
				'idproductos' => $productoCadena,
				'llaves' => $llavescadena,
				'idusuario' => $id,
				'fecha'=> $fecha,
				'precio'=> $precioTotal
			);
			//echo $productoCadena."::::".$llavescadena."::::".$fecha;
			if ($this->db->insert('pedidos', $data))
				return true;
			else
				return false;
		}else{
			return false;
		}
	}

	public function obtenerPedidos($id){
		$this->db->select('*');
		$this->db->from('pedidos');
		$this->db->where('idusuario', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$pedidos = $array;
		return $pedidos;
	}

	public function obtenerPedidosporIdP($id){
		$this->db->select('*');
		$this->db->from('pedidos');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();

		$pedidos = $array;
		return $pedidos;
	}

	/**
	 * TICKET
	 */

	public function anadirTicket($fecha, $serie, $estado,$nick_user,$email_user,$asunto,$mensaje,$solucion){

		$data = array(
			'fecha' => $fecha,
			'serie' => $serie,
			'estado' => $estado,
			'nick_user'=> $nick_user,
			'email_user'=> $email_user,
			'asunto' => $asunto,
			'mensaje'=> $mensaje,
			'solucion'=> $solucion
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
		$this->db->where('nick_user', $nickuser);
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_ticketsConsultar($nickuser, $limit, $start){
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->where('nick_user', $nickuser);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	/***
	 * ESTADISTICAS
	 */

	public function obtenerVentas(){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->order_by('ventas', 'desc');
		$this->db->limit(8);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$ventas = $array;

		return $ventas;
	}

	public function obtenerVentasID($id){
		$this->db->select('ventas');
		$this->db->from('productos');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$ventas = $array;

		return $ventas;
	}

	public function anadirVentas($newVentas,$id){
		$this->db->set('ventas', $newVentas);
		$this->db->where('id', $id);

		if ($this->db->update('productos'))
			return true;
		else
			return false;
	}

	public function obtenerNovedades(){
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->order_by('fecha', 'desc');
		$this->db->limit(4);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$ventas = $array;

		return $ventas;
	}

	public function obtenerNovedadesID($id){
		$this->db->select('ventas');
		$this->db->from('productos');
		$this->db->where('id', $id);
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		$ventas = $array;

		return $ventas;
	}

	public function anadirNovedad($newVentas,$id){
		$this->db->set('ventas', $newVentas);
		$this->db->where('id', $id);

		if ($this->db->update('productos'))
			return true;
		else
			return false;
	}

	public function countPromoMostrar($where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type){
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
		$count = $this->db->count_all_results();
		return $count;
	}

	public function get_promoMostrar($where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type,$limit, $start){
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
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function mostrarPromo($where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type){
		$this->db->select('*');
		$this->db->from('productos');

		if ($where_sql){
			for ($i = 0; $i < $where_sql_veces; $i++){
				$this->db->where($where_campo,$where_condicion);
			}
		}
		if ($like_sql){
			for ($i = 0; $i < $like_sql_veces; $i++){
				$this->db->like($like_campo,$like_condicion,$like_match);
			}
		}
		if ($orderby_sql){
			$this->db->order_by($orderby_campo, $orderby_type);
		}

		$resultado = $this->db->get();

		$array = $resultado->result_array();
		return $array;
	}

	public function obtenerPromo(){
		$this->db->select('*');
		$this->db->from('promociones');
		$resultado = $this->db->get();

		$array = $resultado->result_array();
		return $array;
	}

	public function obtenerPromoNombre($nombre) {
		$this->db->select('*');
		$this->db->from('promociones');
		$this->db->where('nombre', $nombre);

		$resultado = $this->db->get();

		$array = $resultado->result_array();

		return $array;
	}
}
