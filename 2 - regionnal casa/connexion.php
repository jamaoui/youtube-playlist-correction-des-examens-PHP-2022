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
        if(isset($_POST['connexion'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty($email) && !empty($password)){
                $pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','');
                $sqlState = $pdo->prepare('SELECT * FROM client WHERE email=? AND password=?');
                $sqlState->execute([$email,$password]);
                if($sqlState->rowCount()>=1){
                    // connecter
                    session_start();
                    $_SESSION['user'] = $sqlState->fetch(PDO::FETCH_ASSOC);
                    header('location: locationsencours.php');
                }else{
                    echo "login ou mot de passe incorrecte";
                }
            }else{
                echo 'champs obligatoire';
            }
        }
    ?>
    <form method="post">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">password</label>
        <input type="password" name="password">
        <input type="submit" value="Connexion" name="connexion">
    </form>
</body>
</html>