<?php
session_start();

if(!isset($_SESSION['medico_activo'])) {
    header("Location: login.php");
    exit;
}

$nombre = $_SESSION['medico_activo'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bienvenida</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Bienvenido, <?php echo $nombre; ?>!</h2>
    <p>Has iniciado sesión correctamente.</p>
    <img src="https://2.bp.blogspot.com/-VcLJyZtzzms/XDuhHLaA_ZI/AAAAAAAAHrQ/p4vI0qOLEc8axZrUIZaFlOZCiNHlWk1cwCK4BGAYYCw/s800/memes-de-bienvenida-al-grupo-leonardo-dicaprio.jpg" 
     alt="bienvenido" 
     width="450" 
     height="300">
    <form action="logout.php" method="POST">
        <input type="submit" value="Cerrar Sesión">
    </form>
</div>
</body>
</html>
