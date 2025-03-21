<!DOCTYPE html>
<html lang="es" style="height: auto;">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de control proyecto plan NESCAFE">

    <title>Inventario</title>

    <?php include "./layouts/header.php" ?>
                <body class="sidebar-mini layout-fixed">
            <?php include "./layouts/sidebar.php" ?>

                    <div class="container-fluid " id="panel">

            <?php include "./content.php" ?>
                    </div>
    <?php include "./scripts.php" ?>
                </body>
         
    
</head>


<?php include "./layouts/footer.php" ?>
</html>

