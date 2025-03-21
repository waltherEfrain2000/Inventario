let productos = [];
let bodegas = [];

$(document).ready(function() {
    $("#table-IngresoInventario").DataTable();
    cargarProductos();
    cargarBodegas();
    listEntries();
    $('#formIngreso').submit(function(event) {
    event.preventDefault();
    let id = $("#articulo_id").val();
    id ? update_Article(id) : save_ProductEntry(); 
});
    $('#agregarLinea').click(function() {
        let productoOptions = productos.map(p => `<option value="${p.id}">${p.NombreArticulo}</option>`).join('');
        let bodegaOptions = bodegas.map(b => `<option value="${b.id}">${b.NombreBodega}</option>`).join('');
        
        let nuevaFila = `
            <tr>
                <td>
                    <select class="form-select" name="articulo[]" required>
                        ${productoOptions}
                    </select>
                </td>
                <td>
                    <select class="form-select" name="bodega[]" required>
                        ${bodegaOptions}
                    </select>
                </td>
                <td><input type="number" class="form-control" name="cantidad[]" required></td>
                <td><button type="button" class="btn btn-danger btn-sm eliminar">Eliminar</button></td>
            </tr>`;
        $('#detalleIngreso tbody').append(nuevaFila);
    });

    $(document).on('click', '.eliminar', function() {
        $(this).closest('tr').remove();
    });
});



function listEntries() {
if ($.fn.DataTable.isDataTable("#table-IngresoInventario")) {
    $("#table-IngresoInventario").DataTable().destroy();
}

let tableBody = $("#table-IngresoInventario tbody");
tableBody.empty();

$.ajax({
    url: "/Inventario/app/modules/InventoryEntries/controllers/list_inventoryEntry.php",
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (!response.success) {
            console.error("Error al obtener los ingresos:", response.error);
            return;
        }

        let data = response.data;

        $.each(data, function (index, ingreso) {
            tableBody.append(`
                <tr>
                    <td>${ingreso.Id}</td>
                    <td class="text-center">
                        <span class="badge ${ingreso.Estado == 1 ? 'bg-success' : 'bg-danger'}">
                            ${ingreso.Estado == 1 ? 'Activo' : 'Inactivo'}
                        </span>
                    </td>
                    <td>${ingreso.UsuarioCreador}</td>
                    <td>${ingreso.FechaCreacion}</td>
                    <td>${ingreso.AjusteInventario ? 'Sí' : 'No'}</td>
                    <td class="text-center">
                        <button class="btn btn-warning btn-sm edit-btn" data-id="${ingreso.id}">
                            <i class="fas fa-edit">Editar</i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${ingreso.id}">
                            <i class="fas fa-trash">Eliminar</i>
                        </button>
                    </td>
                </tr>
            `);
        });

        $("#table-IngresoInventario").DataTable();

        $("#table-IngresoInventario").on("click", ".edit-btn", function () {
            let id = $(this).data("Id");
            loadEntryForEdit(id);
        });

        $("#table-IngresoInventario").on("click", ".delete-btn", function () {
            let id = $(this).data("Id");
            handleDeleteEntry(id);
        });
    },
    error: function (xhr, status, error) {
        console.error("Error al cargar los ingresos:", error);
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al cargar los ingresos.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    }
});


}
function cargarProductos() {
    $.ajax({
    url: "/Inventario/app/modules/InventoryEntries/controllers/list_ActiveArticles.php" ,
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (!response.success) {
            console.error("Error al obtener los proveedores:", response.error);
            return;
        }
        productos = response.data;
    },
    error: function () {
        alert("Error al cargar los proveedores.");
    }
});
}

function cargarBodegas() {
    $.ajax({
    url: "/Inventario/app/modules/InventoryEntries/controllers/list_ActiveWarehouses.php" ,
    type: "GET",
    dataType: "json",
    success: function (response) {
        if (!response.success) {
            console.error("Error al obtener los proveedores:", response.error);
            return;
        }

        bodegas = response.data;

    },
    error: function () {
        alert("Error al cargar los proveedores.");
    }
});
}



function save_ProductEntry() {
    $('#modalIngreso').modal('hide');
    $('.modal-backdrop').remove();
let detalles = [];

$('#detalleIngreso tbody tr').each(function() {
    let articulo = $(this).find('[name="articulo[]"]').val();
    let bodega = $(this).find('[name="bodega[]"]').val();
    let cantidad = $(this).find('[name="cantidad[]"]').val();
    
    if (articulo && bodega && cantidad) {
        detalles.push({
            idArticulo: articulo,
            idBodega: bodega,
            cantidad: cantidad
        });
    }
});


let data = {
    detalles: detalles
};
// Verificar que haya al menos un detalle
if (detalles.length === 0) {
    Swal.fire("Error", "Debe agregar al menos un artículo.", "error");
    return;
}
$.ajax({
    url: '/Inventario/app/modules/InventoryEntries/controllers/save_inventoryEntry.php',
    type: 'POST',
    data: JSON.stringify(data),
    dataType: "json",
    success: function (response) {
        $("#formIngreso")[0].reset();
        if (response.success) {
            Swal.fire({
                title: 'Ingreso guardada',
                text: 'El Ingreso ha sido guardada correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                $("#modalIngreso").modal("hide");
                listEntries();
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: response.error || 'No se pudo guardar el Ingreso.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    },
    error: function () {
        Swal.fire({
            title: 'Error',
            text: 'Hubo un problema al guardar el Ingreso.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    }
});
}