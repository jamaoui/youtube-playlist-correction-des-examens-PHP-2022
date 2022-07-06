<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<?php 

include_once'include/nav.php';

if(isset($_POST['connexion'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

        $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');
        $sqlState = $pdo->prepare('SELECT * FROM etudiant WHERE mail=? AND pass=?');
        $sqlState->execute([$email,$password]);

        if($sqlState->rowCount()>=1){
            session_start();
            $_SESSION['user'] = $sqlState->fetch(PDO::FETCH_ASSOC);
            header('location:etudiant.php');
        }else{
            echo "Email ou mot de passe incorrect.";
        }

    }else{
        echo "Tous les champs sont obligatoires.";
    }
}
?>
<form method="post">
    <label>Email</label><br>
    <input type="email" name="email"><br>
    <label>Mot de passe</label><br>
    <input type="password" name="password" ><br><br>
    <input type="submit" value="Connexion" name="connexion">
</form>

</body>
</html>