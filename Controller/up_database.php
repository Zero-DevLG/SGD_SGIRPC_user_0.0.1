<?php 
    include("../Model/Conexion.php");
     $nombre = $_FILES['file']['name'];
     $nombre_temporal = $_FILES['file']['tmp_name'];
    $folio = $_POST['folio'];
    $cat = $_POST['cat'];
     

    if ($cat == 20) {
        $urlMove = "../../repositorio_sgirpc/doc_t";
        $nombre = $nombre . "-T";
        $url = "../../repositorio_sgirpc/doc_t" . $nombre;
    } else if ($cat == 200) {
        $nombre = $nombre . "-A";
        $urlMove = "../../repositorio_sgirpc/doc_areas/";
        $url = "../../repositorio_sgirpc/doc_areas/" . $nombre;
    }
    else if($cat == 52){
        $nombre = $nombre . "-AC";
        $urlMove = "../../repositorio_sgirpc/doc_AC/";
        $url = "../../repositorio_sgirpc/doc_AC/" . $nombre;
    }

    $sentencia_ia = $pdo->prepare("INSERT INTO temp_a(op_folio,url,a_nombre) VALUES(:op_folio,:url,:a_nombre)");
    $sentencia_ia->bindParam(':op_folio', $folio);
    $sentencia_ia->bindParam(':url', $url);
    $sentencia_ia->bindParam(':a_nombre', $nombre);

    $sentencia_ia->execute();

    if(move_uploaded_file($nombre_temporal, $url))
    {
        echo "Exito";
    }else{
        echo "Error";
    }
    



     //echo $nombre_temporal;


?>