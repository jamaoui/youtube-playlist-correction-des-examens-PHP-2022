<?php 
    include_once'database.php';
    $sqlState = $pdo->prepare('DELETE FROM produit WHERE reference=?');
    $sqlState->execute([$_GET['id']]);
    header('location:accueil.php');
?>