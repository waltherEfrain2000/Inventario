<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../stock/models/product.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$productModel = new Product($pdo);

try {
    
    $products = $productModel->getProducts();
    echo json_encode(["success" => true, "data" => $products]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al guardar la categoría"]);
}