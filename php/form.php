<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["name"];
    $correo = $_POST["address"];
    $telefono = $_POST["phone"];
    $mensaje = $_POST["message"];

    // Destinatario y asunto del correo
    $destinatario = "tudirecciondecorreo@example.com";
    $asunto = "Nuevo mensaje de contacto desde la landing page";

    // Construir el cuerpo del mensaje
    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje = "Telefono: $telefono\n"
    $cuerpoMensaje .= "Correo electrónico: $correo\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje\n";

    // Cabeceras del correo
    $cabeceras = "From: $correo\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $cuerpoMensaje, $cabeceras)) {
        // Redirigir a una página de éxito si el correo se envía correctamente
        header("Location: contacto-exitoso.html");
        exit;
    } else {
        // Si el correo no se puede enviar, redirigir a una página de error
        header("Location: error-envio.html");
        exit;
    }
}
?>