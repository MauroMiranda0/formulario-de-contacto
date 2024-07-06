<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if ($name && $email && $message) {
        $to = "mvergara04@yahoo.com.mx";
        $subject = "Nuevo mensaje de contacto";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content_Type: text/plain; charset=UTF-8\r\n";

        $body = "Nombre: $name\nCorreo Electronico: $email\nMensaje:\n$message";

        if(mail($to , $subject, $body, $headers)){
            echo "Mensaje enviado con éxito.";
        }else {
            echo "Error al enviar el mensaje.";
        }
    }else {
        echo "Por favor, completa los campos correctamente.";
    }
}else {
    echo "Metodo de solicitud no valido.";
}
?>