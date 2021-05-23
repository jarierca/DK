<?php 
	require_once('mail/PHPMailer.php');
    require_once('mail/SMTP.php');

    //Se llama al constructor
    $correo = new PHPMailer\PHPMailer\PHPMailer();

    //Se crea un servidor SMTP
    $correo->IsSMTP();
    $correo->SMTPAuth = true;
    $correo->SMTPSecure = 'ssl';//TSL o SSL
    //Se utiliza el SMTP de Gmail
    $correo->Host = "smtp.gmail.com";
    //Se utiliza el puerto creado para ello
    $correo->Port = 465;//465 para SSL o 587 para TSL
    //Se pone la direccion de correo que va a enviar el mail
    $correo->Username = "noreply.soporte.digitalkeys@gmail.com";//tu correo
    //Se pone la contraseña del correo
    $correo->Password = "ProyectoDAW21";// tu clave
    //Se pone los datos de la persona que va a enviar el correo
    $correo->SetFrom("noreply.soporte.digitalkeys@gmail.com", "Digital Keys");//tu corrreo
    //Se pone la dirección de correo de destino, el que va a recibir el correo

	$mail = $this->cifrado->superdescifrar($mail);
	$nick = $this->cifrado->superdescifrar($nick);

    $correo->AddAddress($mail,$nick);//correo destino
    //Se pone el asunto del correo electrónico
    $correo->Subject = "Nuevo Ticket Administrativo - Soporte";//asunto
    //Se pone el texo del mensaje
    $correo->MsgHTML("¡Hola! ".$nick.".<br>Un administrador ha creado un ticket para informarle sobre algun problema.
	<br> Para ver mas detalles dirigite al apartado de Soporte >> Consultar Tickets.<br>");//mensaje o cupor del correo

    if(!$correo->Send()) {
      //echo "Hubo un error: " . $correo->ErrorInfo;
    }else {
      //echo "Mensaje enviado con exito.";
  	}
?>
