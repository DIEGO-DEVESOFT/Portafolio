<?php
session_start();
require_once "models/Pregunta.php";

class Landing
{
    public function __construct()
    {
    }

    public function index()
    {
        $msj = "";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo $msj;
            require_once "views/Portafolio/header.view.php";
            require_once "views/Portafolio/index.view.php";
            require_once "views/Portafolio/footer.view.php";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombreCompleto = $_POST['NombreCompleto'];
            $email = $_POST['email'];
            $pregunta = $_POST['Pregunta'];

            $Pregunta = new Pregunta(NULL, $nombreCompleto, $email, $pregunta);

            // Registrar la pregunta
            $Pregunta->RegistrarPregunta();

            // Enviar correo electrónico
            $asunto = "Nueva pregunta de $nombreCompleto";
            $mensaje = "Se ha recibido una nueva pregunta:\n\n";
            $mensaje .= "Nombre: $nombreCompleto\n";
            $mensaje .= "Email: $email\n";
            $mensaje .= "Pregunta: $pregunta\n";

            // Ajusta la dirección de correo electrónico a la que quieres enviar el mensaje
            $destinatario = "diegogonzalezprogramador@gmail.com";

            // Puedes personalizar el encabezado del correo según tus necesidades
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";

            // Enviar el correo electrónico
            mail($destinatario, $asunto, $mensaje, $headers);

            // Redireccionar después de enviar el correo
            header("Location: ?c=Landing");
        }
    }
}
?>
