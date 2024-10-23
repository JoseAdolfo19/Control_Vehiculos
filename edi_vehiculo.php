<?php
require_once __DIR__ . '/includes/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$Vehiculo = obtenerVehiculoPorId($_GET['id']);

if (!$Vehiculo) {
    header("Location: index.php?mensaje = vehiculo no encontrada");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agg_vehiculo($_POST['placa'], $_POST['dueño'], $_POST['modelo'], $_POST['color'], $_POST['marca']);
    if($id){
        header("Location: index.php?mensaje = Vehiculo actualizado con exito");
        exit;
    }else{
        $error = "No se pudo actualizado al vehiculo";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehiculo </title><br>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Vehiculo</h1>
        <?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>
<form method="POST"><br><br>
    <label>Placa: <input type="text" name="placa"  value="<?php echo htmlspecialchars($Vehiculo['placa']); ?>" required></label><br><br>
    <label>Dueño: <input type="text" name="dueño" value="<?php echo htmlspecialchars($Vehiculo['dueño']); ?>" required></label><br><br>
    <label>Modelo: <input type="text" name="modelo" value="<?php echo htmlspecialchars($Vehiculo['modelo']); ?>" required></label><br><br>
    <label>Color: <input type="text" name="color" value="<?php echo htmlspecialchars($Vehiculo['color']); ?>" required></label><br><br>
    <label>Marca: <input type="text" name="marca" value="<?php echo htmlspecialchars($Vehiculo['marca']); ?>" required></label><br><br>
    <input type="submit" value="Actualizar Vehiulo"><br><br>
</form>
<a href="index.php" class="button">Volver a la lista de vehiculos</a>
</div>
</body>
</html>
