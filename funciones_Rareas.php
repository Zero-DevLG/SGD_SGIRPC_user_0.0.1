<?php

require('Model/Conexion.php');

$consulta = $pdo->prepare("SELECT d.id_documento,d.folio,op.num,dr.folio_res,dr.date_resp,di.asunto FROM documentos_externos as d INNER JOIN doc_resp as dr ON dr.id_documento = d.id_documento INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN op_control as op ON op.id_documento = d.id_documento");
$consulta->execute();
//Obtiene la cantidad de filas que hay en la consulta
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);


/*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
//Se guarda en un array dinamico 
$i = 0;
$tabla = "";
foreach ($datos as $mostrar) {
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio']  . '","asunto":"' . $mostrar['asunto'] . '","num":"' . $mostrar['num'] . '","date_resp":"' . $mostrar['date_resp'] . '","folio_res":"' . $mostrar['folio_res'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';