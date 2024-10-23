<?php
require_once __DIR__ . '/includes/functions.php';
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarVehiculo($_GET['id']);
    $mensaje = $count > 0 ? "Vehiculo eliminado con éxito." : "No se pudo eliminar el Vehiculo.";
}
$vehiculos = obtenerVehiculo();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Almacenamiento de Vehiculos</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="container">
       <center> <h1>Gestión Almacenamiento de Vehiculos</h1><br>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
        <h2>Lista de Vehiculos</h2><br><br>
    
     <center><table  class="vehiculo-table">
         <thead>
            <tr> 
                <th>Placa</th>
                <th>Dueño</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Accion</th>
            </tr>
        </thead></center>
        <tbody>
            <?php foreach ($vehiculos as $vehiculo): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vehiculo['placa']); ?></td>
                    <td><?php echo htmlspecialchars($vehiculo['dueño']); ?></td>
                    <td><?php echo htmlspecialchars($vehiculo['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($vehiculo['color']); ?></td>
                    <td><?php echo htmlspecialchars($vehiculo['marca']); ?></td>
                    <td class="actions">
                        <a href="edi_vehiculo.php?id=<?php echo $vehiculo['_id']; ?>" class="button">Editar</a>
                        <a href="index.php?accion=eliminar&id=<?php echo $vehiculo['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar este vehiculo?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table><br>
    <a href="agg_vehiculo.php" class="button">Agregar Nuevo Vehiculo</a>
    </div>
    </div></center>
</body>

</html>