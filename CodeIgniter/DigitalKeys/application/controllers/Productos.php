<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {


	public function categoriaTipos($tipos){
		$tipo = str_replace("-"," ",$tipos);

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$config = array();
		$config["base_url"] = base_url() . "Productos/categoriaTipos/".$tipos;
		$config["total_rows"] = $this->UserModel->countTipo($tipo);
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_productosTipo($tipo,$config["per_page"], $page);
		$data['plat'] = $tipo;

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function categoriaPc(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "PC";

		$config = array();
		$config["base_url"] = base_url() . "Productos/categoriaPc";
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

	public function categoriaPsn(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "PSN";

		$config = array();
		$config["base_url"] = base_url() . "Productos/categoriaPsn";
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

	public function categoriaXbox(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "XBOX";

		$config = array();
		$config["base_url"] = base_url() . "Productos/categoriaXbox";
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

	public function categoriaNintendo(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "NINTENDO";

		$config = array();
		$config["base_url"] = base_url() . "Productos/categoriaNintendo";
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
		$config["base_url"] = base_url() . "Productos/categoriaHerramientas";
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

	public function categoriaPromociones(){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$platafoma = "PROMOCIONES";

		$config = array();
		$config["base_url"] = base_url() . "Productos/categoriaPromociones";
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
		$config["base_url"] = base_url() . "Productos/busqueda/$dato";
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

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$this->load->view('categorias/index-categorias',$data);
	}

	public function busqueda($dato){

		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$config = array();
		$config["base_url"] = base_url() . "Productos/busqueda/$dato";
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

	public function Promocion($nombrePromocion){
		$this->load->helper('url','form');
		$this->load->library("pagination");
		$this->load->model('UserModel');

		$nombrePromocion = str_replace("-"," ",$nombrePromocion);
		$opciones = $this->UserModel->obtenerPromoNombre($nombrePromocion);

		$where_sql_veces = $opciones[0]['where_sql_veces'];
		$where_sql = $opciones[0]['where_sql'];
		$where_campo = $opciones[0]['where_campo'];
		$where_condicion = $opciones[0]['where_condicion'];
		$like_sql_veces = $opciones[0]['like_sql_veces'];
		$like_sql = $opciones[0]['like_sql'];
		$like_campo = $opciones[0]['like_campo'];
		$like_condicion = $opciones[0]['like_condicion'];
		$like_match = $opciones[0]['like_match'];
		$orderby_sql = $opciones[0]['orderby_sql'];
		$orderby_campo = $opciones[0]['orderby_campo'];
		$orderby_type = $opciones[0]['orderby_type'];


		$nombrePromocion = str_replace(" ","-",$nombrePromocion);

		$config = array();
		$config["base_url"] = base_url() . "Productos/promocion/".$nombrePromocion;
		$config["total_rows"] = $this->UserModel->countPromoMostrar($where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type);
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['productos'] = $this->UserModel->get_promoMostrar($where_sql_veces,$where_sql,$where_campo,$where_condicion,$like_sql_veces,$like_sql,$like_campo,$like_condicion,$like_match,$orderby_sql,$orderby_campo,$orderby_type,$config["per_page"], $page);

		$data['cantidadDelCarrito'] = $this->cantidadProductosCarrito();

		$data['stock'] =  $this->UserModel->obtenerKeys();

		$this->load->view('categorias/ver-productos-promo',$data);
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
