<?php





try {
    //$pdo = new PDO("mysql:host=192.185.131.125; dbname=akashasy_archivo2", "akashasy_admin", "12345");
    //$pdo = new PDO("mysql:host=localhost:9700; dbname=archivo2", "gerencia", "12345");
    //$pdo = new PDO("mysql:host=localhost; dbname=archivo2", "gerencia", "12345");
    $pdo = new PDO("mysql:dbname=help_desk;host=database;port:3306;charset=UTF8;", "root", "123");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error en Conexion: " . $e->getMessage());
}