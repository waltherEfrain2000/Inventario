<div class="pc-container">
    <div class="pc-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Gestión de Artículos</h5>
                </div>
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="articulo-tab" data-bs-toggle="tab" href="#articulos" role="tab" 
                            aria-controls="articulos" aria-selected="true">Artículos</a>
                        </li>
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Tab Artículos -->
                        <div class="tab-pane fade show active" id="articulos" role="tabpanel" aria-labelledby="articulo-tab">
                            <div class="col-md-12 form-group d-flex align-items-end justify-content-end pt-4">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalArticulo">Agregar Artículo</button>
                            </div>
                            <div class="card-body">
                                <div class="dt-responsive table-responsive">
                                    <table id="table-articulos" class="table table-striped table-hover table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Nombre Artículo</th>
                                                <th>Descripción</th>
                                                <th>Proveedor</th>
                                                <th>Cantidad Inicial</th>
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre Artículo</th>
                                                <th>Descripción</th>
                                                <th>Proveedor</th>
                                                <th>Cantidad Inicial</th>
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar/editar artículo -->
    <div class="modal fade" id="modalArticulo" tabindex="-1" aria-labelledby="modalArticuloLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalArticuloLabel">Administración de Artículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formArticulo">
                    <input type="hidden" id="articulo_id" name="id">

                    <div class="row">
                        <div class="col-md-4 col-12 mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select" id="categoria" required></select>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="subcategoria" class="form-label">Subcategoría</label>
                            <select class="form-select" id="subcategoria" required></select>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="proveedorArticulo" class="form-label">Proveedor</label>
                            <select class="form-select" id="proveedorArticulo" required></select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-12 mb-3">
                            <label for="nombreArticulo" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreArticulo" required>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="descripcionArticulo" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcionArticulo" required>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="cantidadInicialArticulo" class="form-label">Cantidad Inicial</label>
                            <input type="number" class="form-control" id="cantidadInicialArticulo" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-12 mb-3">
                            <label for="precioCompraArticulo" class="form-label">Precio Compra</label>
                            <input type="number" class="form-control" id="precioCompraArticulo" required>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="precioVentaArticulo" class="form-label">Precio Venta</label>
                            <input type="number" class="form-control" id="precioVentaArticulo" required>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="estadoArticulo" class="form-label">Estado</label>
                            <select class="form-select" id="estadoArticulo" required>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
