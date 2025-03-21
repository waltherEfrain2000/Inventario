<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../InventoryEntries/models/inventoryEntry.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$inventoryEntry = new InventoryEntry($pdo);

header('Content-Type: application/json');


$jsonData = file_get_contents("php://input");
$data = json_decode($jsonData, true);


if (!$data) {
    echo json_encode(["success" => false, "error" => "No se recibieron datos o el JSON es inválido.", "rawData" => $jsonData]);
    exit;
}



$UsuarioCreador = 1;
$AjusteInventario = 0;
$detalles = $data['detalles'];

if (!is_array($detalles) || count($detalles) === 0) {
    echo json_encode(["success" => false, "error" => "Debe agregar al menos un detalle.", "receivedDetails" => $detalles]);
    exit;
}


$result = $inventoryEntry->saveInventoryEntry($UsuarioCreador, $AjusteInventario, $detalles);

if ($result) {
    echo json_encode(["success" => true, "message" => "Ingreso de inventario guardado correctamente."]);
} else {
    echo json_encode(["success" => false, "error" => "No se pudo guardar el ingreso."]);
}
