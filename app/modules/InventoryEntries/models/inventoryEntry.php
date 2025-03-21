<?php
class InventoryEntry
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getinventoryEntry()
    {
        try {
            $sql = "SELECT * FROM inventario_IngresoInventario WHERE Estado = 1 ORDER BY FechaCreacion DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener las Articulos: " . $e->getMessage());
        }
    }

    public function getActiveArticles()
    {
        try {
            $sql = "SELECT * FROM inventario_Articulos WHERE Estado = 1 ORDER BY NombreArticulo";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener las Articulos: " . $e->getMessage());
        }
    }

    public function getActiveWarehouses()
    {
        try {
            $sql = "SELECT * FROM inventario_Bodegas WHERE Estado = 1 ";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener las Articulos: " . $e->getMessage());
        }
    }



    public function saveInventoryEntry($UsuarioCreador, $AjusteInventario, $detalles)
    {
        try {
            // Iniciar una transacción
            $this->pdo->beginTransaction();
    
            // Insertar el ingreso en la tabla padre
            $sqlIngreso = "INSERT INTO inventario_IngresoInventario (
                                Estado, UsuarioCreador, AjusteInventario, FechaCreacion
                            ) VALUES (
                                1, :UsuarioCreador, :AjusteInventario, NOW()
                            )";
    
            $stmtIngreso = $this->pdo->prepare($sqlIngreso);
            $stmtIngreso->bindParam(':UsuarioCreador', $UsuarioCreador, PDO::PARAM_INT);
            $stmtIngreso->bindParam(':AjusteInventario', $AjusteInventario, PDO::PARAM_BOOL);
            $stmtIngreso->execute();
    
            // Obtener el ID del ingreso recién insertado
            $idIngreso = $this->pdo->lastInsertId();
    
            // Insertar detalles del ingreso
            $sqlDetalle = "INSERT INTO inventario_IngresoDetalle (
                                idIngreso, idBodega, idArticulo, CantidadIngreso, Estado, UsuarioCreador, FechaCreacion
                            ) VALUES (
                                :idIngreso, :idBodega, :idArticulo, :CantidadIngreso, 1, :UsuarioCreador, NOW()
                            )";
    
            $stmtDetalle = $this->pdo->prepare($sqlDetalle);
    
            foreach ($detalles as $detalle) {
                $stmtDetalle->bindParam(':idIngreso', $idIngreso, PDO::PARAM_INT);
                $stmtDetalle->bindParam(':idBodega', $detalle['idBodega'], PDO::PARAM_INT);
                $stmtDetalle->bindParam(':idArticulo', $detalle['idArticulo'], PDO::PARAM_INT);
                $stmtDetalle->bindParam(':CantidadIngreso', $detalle['cantidad'], PDO::PARAM_STR);
                $stmtDetalle->bindParam(':UsuarioCreador', $UsuarioCreador, PDO::PARAM_INT);
                $stmtDetalle->execute();
            }
    
            // Confirmar la transacción
            $this->pdo->commit();
            return true;
    
        } catch (PDOException $e) {
            // Si hay error, revertir la transacción
            $this->pdo->rollBack();
            die("Error al guardar el ingreso: " . $e->getMessage());
        }
    }
    
}