<?php 
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','');
    $sqlState = $pdo->prepare('DELETE FROM client WHERE id_client=?');
    $sqlState->execute([$id]);
    header('location: listerc.php');