<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un client</title>
</head>
<body>
    <?php 
        if(isset($_POST['ajouter'])){
            $cin = $_POST['cin'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty($cin) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($password) ){
                //Insertion
                $pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','');
                $sqlState = $pdo->prepare('INSERT INTO client VALUES(null,?,?,?,?,?)');
                $sqlState->execute([$cin,$nom,$prenom,$email,$password]);
                header('location: listerc.php');
            }else{
                echo "Tous les champs sont requis.";
            }
        }
    ?>
    <form method="post">
        <label>CIN</label><br>
        <input type="text" name="cin"><br>
        <label>Nom</label><br>
        <input type="text" name="nom"><br>
        <label>Prenom</label><br>
        <input type="text" name="prenom"><br>
        <label>Email</label><br>
        <input type="email" name="email"><br>
        <label>Password</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>
</body>
</html>