<?php
session_start();

if(!isset($_SESSION['medicos']) || empty($_SESSION['medicos'])) {
    echo "<p>No hay médicos registrados.</p>";
    exit;
}

function calcularEdad($fechaNacimiento) {
    $fecha = new DateTime($fechaNacimiento);
    $hoy = new DateTime();
    return $hoy->diff($fecha)->y;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Médicos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Médicos Registrados</h2>
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
                    <td>".$med['id']."</td>
                    <td>".$med['nombres']." ".$med['apellidos']."</td>
                    <td>".$med['especialidad']."</td>
                    <td>".calcularEdad($med['fechaNacimiento'])."</td>
                  </tr>";
        }
        ?>
    </table>
    <p><a href="registro.php">Volver a Registro</a></p>
</div>
</body>
</html>
