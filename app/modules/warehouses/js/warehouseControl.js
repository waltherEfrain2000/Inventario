document.addEventListener('DOMContentLoaded', function () {
        // Inicializar DataTable
        $('#warehouseTable').DataTable({
            bSortable: false,
            ordering: true,
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo:
                  "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                  sFirst: "Primero",
                  sLast: "Último",
                  sNext: "Siguiente",
                  sPrevious: "Anterior",
                },
                oAria: {
                  sSortAscending:
                    ": Activar para ordenar la columna de manera ascendente",
                  sSortDescending:
                    ": Activar para ordenar la columna de manera descendente",
                },
              },
        });

        // Manejar el formulario de agregar bodega
        document.getElementById('addWarehouseForm').addEventListener('submit', function (e) {
            e.preventDefault();
            // Aquí puedes agregar la lógica para guardar la nueva bodega
            alert('Nueva bodega agregada');
            $('#addWarehouseModal').modal('hide');
        });

        // Manejar el formulario de editar bodega
        document.getElementById('editWarehouseForm').addEventListener('submit', function (e) {
            e.preventDefault();
            // Aquí puedes agregar la lógica para guardar los cambios de la bodega
            alert('Bodega editada');
            $('#editWarehouseModal').modal('hide');
        });
    });



    function cargarTabla(tableID, data, columns) {
        $(tableID).dataTable().fnClearTable();
        $(tableID).dataTable().fnDestroy();
        var params = {
          aaData: data,
          aoColumns: columns,
          bSortable: false,
          ordering: false,
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior",
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
            },
          },
        };
      
        $(tableID).DataTable(params);
      }