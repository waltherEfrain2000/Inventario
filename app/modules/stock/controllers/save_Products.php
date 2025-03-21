<?php
require_once __DIR__ . '/../../../../config/database.php';
require_once __DIR__ . '/../../stock/models/product.php';

$pdo = require __DIR__ . '/../../../../config/database.php';
// Instanciar el modelo de producto
$productModel = new Product($pdo);

// Manejar la solicitud de inserción de artículo
try {
    // Verificar si los datos necesarios han sido enviados en la solicitud
    if (isset( $_POST['NombreArticulo'], $_POST['DescripcionArticulo'])) {
        
        // Obtener los datos enviados por POST
       // $idSubCategoria = $_POST['idSubCategoria'];
        $idSubCategoria =$_POST['idSubCategoria'];
//        $UsuarioCreador = $_POST['UsuarioCreador'];
        $NombreArticulo = $_POST['NombreArticulo'];
        $DescripcionArticulo = $_POST['DescripcionArticulo'];
        $Estado = $_POST['Estado'];
        $ProveedorID = $_POST['ProveedorID'];
        $CantidadInicial = $_POST['CantidadInicial'];
        $PrecioCompra = $_POST['PrecioCompra'];
        $PrecioVenta = $_POST['PrecioVenta'];

        // Llamar a la función saveArticle del modelo
        $result = $productModel->saveArticle($idSubCategoria, 1, $NombreArticulo, $DescripcionArticulo, $Estado, $ProveedorID, $CantidadInicial, $PrecioCompra, $PrecioVenta);

        // Verificar si la inserción fue exitosa
        if ($result) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "No se pudo guardar el artículo."]);
        }
    } else {
        // Si falta algún parámetro necesario
        echo json_encode(["success" => false, "error" => "Faltan parámetros para guardar el artículo."]);
    }
} catch (\Throwable $th) {
    // Manejo de excepciones
    echo json_encode(["success" => false, "error" => "Error al guardar el artículo: " . $th->getMessage()]);
}
