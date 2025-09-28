<?php
    $dsn="mysql:host=localhost; dbname=pedidosbd; charset=utf8mb4; port=3306";
    $user="root";
    $pass= "";
    try {
        $pdo = new PDO(dsn: $dsn, username: $user, password: $pass);
        $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
    }    
    catch (PDOException $e) {
        echo "Error de Conexion". $e->getMessage();
         }
    ?>