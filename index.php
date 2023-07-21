<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
    <div class="panel">
        <button id="consumirPHP">Consumir Servicio PHP</button>
        <!-- <div id="resultado"></div> -->

        <table class="default" id="tabladefault">
            <thead style="text-align: center;">
                <tr>
                    <th>Tipo</th>
                    <th>Color</th>
                    <th>Tamaño</th>
                </tr>
            </thead>
            <tbody id="respuesta">
                <tr>
                    <td colspan="3" style="text-align: center;">Sin registros</td>
              </tr>
            </tbody>
        </table>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        function getDatos() {
            $.ajax({
                type: "GET",
                url: "archivoApi.php",
                dataType: "json",
                success: function (response) {
                    var resultado = response.listaobjetos;

                    $('#tabladefault > tbody').empty();

                    resultado.forEach(function(result, index) {
                        $("#tabladefault>tbody").append("<tr><td>"+result.tipo+"</td><td>"+result.color+"</td><td>"+result.tamanio+"</td></tr>");
                    });

                    // console.log(resultado);
                },
                error: function (error) {
                    console.error("Error:", error);
                }
            });
        }

        $("#consumirPHP").on("click", function() {
            getDatos();
        });
    </script>
</html>
