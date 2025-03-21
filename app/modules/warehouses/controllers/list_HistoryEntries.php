<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../warehouses/models/warehouse.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$warehouseModel = new Warehouse($pdo);

try {
    
    $warehouses = $warehouseModel->getEntriesWarehouses();
    echo json_encode(["success" => true, "data" => $warehouses]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al listar el historial de ingreso de bodegas"]);
}