<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] == "") {
    header("location:../Controller/cerrar_sesion.php");
}
?>

<head>
    <meta charset="utf-8">
    <title>Documentos</title>

    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- 
    RTL version
-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/vista_documento.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/usr_bar.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/toastr.min.css">
    <link rel="icon" href="../img/iconos/favicon.jpg" />
    <link rel="stylesheet" href="../css/dropzone.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/navi.js"></script>
    <script src="../js/tables.js"></script>
    <script src="../js/control_tables.js"></script>
    <script src="../js/doc.js"></script>
    <script src="../js/vd.js"></script>
    <script src="../js/vdas.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--<script src="../js/space.js"></script>-->
    <script src="../js/toastr.min.js"></script>
    <!--<script src="../js/notify.js"></script>-->
    <script src="../js/dropzone.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>




</head>

<body background="../img/fondo_p2.jpg">


    <?php
    include("../Model/navi.php");
    include("../Model/Consultas.php");
    //include("../View/side_var_user.php");

    ?>

    <div class="container-fluid">
        <div class="row align-content-lg-end">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>

        </div>
    </div>





    <div id="contenido_dinamico">
        <div id="iframeI" style="overflow-y: auto;">
            <div id="cab_doc">
                <img id="banner_cd" src="../img/banners/banner_cd.jpg" alt="">
            </div>
            <div id="contenido">
                <ul class='nav nav-tabs' id="tabs_documentos">

                    <li><a data-toggle="tab" id="loadGen" href="#menu_g">Generados</a></li>
                    <li><a data-toggle="tab" id="loadAss" href="#menu_as">Asignados</a></li>
                
                    <li><a data-toggle="tab" id="loadAt" href="#menu_at">Atendidos</a></li>
                    <li><a data-toggle="tab" id="loadIns" href="#menu_ins" style="display: none;">Bienvenida</a></li>

                </ul>
                <div class="tab-content">

                    <div id="menu_at" class="tab-pane fade in">
                        <ul class='nav nav-tabs' id="tabs_documentos2">
                                <li><a data-toggle="tab" id="loadAreasRes" href="#menu_aR">Areas</a></li>
                                <li><a data-toggle="tab" id="loadTitularRes" href="#menu_tR">Titular</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="menu_aR" class="tab-pane fade in active">
                                   <div id="secc_ares">
                                        <table id="table_ares">
                                            <thead>
                                                <th>id</th>
                                                <th>folio</th>
                                                <th>Asunto</th>
                                                <th>Folio respuesta</th>
                                                <th>Numero oficialia</th>
                                                <th>Fecha de respuesta</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                   </div>

                            </div>

                            <div id="menu_tR" class="tab-pane fade in">
                                   <div id="secc_tres">
                                        <table id="table_tres">
                                                <thead>
                                                    <th>id</th>
                                                    <th>folio</th>
                                                    <th>Oficialia</th>
                                                    <th>Folio respuesta</th>
                                                    <th>Fecha respuesta</th>
                                                    <th>Asunto</th>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                        </table>
                                   </div>

                            </div>
                        
                        </div>


                    </div>
                    <div id="menu_ins" class="tab-pane fade in active">
                        <img src="../img/welcome.jpg" alt="">
                    </div>
                    <div id="menu_g" class="tab-pane fade in">


                        <ul class='nav nav-tabs' id="tabs_documentos2">
                            <li><a data-toggle="tab" id="loadAreas" href="#menu_a">Areas</a></li>
                            <li><a data-toggle="tab" id="loadTitular" href="#menu_t">Titular</a></li>
                            <li><a data-toggle="tab" id="loadCopias" href="#menu_cc">Copias de conocimiento</a></li>
                            <li><a data-toggle="tab" id="loadac" href="#menu_ac">DGRDC</a></li>
                            <li><a data-toggle="tab" href="#opc" style="display: none;">selecciona una opcion</a></li>

                        </ul>

                        <div class="tab-content">
                            <div id="opc" class="tab-pane fade in active">
                                <div id="sel_opc">
                                    <img src="../img/opc_font.jpg" alt="">
                                </div>

                            </div>

                            <div id="menu_ac" class="tab-pane fade in">
                                <div id="doc_ext1">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-g-ac" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example_ac" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                               
                                                <th>id</th>
                                                <th>Direccion</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>



                            <div id="menu_a" class="tab-pane fade in">
                                <div id="doc_ext1">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-g-a" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Direccion</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>
                                                <th>estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div id="menu_t" class="tab-pane fade in">
                                <div id="doc_ext1">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-g-t" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example_titular" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div id="menu_cc" class="tab-pane fade in">
                                <div id="doc_ext">
                                    <table id="example_cc" style="cursor:pointer;"
                                        class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Direccion</th>
                                                <th>op_control</th>
                                                <th>N.Oficio</th>
                                                <th>Fecha registro</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha recepcion</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="menu_as" class="tab-pane fade">
                        <ul class='nav nav-tabs' id="tabs_documentos3">
                            <li><a data-toggle="tab" id="loadtt" href="#menu_ti">Turnos titular</a></li>
                            <li><a data-toggle="tab" id="loadat" href="#menu_ar">Turnos areas</a></li>
                            <li><a data-toggle="tab" id="loadac_t" href="#menu_ac_t">Turnos DGRDC</a></li>
                            <li><a data-toggle="tab" id="loadac_2021" href="#menu_2021">Turnos titular 2021</a></li>
                            <li><a data-toggle="tab" id="loadac_2021" href="#menu_2021_a">Turnos Areas 2021</a></li>

                            <li><a data-toggle="tab" href="#opc " style="display: none;">selecciona una opcion</a></li>
                        </ul>

                        <div id="doc_ext">


                            <div class="tab-content">

                                <div id="menu_2021_a"  class="tab-pane fade in">
                                    <table id="turnos_2021_a" style="cursor:pointer;"
                                            class="table  table-sm table-borderedless table-hover">
                                            <thead>
                                            <th id="id_table_doc">Id</th>
                                                <th>Folio</th>
                                                <th>N.Oficio</th>
                                                <th>Asunto</th>
                                                <th>Numero Oficialia</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha limite</th>
                                                <th>Remitente</th>
                                            </thead>
                                            <tbody></tbody>
                                    </table>
                                </div>

                                <div id="menu_2021" class="tab-pane fade in">
                                        <table id="turnos_2021" style="cursor:pointer;"
                                            class="table  table-sm table-borderedless table-hover">
                                            <thead>
                                                <th id="id_table_doc">Id</th>
                                                <th>Folio</th>
                                                <th>N.Oficio</th>
                                                <th>Asunto</th>
                                                <th>Numero Oficialia</th>
                                                <th>Fecha oficio</th>
                                                <th>Fecha limite</th>
                                                <th>Remitente</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                </div>


                                <div id="menu_ac_t" class="tab-pane fade in">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-t-ac" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example_ac_t" style="cursor:pointer;"
                                        class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th id="id_table_doc">Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>



                                <div id="opc" class="tab-pane fade in active">
                                    <div id="sel_opc2">
                                        <img src="../img/opc_font.jpg" alt="">
                                    </div>

                                </div>
                                <div id="menu_ti" class="tab-pane fade in">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-t-ti" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="example_as" style="cursor:pointer;"
                                        class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th id="id_table_doc">Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div id="menu_ar" class="tab-pane fade in">
                                    <div class="content-table-control">
                                        <div class="option-table-2">
                                            <div class="option-c">
                                                <button id="reload-t-ar" class="btn btn-sm btn-primary">Actualizar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="example_turnos_areas" style="cursor:pointer;"
                                        class="table  table-sm table-borderedless table-hover">
                                        <thead>
                                            <th>Id</th>
                                            <th>Folio</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Numero Oficialia</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Remitente</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>

                            </div>



                        </div>

                    </div>


                </div>
            </div>



        </div>
        <div id="iframeD" style="overflow-y:scroll">
            <div id="resultadoBusqueda">
                <img id="img_null" src="../img/null.jpg" width="450px" height="510px" alt="">
            </div>
        </div>


        <div id="btn-content">
            <img src="../img/iconos/add.png" id="add" alt="">
            <!--<img src="../img/iconos/search_es.png" id="search" alt="">-->
            <img src="../img/iconos/close.png" alt="" id="close_add">
            <div id=filt>


                <div name="formu" id="formu2" autocomplete="on">
                    <label id="enc_filtrar_doc" for="">
                        <h1>Filtrar resultados</h1>
                    </label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-9">
                                <label>Fecha del oficio</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">

                                Del: <input type="date" id="f_i" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Al: <input type="date" id="f_l" class="form-control">
                            </div>
                            <div class="col-md-4">

                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-9">
                                <label>Fecha de recibido</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">

                                Del: <input type="date" id="frec_i" class="form-control">
                            </div>
                            <div class="col-md-4">
                                Al: <input type="date" id="frec_l" class="form-control">
                            </div>
                            <div class="col-md-4">

                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="">Tipo de Documento</label>
                                <select name="txttipo" id="tipo" class="form-control">
                                    <option value="0">Todos</option>
                                    <?php foreach ($lista_tipo as $mostrartipo) { ?>
                                    <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                                        <?php echo $mostrartipo['descripcion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Direccion:</label>
                                <select class="form-control" id="direccion2">
                                    <option value="0">Todas</option>
                                    <?php foreach ($lista_sp as $mostrar) { ?>
                                    <option value="<?php echo $mostrar['id_direccion'] ?>">
                                        <?php echo $mostrar['detalle'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <br>
                                <dd>
                                    <button class="btn btn-success" id="btn_f">Filtrar</button>
                                </dd>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">
            <div id="formu">
                <div class="row">
                    <div class="col-md-9">
                    <div id="num_oficialia"></div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-9">
                        
                            <h1 id="title_reg">Registrar documento</h1>
                        <label id="enc_reg_doc" for="">
                        </label>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Organismo:</label>
                                    <select class="form-control" name="txtorganismo" id="org" required>
                                        <option value="0">Selecciona una opcion</option>
                                        <?php foreach ($lista_organismo as $mostrar) { ?>
                                        <option value="<?php echo $mostrar['id_organismo']; ?>">
                                            <?php echo $mostrar['nombre_organismo']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Otro:</label>
                                    <div class="ui-widget">
                                        <input type="text" id="otro" class="form-control" disabled>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>No. de oficio</label>
                                    <input type="text" name="n_oficio" class="form-control" id="n_oficio">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tipo de Documentos</label>
                                    <select name="txttipo" id="txttipo" class="form-control">
                                        <?php foreach ($lista_tipo as $mostrartipo) { ?>
                                        <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                                            <?php echo $mostrartipo['descripcion']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Direccion:</label>
                                    <select class="form-control" id="direccion_cat">
                                        <option value="0">Selecciona una opcion</option>
                                        <?php foreach ($lista_sp as $mostrar) { ?>
                                        <option value="<?php echo $mostrar['id_direccion'] ?>">
                                            <?php echo $mostrar['detalle']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Categoria</label>
                                        <select name="txtop_c" id="top_c" class="form-control">
                                            <option value="0">Selecciona una opcion</option>
                                            <option value="200">Documento para direcciones</option>
                                            <option value="20">Documento para la Titular</option>
                                            <option value="52">Documento de Resolucion a la demanda ciudadana</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <input type="hidden" name="txtfolio2" id="txtfolio2" value="" class="form-control"
                                            disabled>

                                        <input type="hidden" name="txtfolio" id="txtfolio" value="" class="form-control">
                                    </div>
                                </div>

                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Fecha del oficio</label>
                                    <input name="txtfecha_o" id="txtfecha_o" class="form-control" type="date">
                                </div>
                                <div class="col-md-6">
                                    <label>Fecha de recibido</label>
                                    <input name="txtfecha_r" id="txtfecha_r" class="form-control" type="date">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="txtremitente">Remitente: </label>
                                    <div class="ui-widget">
                                        <input type="text" id="txtremitente" class="form-control">
                                    </div>
                                    <!--
                                            <label>Remitente</label>
                                            <input name="txtremitente" id="txtremitente" class="form-control" type="text">
                                            -->
                                </div>
                                <div class="col-md-6">
                                    <label>Cargo</label>
                                    <div class="ui-widget">
                                        <input type="text" id="txtcargo_r" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Anexos:</label>
                                    <textarea class="form-control" name="txtAnexos" id="txtanexos" cols="30"
                                        rows="2"></textarea>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label>Comentario:</label>
                                    <textarea class="form-control" name="txtcomentario" id="txtcomentario" cols="30"
                                        rows="5"></textarea>

                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">


                                    <input class="btn btn-success" value="Registrar documento" id="reg_doc" name="envia" />

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                <div class="col-md-12">
                        <div id=dropzone>
                            <div id="add_file_database">
                                <button id="up_database" class="btn btn-sm btn-success" title="Subir archivos">✔</button>

                            </div>

                                <button id="clear_drop" class="btn btn-sm btn-danger" title="Eliminar todos los archivos">✘</button>
                                <form action="/" class="dropzone" id="drop2">

                                   <!-- <img src="../img/iconos/cloud.png" id="cloud">-->      
                    </form>
                        </div>
                    </div>                       
                </div>

            </div>
            
          
        </div>

        <script>
        var arrayFiles = [];
        Dropzone.options.drop2 = {

            addRemoveLinks: true,
            aceptedFile: ".pdf",
            maxFilesize: 2,
            maxFiles: 20,
            init: function() {
                $('.dz-remove').text("Remover archivo");
                this.on("addedfile", function(file) {
                    $('#add_file_database').show();
                    $('#clear_drop').show();
                    arrayFiles.push(file);
                    console.log("arrayFiles", arrayFiles);
                });
                this.on("removedfile", function(file) {
                    var index = arrayFiles.indexOf(file);
                    arrayFiles.splice(index, 1);
                    console.log("arrayFiles", arrayFiles);
                });
            }

        }
        $('#clear_drop').click(function() {
            Dropzone.forElement("#drop2").removeAllFiles(true);
        });

        $("#up_database").click(function() {
            var cat = $('#top_c').val();
            let folio = $('#txtfolio2').val();
            //alert(folio);
            if (folio == "") {
                swal("Por favor genera un folio para subir los archivos")
            } else {
                //swal("Folio detectado");
                if (arrayFiles.length > 0) {
                    var listaFiles = [];
                    var finalFor = 0;
                    for (var i = 0; i < arrayFiles.length; i++) {
                        var datosFiles = new FormData();
                        datosFiles.append("file", arrayFiles[i]);
                        datosFiles.append("folio", folio);
                        datosFiles.append("cat", cat);

                        $.ajax({
                            type: 'POST',
                            url: '../Controller/up_database.php',
                            data: datosFiles,
                            contentType: false,
                            processData: false,
                            success: function(e) {
                                listaFiles.push({
                                    "foto": e
                                });
                                l_files = JSON.stringify(listaFiles);
                                if ((finalFor + 1) == arrayFiles.length) {
                                    //addFile(l_files);
                                    finalFor = 0;
                                }
                                finalFor++;
                                Dropzone.forElement("#drop2").removeAllFiles(true);
                                // swal({
                                //     title: 'Archivos cargados correctamente!',
                                //     text: 'Los archivos fueron vinculados correctamente al folio seleccionado ',
                                //     icon: 'success',
                                //     button: 'aceptar!',
                                // });
                                swal(e);
                            },
                        });

                    }
                }
            }
        });
        </script>




        <div id="menu2">

            <div name="formu" id="formu2" autocomplete="on">
                <label id="enc_filtrar_doc" for="">
                    <h1>Filtrar resultados</h1>
                </label>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9">
                            <label>Fecha del oficio</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">

                            Del: <input type="date" id="f_i" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Al: <input type="date" id="f_l" class="form-control">
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-9">
                            <label>Fecha de registro</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">

                            Del: <input type="date" id="fr_i" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Al: <input type="date" id="fr_l" class="form-control">
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-9">
                            <label>Fecha de recibido</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">

                            Del: <input type="date" id="frec_i" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Al: <input type="date" id="frec_l" class="form-control">
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <label>No. de oficio</label>
                            <input type="text" id="n_oficio" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tipo de Documento</label>
                            <select name="txttipo" id="tipo" class="form-control">
                                <option value="">Todos</option>
                                <?php foreach ($lista_tipo as $mostrartipo) { ?>
                                <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                                    <?php echo $mostrartipo['descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Direccion:</label>
                            <select class="form-control" id="direccion2">
                                <?php foreach ($lista_sp as $mostrar) { ?>
                                <option value="<?php echo $mostrar['id_direccion'] ?>"><?php echo $mostrar['detalle'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Control de Oficialia:</label>
                            <input type="text" id="oficialia" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <br>
                            <dd>
                                <button class="btn btn-success" id="btn_fecha_oficio">Filtrar</button>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="menu3">
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-4">
                    <label>Fecha del oficio:</label>
                    <label>Fecha inicial</label>
                    <input type="date" class="form-control" id="fecha_oficio_i">
                </div>

            </div>
        </div>
    </div>
   <!-- <div id="temp-screen"></div> -->
    <div id="rebuild">
        <img src="../img/cdmx2.gif" alt="">
    </div>

    <div id="data_small_device">
        <a href="#"><img src="../img/iconos/close.png" id="close_2" title="cerrar" alt=""></a>
        <div id="get_data">

        </div>
    </div>

</body>

<!-- Modal para responder documento  -->
<!-- Modal -->
<div class="modal fade" id="ModalR" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div  class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width:600px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div  class="modal-body">
               <div class="form-row">
                   <div class="col-md-12">
                        <center><h3>Registrar respuesta</h3></center>
                        <input id="id_doc" type="text" value="" disabled>
                   </div>
                <div class="col-md-4">
                    <label>Folio del documento de respuesta:</label>
                    <input type="text" class="form-control" id="folio_r">
                </div>
                <div class="col-md-4">
                    <label>Fecha de respuesta</label>
                    <input type="date" class="form-control" id="f_r">
                </div>
               </div>   
               <div class="form-row">
                    <div class="col-md-12">
                        <label>Respuesta:</label>
                        <textarea  id="respuesta" cols="30" rows="10" class="form-control"></textarea>
                    </div>
               </div>
               <div class="form-row">
                    <div class="col-md-12">
                        <label>Adjuntar oficio de respuesta:</label>
                        <input type="file" class="form-control" id="archivo2">
                    </div>
               </div>
               
               <br>
               <div class="form-row">
                   <div class="col-md-4">

                   </div>
                   <div class="col-md-4">
                        <button id="reg_res" class="btn btn-primary btn-sm">Registrar respuesta</button>
                   </div>


               </div>





            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
<!--
<div id="test_22">

<title>Prueba de test</title>

</div>
-->