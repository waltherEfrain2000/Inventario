
<script>
$('[data-mask]').inputmask();
$(function() {

    $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>


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
  } 
}
