<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
    <?php 

        if(isset($_POST['connexion'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            if(!empty($login) && !empty($password)){
                require_once 'database.php';
                $sqlState = $pdo->prepare('SELECT * FROM compteproprietaire
                                            WHERE loginProp=? AND motPasse=?
                    ');
                $sqlState->execute([$login,$password]);

                if($sqlState->rowCount()>=1){
                    session_start();
                    $_SESSION['user'] = $sqlState->fetch(PDO::FETCH_ASSOC);
                    header('location:accueil.php');
                }else{
                    echo "Erreur de login/mot de passe";
                }
            }else{
                echo "Veuillez saisir un login et un mot de passe.";
            }
        }
    ?>

    <h3>Authentification</h3>
    <form method="post">
        <label>Login</label><br>
        <input type="text" name="login"><br>
        <label>Mot de passe</label><br>
        <input type="password" name="password" ><br>
        <input type="submit" value="S'authentifier" name="connexion"><br>
    </form>
</body>
</html>