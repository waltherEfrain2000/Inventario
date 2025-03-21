<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../InventoryEntries/models/inventoryEntry.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$inventoryEntry = new InventoryEntry($pdo);

try {
    
    $bodegas = $inventoryEntry->getActiveWarehouses();
    echo json_encode(["success" => true, "data" => $bodegas]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al listar las bodegas"]);
}