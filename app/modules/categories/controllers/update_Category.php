<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../categories/models/category.php';


session_start(); // Iniciar la sesión para acceder a los datos del usuario

$pdo = require __DIR__ . '/../../../../config/database.php';
$categoryModel = new Category($pdo);

try {

    $id = $_POST['id'];
    $categoriaNombre = $_POST['categoriaNombre'];
    $categoriaDescripcion = $_POST['categoriaDescripcion'];

      if (!isset($categoriaDescripcion, $categoriaNombre, $id)) {
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
    $resultado = $categoryModel->updateCategory($categoriaNombre, $categoriaDescripcion, 1, $id);

    if ($resultado) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Error al guardar la categoría"]);
    }
} catch (\Throwable $th) {
    echo json_encode(["success" => false, "error" => "Error al guardar la categoría"]);
}