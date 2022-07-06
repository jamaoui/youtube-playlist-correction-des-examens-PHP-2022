<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter professeur</title>
</head>
<body>
    <?php     
        include_once'include/nav.php';
        if(isset($_POST['ajouter'])){
            $nom = $_POST['nom'];
            $tel = $_POST['tel'];
            if(!empty($nom) && !empty($tel)){
                $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');
                $sqlState = $pdo->prepare('INSERT INTO professeur VALUES(null,?,?)');
                $sqlState->execute([$nom,$tel]);

                header('location:professeurs.php');
            }else{
                echo "Le nom et le téléphone sont requis.";
            }
        }
    ?>
    <form method="post">
        <label>Nom</label><br>
        <input type="text" name="nom" ><br>
        <label>Téléphone</label><br>
        <input type="tel" name="tel"><br><br>

        <input type="submit" value="Ajouter" name="ajouter">
    </form>
</body>
</html>