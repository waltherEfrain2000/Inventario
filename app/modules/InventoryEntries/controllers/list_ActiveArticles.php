<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../InventoryEntries/models/inventoryEntry.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$inventoryEntry = new InventoryEntry($pdo);

try {
    
    $articles = $inventoryEntry->getActiveArticles();
    echo json_encode(["success" => true, "data" => $articles]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al listar los articulos"]);
}