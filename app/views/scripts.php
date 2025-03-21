
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<?php
if (!empty($_GET['module'])) {


  /*
     *  Módulo      : Warehouses / bodegas
     *  Descripción : funciones js para manejo de eventos y operaciones de bodega
     *  Ref         : /modules/warehouses
     */
  if ($_GET['module'] == 'warehouseControl') {
    echo '<script src="/inventario/app/modules/warehouses/js/warehouseControl.js"></script>';
  } else if ($_GET['module'] == 'categories') {
    echo '<script src="/inventario/app/modules/categories/js/category.js"></script>';
  } else if ($_GET['module'] == 'products') {
    echo '<script src="/inventario/app/modules/stock/js/products.js"></script>';
  } else if ($_GET['module'] == 'entries') {
    echo '<script src="/inventario/app/modules/InventoryEntries/js/inventoryEntry.js"></script>';
  } else if ($_GET['module'] == 'history') {
    echo '<script src="/inventario/app/modules/warehouses/js/historyEntriesWareHouse.js"></script>';
  } 
}
