<?php

require('Model/Conexion.php');

//$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.op_control, de.fecha_oficio,de.fecha_recibido,de.fecha_registro FROM documentos_externos as de WHERE de.estatus=1 AND de.op_control like '%OP-T-%'");

$consulta_doc_ex = $pdo->prepare("SELECT op.bis,de.estatus,de.id_documento,de.n_oficio,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,op.num FROM documentos_externos as de INNER JOIN op_control_t as op ON op.id_documento = de.id_documento WHERE estatus = 1 OR estatus = 303 OR estatus = 301");
$consulta_doc_ex->execute();
$lista = $consulta_doc_ex->fetchAll(PDO::FETCH_ASSOC);

/*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
//Se guarda en un array dinamico 
$i = 0;
$tabla = "";
foreach ($lista as $mostrar) {
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","op_control":"' . $mostrar['num'] . '","oficio":"' . $mostrar['n_oficio'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_recibido":"' . $mostrar['fecha_recibido'] . '","estatus":"' . $mostrar['estatus'] . '","bis":"' . $mostrar['bis'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';