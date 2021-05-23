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
	<title>Factura</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="digitalkeys.com - Tu Factura">
	<meta name="keywords" content="factura, compra, pedido">
	<meta http-equiv="Content-Language" content="es">
	<link rel="icon" href="<?php echo base_url()."assets/"; ?>img/logo4.png">
	<link href="<?php echo base_url().'assets/';?>css/bootstrap.css" rel="stylesheet" />
	<style>@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  			body, h1, h2, h3, h4, h5, h6{
    			font-family: 'Bree Serif', serif;
 	 									}
  	</style>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="<?php echo base_url().'assets/js/';?>html2pdf.bundle.min.js"></script>
	<script src="<?php echo base_url().'assets/js/';?>facturaScript.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top" style="background-color: #1a252f; border-radius: 0;height: 80px; color: white;text-align: right">
	<div class="container" style="margin-top: 30px">
		<a id="btnCrearPdf" >
			<i class="fas fa-download" style="font-size: 24px;color: white" data-toggle="tooltip" data-placement="bottom" title="Descargar"></i>
		</a>
	</div>
</nav>

<div class="container" id="factura">
	<div class="row">

		<div class="col-xs-6">
			<h1><a href="<?php echo base_url();?>"><img alt="" src="<?php echo base_url().'assets/';?>img/logo5.png"/></a></h1>
		</div>
		<div class="col-xs-6 text-right">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>
						Digital Keys</br>
						C. La Gasca Zaragoza</br>
						CIF: B982754591
					</h4>
				</div>
				<div class="panel-body">
					<h4>FACTURA :
						<?php echo $pedidos[0]["id"];?>
					</h4>
				</div>
			</div>
		</div><hr/>
		<h1 style="text-align: center;">FACTURA</h1>

		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>
							<?php echo $pedidos[0]["fecha"];?>
						</h4>
					</div>
					<div class="panel-body">
						<h4>Comprador :
							<?php
								echo $this->cifrado->superdescifrar($this->session->userdata('nombre'))." ";
								echo $this->cifrado->superdescifrar($this->session->userdata('apellido1'))." ";
								echo $this->cifrado->superdescifrar($this->session->userdata('apellido2'))." ";
							?>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							Nick :
							<?php echo $this->cifrado->superdescifrar($this->session->userdata('nick'))." ";?>
						</h4>
					</div>
				</div>
			</div>

		</div>
		<pre></pre>
		<table class="table table-bordered">
			<thead >
			<tr >
				<th style="text-align: center;">
					<h4>Cantidad</h4>
				</th>
				<th style="text-align: center;">
					<h4>Concepto</h4>
				</th>
				<th style="text-align: center;">
					<h4>Precio unitario</h4>
				</th>
				<th style="text-align: center;">
					<h4>Total</h4>
				</th>

			</tr>
			</thead>
			<tbody>

			<?php
				$product = explode("/",  $pedidos[0]['idproductos']);

				$longitudp = count($product);
				for ($j = 0; $j < $longitudp; $j++) {

					$longitudPro = count($productos);
					for ($k = 0; $k < $longitudPro; $k++) {

						if ($product[$j] == $productos[$k][0]['id']){

							$nombreProducto = str_replace(" ","-",$productos[$k][0]['nombre']);
							printf('<tr>');
							printf('<td style="text-align: center;">1</td>');
							printf('<td><a href="'.base_url().'Productos/paginaProducto/'.$nombreProducto.'">'.$productos[$k][0]['nombre'].'</a></td>');
							printf('<td class=" text-right ">'.$productos[$k][0]['precio'].'€</td>');
							printf('<td class=" text-right ">'.$productos[$k][0]['precio'].'€</td>');
							printf('</tr>');
						}
					}
				}
			?>
			<tr>
				<td>&nbsp;</td>
				<td><a href="#"> &nbsp; </a></td>
				<td class="text-right">&nbsp;</td>
				<td class="text-right ">&nbsp;</td>

			</tr>
			<tr>
				<td colspan="3" style="text-align: right;">Total</td>
				<td style="text-align: right;"><?php echo $pedidos[0]["precio"];?>€</td>


			</tr>
			<tr>
				<td colspan="4" style="text-align: right;"></td>

			</tr>
			</tbody>
		</table>
		<pre></pre>
	</div>
</div>

</body>
</html>
