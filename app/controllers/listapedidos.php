<?php
require "../../models/config/conexionPDO.php";

$stmt = $pdo->prepare("SELECT * FROM listapedidos ORDER BY Hora DESC");
$stmt->execute();
$publicaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

;
?>