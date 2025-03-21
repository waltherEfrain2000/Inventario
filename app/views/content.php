<?php
    if (empty($_GET['module'])) {
        include "./ejemplo2.php";
    } else {
        /*
         * Módulo     : Generalidades
         * Descripción: Rutas de control de opciones generales del módulo
         * Ref         : Carpeta home/views
         */

        $_GET['module'] == 'warehouseControl' ? include __DIR__ . "/../modules/warehouses/views/warehouseControl.php" : false;
        $_GET['module'] == 'categories' ? include __DIR__ . "/../modules/categories/views/category.php" : false;
        $_GET['module'] == 'home' ? include "./ejemplo2.php" : false;
        //$_GET['module'] == 'example'  ? include "./app/views/ejemplo2.php" : false;
    }
?>