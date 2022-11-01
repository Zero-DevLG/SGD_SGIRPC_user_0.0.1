<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}

include("../Model/navBar.php");
$bar = new navBaradmin();
$bar->construye();
require '../Controller/equipo_controlador.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/main.css">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <style>
    * {
        margin: 0;
        padding: 0
    }

    #table1 {
        position: relative;
        left: 150px;
        top: 40px;
        width: 80%;
    }

    th {
        width: 10%;
        overflow-wrap: break-word;
        font-size: 70%;
    }

    td {

        overflow-wrap: break-word;
        font-size: 70%;
    }

    #titulo1 {
        color: aliceblue;
        font-family: monospace;
        position: relative;
        left: 430px;
        top: -40px;
    }

    #agregar {
        position: relative;
        left: 175px;
        top: 20px;
    }
    </style>


</head>

<body background="../img/fondo.png">

    <div id="sidebar">
        <div class="toggle-btn">
            <span>&#9776</span>

        </div>
        <ul>
            <li><a style="color:#fff;" href="inventario.php">Areas</a></li>
            <li><a style="color:#fff;" href="admin_instrucciones.php">Instrucciones</a></li>

        </ul>



    </div>

    <script>
    $(document).ready(function() {
        $('#entradafilter').keyup(function() {
            var rex = new RegExp($(this).val(), 'i');
            $('.contenidobusqueda tr').hide();
            $('.contenidobusqueda tr').filter(function() {
                return rex.test($(this).text());
            }).show();

        })

    });
    </script>


    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Direccion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="txtID" value="<?php echo $txtID; ?>" id="txtID" required="">


                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="">Nombre de la direccion:</label>
                                    <input class="form-control" type="text" name="txtdireccion"
                                        value="<?php echo "$txtdireccion"; ?>" id>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Nombre del titular:</label>
                                    <input class="form-control" type="text" name="txttitular"
                                        value="<?php echo $txttitular; ?>" id="txttitular" required="">
                                    <br>
                                </div>





                            </div>







                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-sm" value="btnAgregar" <?php echo $accionAgregar; ?>
                                type="submit" name="accion">Agregar</button>
                            <button class="btn btn-warning btn-sm" value="btnModificar" <?php echo $accionModificar; ?>
                                type="submit" name="accion">Editar</button>
                            <button class="btn btn-danger btn-sm" value="btnEliminar"
                                onclick="return Confirmar('Realmente deseas borrar el registro');"
                                <?php echo $accionEliminar; ?> type="submit" name="accion">Eliminar</button>
                            <button class="btn btn-secondary btn-sm" value="btnCancelar" <?php echo $accionCancelar; ?>
                                type="submit" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Button trigger modal -->
            <button id="agregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar registro +
            </button>
            <br>
            <br>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-4">
                        <div id="titulo1">
                            <input placeholder="Buscar..." id="entradafilter" class="form-control" name="palabra_clave">
                        </div>
                    </div>
                </div>
            </div>




        </form>

        <table id="table1" class="table table-light table-hover  table-bordered">
            <thead class="thead-dark">

                <tr>

                    <th>Direccion</th>
                    <th>Titular de la direccion</th>
                    <th>Accion</th>


                </tr>
            </thead>
            <tbody class="contenidobusqueda">
                <?php foreach ($listaEmpleados as $empleado) { ?>
                <tr>

                    <td><?php echo $empleado['direccion']; ?></td>
                    <td><?php echo $empleado['titular']; ?></td>


                    <td>

                        <form action="" method="post">

                            <input type="hidden" name="txtID" value="<?php echo $empleado['id_direccion']; ?>">
                            <input type="hidden" name="txtdireccion" value="<?php echo $empleado['direccion']; ?>">
                            <input type="hidden" name="txttitular" value="<?php echo $empleado['titular']; ?>">




                            <input type="submit" style="width :auto; heigth :auto" class="btn btn-info btn-sm"
                                value="seleccionar" name="accion">
                            <br>
                            <br>
                            <button class="btn btn-danger btn-sm" value="btnEliminar"
                                onclick="return Confirmar('Realmente deseas borrar el registro');" type="submit"
                                name="accion">Eliminar</button>

                        </form>



                    </td>
                </tr>



                <?php } ?>
            </tbody>
        </table>
        <br>
        <br>
        <p>Hola</p>
    </div>
    <?php if ($mostrarModal == "true") { ?>
    <script>
    $('#exampleModal').modal('show');
    </script>
    <?php } ?>
    <script>
    function Confirmar(Mensaje) {
        return (confirm(Mensaje)) ? true : false;
    }
    </script>

    <script>
    const btnToggle = document.querySelector('.toggle-btn');
    btnToggle.addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
    });
    </script>


</body>




</html>