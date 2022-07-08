<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php include_once 'nav.php';?>

    <div class="container my-5">
        <form  method="post" >
        <?php 
        if(isset($_POST['connexion'])){
            $matricule = $_POST['matricule'];
            $password = $_POST['password'];

            if(!empty($matricule) && !empty($password)){
                $pdo = new PDO('mysql:host=localhost;dbname=assurance','root','');

                $sqlState = $pdo->prepare('SELECT * FROM assure WHERE matricule=? AND mot_depass=?');
                $sqlState->execute([$matricule,$password]);

                if($sqlState->rowCount()>=1){
                    session_start();
                    $_SESSION['assure'] = $sqlState->fetch(PDO::FETCH_ASSOC);
                    header('location:accueil.php');
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Matricule ou mot de passe incorrecte</strong>
                    </div>
                    <?php
                }
                //....
            }else{
                ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Tous les champs sont obligatoire.</strong>
                    </div>
                    <?php
            }
        
        }
         ?>
            <h3>Authentification</h3>

            <div class="form-group">
            <label>Matricule</label>
            <input type="text" class="form-control" name="matricule">
        </div> 
        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div> 
        <div class="form-group my-2">
            <input type="submit" class="btn btn-primary" name="connexion" value="Connexion">
        </div>
        </form>
    </div>
   
</body>
</html>