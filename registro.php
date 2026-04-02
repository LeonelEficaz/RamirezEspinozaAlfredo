<?php
require_once 'classes/Medico.php'; 
session_start();

if(!isset($_SESSION['medicos'])) {
    $_SESSION['medicos'] = [];
}

$mensaje = "";
$errores = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $apellidos = $_POST['apellidos'];
    $nombres = $_POST['nombres'];
    $especialidad = $_POST['especialidad'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    if(empty($apellidos) || empty($nombres) || empty($especialidad) || empty($fechaNacimiento) || empty($correo) || empty($password)) {
        $errores[] = "Todos los campos son obligatorios.";
    }

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo inválido.";
    }

    if(empty($errores)) {
        $medico = new Medico($apellidos, $nombres, $especialidad, $fechaNacimiento, $correo, $password);
        $_SESSION['medicos'][] = $medico;
        $mensaje = "Médico registrado correctamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Médico</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Registrar Médico</h2>

    <?php
    foreach($errores as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    if(!empty($mensaje)) {
        echo "<p style='color:green;'>$mensaje</p>";
    }
    ?>

    <form method="POST">
        Apellidos: <input type="text" name="apellidos" value=""><br>
        Nombres: <input type="text" name="nombres" value=""><br>
        Especialidad: <input type="text" name="especialidad" value=""><br>
        Fecha de Nacimiento: <input type="date" name="fechaNacimiento" value=""><br>
        Correo: <input type="email" name="correo" value=""><br>
        Password: <input type="password" name="password" value=""><br>
        <input type="submit" value="Registrar">
    </form>

    <h3>Lista de Médicos Registrados</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especialidad</th>
            <th>Edad</th>
        </tr>
        <?php
        foreach($_SESSION['medicos'] as $med) {
            echo "<tr>
                    <td>".$med->getId()."</td>
                    <td>".$med->getNombres()." ".$med->getApellidos()."</td>
                    <td>".$med->getEspecialidad()."</td>
                    <td>".$med->calcularEdad()."</td>
                  </tr>";
        }
        ?>
    </table>
    <p><a href="login.php">Ir a Login</a></p>
</div>
</body>
</html>
