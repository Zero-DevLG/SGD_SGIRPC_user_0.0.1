



function showTDir() {
    //alert("Hello");
    table22 = $('#doc_dir').dataTable({
        "bAutoWidth": false,
        destroy: true,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        "ajax": "../helpers/funciones_dir/getDataDir.php",
        "columns": [{
                "data": "id_documento"
            },
            {
                "data": "folio"
            },
            {
                "data": "oficio"
            },
            {
                "data": "asunto"
            },
            {
                "data": "num"
            },
            {
                "data": "fecha_oficio"
            },
            {
                "data": "fecha_limite"
            },
            {
                "data": "remitente"
            },
            {
                "data": "estatus",
                "visible": false
            },
            {
                "data": "bis",
                "visible": false
            }

        ],

        rowCallback: function(row, data) {



            if (data['estatus'] == 6) {
                $($(row).find("td")[1]).css("color", "#000000");
                $($(row).find("td")[2]).css("color", "#000000");
                $($(row).find("td")[3]).css("color", "#000000");
                $($(row).find("td")[4]).css("color", "#000000");
                $($(row).find("td")[5]).css("color", "#000000");
                $($(row).find("td")[6]).css("color", "#000000");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#000000");
            }


            if (data['estatus'] == 303) {
                $($(row).find("td")[1]).css("color", "red");
                $($(row).find("td")[2]).css("color", "red");
                $($(row).find("td")[3]).css("color", "red");
                $($(row).find("td")[4]).css("color", "red");
                $($(row).find("td")[5]).css("color", "red");
                $($(row).find("td")[6]).css("color", "red");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "red");

            }
            if (data['bis'] == 1) {
                $($(row).find("td")[1]).css("color", "blue");
                $($(row).find("td")[2]).css("color", "blue");
                $($(row).find("td")[3]).css("color", "blue");
                $($(row).find("td")[4]).css("color", "blue");
                $($(row).find("td")[5]).css("color", "blue");
                $($(row).find("td")[6]).css("color", "blue");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "blue");

            }

            var fecha_limite = new Date(data['fecha_limite']);
            var fecha = new Date();

            if (fecha > fecha_limite && data['estatus'] == 2) {
                $($(row).find("td")[1]).css("color", "#e04914");
                $($(row).find("td")[2]).css("color", "#e04914");
                $($(row).find("td")[3]).css("color", "#e04914");
                $($(row).find("td")[4]).css("color", "#e04914");
                $($(row).find("td")[5]).css("color", "#e04914");
                $($(row).find("td")[6]).css("color", "#e04914");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#e04914");
            }

            doc_in = localStorage.getItem("id_doc");
            if (data['id_documento'] == doc_in) {
                $($(row).find("td")[1]).css("color", "white");
                $($(row).find("td")[2]).css("color", "white");
                $($(row).find("td")[3]).css("color", "white");
                $($(row).find("td")[4]).css("color", "white");
                $($(row).find("td")[5]).css("color", "white");
                $($(row).find("td")[6]).css("color", "white");
                $($(row).find("td")[7]).css("color", "white");
                $($(row).find("td")[0]).css("color", "white");
                $($(row).find("td")[0]).css("background-color", "#595a5a");
                $($(row).find("td")[1]).css("background-color", "#595a5a");
                $($(row).find("td")[2]).css("background-color", "#595a5a");
                $($(row).find("td")[3]).css("background-color", "#595a5a");
                $($(row).find("td")[4]).css("background-color", "#595a5a");
                $($(row).find("td")[5]).css("background-color", "#595a5a");
                $($(row).find("td")[6]).css("background-color", "#595a5a");
                $($(row).find("td")[7]).css("background-color", "#595a5a");

            }


        }

    });


    it_turn_t = setInterval(function() {
        table22.api().ajax.reload(function() {
            $(".paginate_button > a").on("focus", function() {
                $(this).blur();
            });
        }, false);
    }, 5000);
}

$(document).ready(()=>{
    showTDir();
});

