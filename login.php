<?php
require_once 'classes/Medico.php'; 
session_start();

if(!isset($_SESSION['medicos'])) {
    $_SESSION['medicos'] = [];
}

$mensaje = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $encontrado = false;

    foreach($_SESSION['medicos'] as $medico) {
        if($medico->getCorreo() === $correo && $medico->getPassword() === $password) {
            $_SESSION['medico_activo'] = $medico->getNombres() . " " . $medico->getApellidos();
            $encontrado = true;
            header("Location: bienvenida.php");
            exit;
        }
    }

    if(!$encontrado) {
        $mensaje = "Correo o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Médico</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Inicio de Sesión</h2>
    <?php if(!empty($mensaje)) echo "<p style='color:red;'>$mensaje</p>"; ?>
    <form method="POST">
        Correo: <input type="email" name="correo"><br>
        Contraseña: <input type="password" name="password"><br>
        <input type="submit" value="Ingresar">
    </form>
    <p><a href="registro.php">Registrar nuevo médico</a></p>
</div>
</body>
</html>
