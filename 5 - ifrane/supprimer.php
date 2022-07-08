<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=assurance','root','');
    $sqlState = $pdo->prepare('DELETE FROM dossier WHERE numdossier=?');
    $sqlState->execute([$_GET['id']]);
    header('location:dossiers.php');
?>