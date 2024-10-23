<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agg_vehiculo($_POST['placa'], $_POST['dueño'], $_POST['modelo'], $_POST['color'], $_POST['marca']);
    if ($id) {
        header("Location: index.php?mensaje=Vehiculo añadido con éxito");
        exit;
    } else {
        $error = "No se pudo añadir el vehículo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Vehículo</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Vehículo</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST"><br><br>
            <label>Placa: <input type="text" name="placa" required></label><br><br>
            <label>Dueño: <input type="text" name="dueño" required></label><br><br>
            <label>Modelo: <input type="text" name="modelo" required></label><br><br>
            <label>Color: <input type="text" name="color" required></label><br><br>
            <label>Marca: <input type="text" name="marca" required></label><br><br>
            <input type="submit" value="Agregar Nuevo Vehículo"><br><br>
        </form>

        <a href="index.php" class="button">Volver a la lista de vehículos</a>
    </div>
</body>
</html>
