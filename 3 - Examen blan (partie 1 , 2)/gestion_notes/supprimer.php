<?php 
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');
    $sqlState = $pdo->prepare('DELETE FROM professeur WHERE Matricule_Prof=?');
    $sqlState->execute([$id]);

    header('location:professeurs.php');

?>