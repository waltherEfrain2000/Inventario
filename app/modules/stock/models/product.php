<?php
class Product
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function getProducts()
    {
        try {
            $sql = "SELECT * FROM inventario_Articulos ORDER BY NombreArticulo";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener las Articulos: " . $e->getMessage());
        }
    }

    public function getProductById($id)
    {
        try {
            $sql = "SELECT * FROM inventario_Articulos WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener la categoría: " . $e->getMessage());
        }
    }


    public function getProviders()
    {
        try {
            $sql = "SELECT * FROM inventario_Proveedores";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener las Articulos: " . $e->getMessage());
        }
    }

    public function deleteProduct($id)
    {
        try {
            $sql = "UPDATE inventario_Articulos SET Estado = 0 WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            return ["success" => false, "error" => "Error al actualizar el estado de la categoría: " . $e->getMessage()];
        }
    }


    public function saveArticle($idSubCategoria, $UsuarioCreador,
     $NombreArticulo, $DescripcionArticulo, $Estado, $ProveedorID, 
     $CantidadInicial, $PrecioCompra, $PrecioVenta)
{
    try {
        // Consulta SQL para insertar el artículo
        $sql = "INSERT INTO inventario_Articulos (
                    idSubCategoria,
                    UsuarioCreador,
                    NombreArticulo,
                    DescripcionArticulo,
                    Estado,
                    ProveedorID,
                    CantidadInicial,
                    PrecioCompra,
                    PrecioVenta,
                    FechaCreacion
                ) VALUES (
                    :idSubCategoria,
                    :UsuarioCreador,
                    :NombreArticulo,
                    :DescripcionArticulo,
                    :Estado,
                    :ProveedorID,
                    :CantidadInicial,
                    :PrecioCompra,
                    :PrecioVenta,
                    NOW()
                )";

        // Preparar la sentencia SQL
        $stmt = $this->pdo->prepare($sql);

        // Vincular los parámetros a la consulta
        $stmt->bindParam(':idSubCategoria', $idSubCategoria, PDO::PARAM_INT);
        $stmt->bindParam(':UsuarioCreador', $UsuarioCreador, PDO::PARAM_INT); // Asumiendo que el usuario es un número (ID de usuario)
        $stmt->bindParam(':NombreArticulo', $NombreArticulo, PDO::PARAM_STR);
        $stmt->bindParam(':DescripcionArticulo', $DescripcionArticulo, PDO::PARAM_STR);
        $stmt->bindParam(':Estado', $Estado, PDO::PARAM_INT); // 1 para activo, 0 para inactivo
        $stmt->bindParam(':ProveedorID', $ProveedorID, PDO::PARAM_INT);
        $stmt->bindParam(':CantidadInicial', $CantidadInicial, PDO::PARAM_INT);
        $stmt->bindParam(':PrecioCompra', $PrecioCompra, PDO::PARAM_STR);
        $stmt->bindParam(':PrecioVenta', $PrecioVenta, PDO::PARAM_STR);

        // Ejecutar la consulta
        return $stmt->execute();

    } catch (PDOException $e) {
        // En caso de error, se lanza una excepción con el mensaje
        die("Error al guardar el artículo: " . $e->getMessage());
    }
}


public function updateArticle( $idSubCategoria, $NombreArticulo, 
    $DescripcionArticulo, $Estado, $ProveedorID, 
    $CantidadInicial, $PrecioCompra, $PrecioVenta, $id)
{
    try {
        // Consulta SQL para actualizar el artículo
        $sql = "UPDATE inventario_Articulos SET 
                    idSubCategoria = :idSubCategoria,
                    NombreArticulo = :NombreArticulo,
                    DescripcionArticulo = :DescripcionArticulo,
                    Estado = :Estado,
                    ProveedorID = :ProveedorID,
                    CantidadInicial = :CantidadInicial,
                    PrecioCompra = :PrecioCompra,
                    PrecioVenta = :PrecioVenta,
                    FechaModificacion = NOW()
                WHERE id = :id";

        // Preparar la sentencia SQL
        $stmt = $this->pdo->prepare($sql);

        // Vincular los parámetros a la consulta
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':idSubCategoria', $idSubCategoria, PDO::PARAM_INT);
        $stmt->bindParam(':NombreArticulo', $NombreArticulo, PDO::PARAM_STR);
        $stmt->bindParam(':DescripcionArticulo', $DescripcionArticulo, PDO::PARAM_STR);
        $stmt->bindParam(':Estado', $Estado, PDO::PARAM_INT);
        $stmt->bindParam(':ProveedorID', $ProveedorID, PDO::PARAM_INT);
        $stmt->bindParam(':CantidadInicial', $CantidadInicial, PDO::PARAM_INT);
        $stmt->bindParam(':PrecioCompra', $PrecioCompra, PDO::PARAM_STR);
        $stmt->bindParam(':PrecioVenta', $PrecioVenta, PDO::PARAM_STR);

        // Ejecutar la consulta
        return $stmt->execute();

    } catch (PDOException $e) {
        die("Error al actualizar el artículo: " . $e->getMessage());
    }
}



}