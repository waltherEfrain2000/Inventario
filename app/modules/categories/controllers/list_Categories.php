<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../categories/models/category.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
$categoryModel = new Category($pdo);

try {
    
    $categories = $categoryModel->getCategories();
    echo json_encode(["success" => true, "data" => $categories]);
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al listar la categoría"]);
}