<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ingresos</title>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        .container {
            max-width: 90%;
            margin: 20px auto;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .text-center {
            text-align: center;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }
        .bg-success { background-color: #28a745; color: white; }
        .bg-danger { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2>Historial de Ingresos a Bodegas</h2>
    <table id="tablaHistorial" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Bodega</th>
                <th>Artículo</th>
                <th>Cantidad</th>
                <th>Fecha Ingreso</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody id="table-body"></tbody> 
    </table>
</div>



</body>
</html>
