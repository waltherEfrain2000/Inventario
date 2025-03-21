<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../InventoryEntries/models/inventoryEntry.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$inventoryEntry = new InventoryEntry($pdo);

try {
    
    $entries = $inventoryEntry->getinventoryEntry();
    echo json_encode(["success" => true, "data" => $entries]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al listar los articulos"]);
}