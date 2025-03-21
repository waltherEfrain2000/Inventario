<div class="container my-5">
    <h1 class="text-center text-primary mb-4">Gestión de Bodegas</h1>

    <!-- Botón para agregar nueva bodega -->
    <div class="mb-3 text-end">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addWarehouseModal">Agregar Bodega</button>
    </div>

    <!-- Tabla de Bodegas -->
    <table id="warehouseTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
              
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se llenarán los datos dinámicamente -->
            <tr>
                <td>1</td>
                <td>Bodega Central</td>
                <td>Ciudad Principal</td>
                <td>Estado</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editWarehouseModal">Editar</button>
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal para agregar bodega -->
<div class="modal fade" id="addWarehouseModal" tabindex="-1" aria-labelledby="addWarehouseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addWarehouseModalLabel">Agregar Nueva Bodega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addWarehouseForm">
                    <div class="mb-3">
                        <label for="warehouseName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="warehouseName" required>
                    </div>
                    <div class="mb-3">
                        <label for="warehouseLocation" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="warehouseLocation" required>
                    </div>

                    <div class="mb-3">
                        <label for="warehouseStatus" class="form-label">Estado</label>
                        <select class="form-select" id="warehouseStatus" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option> 
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar bodega -->
<div class="modal fade" id="editWarehouseModal" tabindex="-1" aria-labelledby="editWarehouseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editWarehouseModalLabel">Editar Bodega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editWarehouseForm">
                    <div class="mb-3">
                        <label for="editWarehouseName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editWarehouseName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editWarehouseLocation" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="editWarehouseLocation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Incluir DataTables y Bootstrap -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

