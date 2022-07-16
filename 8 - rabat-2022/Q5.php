<?php 

if(isset($_POST['connexion'])){
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $pdo = new PDO('mysql:host=localhost;dbname=ISTA','root','');

    $sqlState = $pdo->prepare('SELECT * FROM users where login=? AND password=?');
    $sqlState->execute([$login,$pass]);

    if($sqlState->rowCount()>=1){
        session_start();
        $_SESSION['user'] = $sqlState->fetch(PDO::FETCH_ASSOC);
        header('location: index.php');
    }else{
        echo "Login ou mot de passe incorrecte";
    }
}

?>