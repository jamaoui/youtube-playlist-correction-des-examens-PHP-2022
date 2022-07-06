<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier professeur</title>
</head>
<body>
    <?php     
        include_once'include/nav.php';
        $id = $_GET['id'];
        $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');

        $sqlState = $pdo->prepare('SELECT * FROM professeur WHERE Matricule_Prof=?');
        $sqlState->execute([$id]);

        $professeur = $sqlState->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['modifier'])){
            $nom = $_POST['nom'];
            $tel = $_POST['tel'];
            $id = $_POST['id'];
            if(!empty($nom) && !empty($tel)){
                $sqlState = $pdo->prepare('UPDATE professeur 
                                            SET nom=? , tel=?
                                            WHERE Matricule_Prof=?
                ');
                $sqlState->execute([$nom,$tel,$id]);
                header('location:professeurs.php');
            }else{
                echo "Le nom et le téléphone sont requis.";
            }
        }
    ?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $professeur['Matricule_Prof']?>"><br>
        <label>Nom</label><br>
        <input type="text" name="nom" value="<?php echo $professeur['nom']?>" ><br>
        <label>Téléphone</label><br>
        <input type="tel" name="tel" value="<?php echo $professeur['tel'] ?>"><br><br>
        <input type="submit" value="Modifier" name="modifier">
    </form>
</body>
</html>