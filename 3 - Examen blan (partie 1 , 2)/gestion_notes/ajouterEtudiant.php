<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter étudiant</title>
</head>
<body>
    <?php include_once'include/nav.php'?>
    <?php 
        if(isset($_POST['ajouter'])){
            $nom = $_POST['nom'];
            $date = $_POST['date'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!empty($nom) && !empty($date) && !empty($email) && !empty($password)){
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                    ///Connexion a la bdd
                    $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');
                    $sqlState = $pdo->prepare('INSERT INTO etudiant VALUES(null,?,?,?,?,?)');
                    $sqlState->execute([$nom,$date,$tel,$email,$password]);

                }else{
                    echo "L’adresse e-mail doit avoir un format correct.";
                }
            }
            else{
                echo "Tous les champs sont obligatoires.";
            }
        }
    ?>
    <form method="post">
        <label>Nom</label><br>
        <input type="text" name="nom" ><br>
        <label>Date de naissance</label><br>
        <input type="date" name="date" ><br>
        <label>Tél</label><br>
        <input type="tel" name="tel" ><br>
        <label>Email</label><br>
        <input type="email" name="email" ><br>
        <label>Mot de passe</label><br>
        <input type="password" name="password" ><br><br>
        <input type="submit" value="Ajouter" name="ajouter"><br>
    </form>
</body>
</html>