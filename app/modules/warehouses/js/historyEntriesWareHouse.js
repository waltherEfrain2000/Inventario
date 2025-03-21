$(document).ready(function() {
    loadWarehouse(); // Cargar datos desde la API

    function loadWarehouse() {
        $.ajax({
            url: "/Inventario/app/modules/warehouses/controllers/list_HistoryEntries.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("Datos recibidos:", data);

                let tableBody = $("#table-body");
                tableBody.empty();

        
                $.each(data.data, function (index, bodega) {
                    tableBody.append(`
                        <tr>
                            <td>${bodega.NombreBodega}</td>
                            <td>${bodega.NombreArticulo}</td>
                            <td>${bodega.CantidadIngreso}</td>
                            <td>${bodega.FechaIngreso}</td>
                            <td class="text-center">
                                <span class="badge bg-success">Ingresado</span>
                            </td>
                        </tr>
                    `);
                });

            
                $("#tablaHistorial").DataTable({
                    destroy: true,
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'excelHtml5', text: 'Exportar a Excel' },
                        { extend: 'pdfHtml5', text: 'Exportar a PDF' }
                    ],
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"
                    }
                });
            },
            error: function() {
                alert("Error al cargar el historial de ingresos.");
            }
        });
    }
});