<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../warehouses/models/warehouse.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$warehouseModel = new Warehouse($pdo);



try {
    session_start(); // Iniciar la sesión para acceder a los datos del usuario



    $NombreBodega = $_POST['NombreBodega'];
    $DescripcionBodega = $_POST['DescripcionBodega'];
    $Estado = $_POST['Estado'];

      if (!isset($NombreBodega, $DescripcionBodega)) {
        echo json_encode(["success" => false, "error" => "Datos incompletos"]);
        exit;
    }
    // Obtener el usuario de la sesión
    // if (!isset($_SESSION['usuario_id'])) {
    //     echo json_encode(["success" => false, "error" => "Usuario no autenticado"]);
    //     exit;
    // }

    //$usuario_id = intval($_SESSION['usuario_id']); // Obtener el usuario_id de la sesión

    // Guardar la categoría
    $resultado = $warehouseModel->saveWarehouse($NombreBodega, $DescripcionBodega,$Estado, 1);

    if ($resultado) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Error al guardar la bodega"]);
    }
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al guardar la bodega"]);
}