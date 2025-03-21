<div class="pc-container">
    <div class="pc-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Ingreso de Inventario</h5>
                </div>
                <div class="card-body">
                <div class="col-md-12 form-group d-flex align-items-end justify-content-end pt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalIngreso">Nuevo Ingreso</button>
                </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover table-bordered nowrap" id="table-IngresoInventario">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Estado</th>
                                    <th>Usuario Creador</th>
                                    <th>Fecha Creación</th>
                                    <th>Ajuste Inventario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para nuevo ingreso de inventario -->
    <div class="modal fade" id="modalIngreso" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Ingreso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formIngreso">
                    

                        <h5>Detalle de Ingreso</h5>
                        <table class="table table-bordered" id="detalleIngreso">
                            <thead>
                                <tr>
                                    <th>Artículo</th>
                                    <th>Bodega</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-success" id="agregarLinea">Agregar Línea</button>

                        <div class="mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

