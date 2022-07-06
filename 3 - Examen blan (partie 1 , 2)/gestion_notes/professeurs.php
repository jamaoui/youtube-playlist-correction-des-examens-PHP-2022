<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php     include_once'include/nav.php';?>

    <a href="ajouter.php">Ajouter professeur</a>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Tel</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');
                $professeurs = $pdo->query('SELECT * FROM professeur')->fetchAll(PDO::FETCH_ASSOC);

                foreach($professeurs as $professeur){
                    $id = $professeur['Matricule_Prof'];
                    ?>
                    <tr>
                        <td><?=  $id ?></td>
                        <td><?php echo $professeur['nom'] ?></td>
                        <td><?php echo $professeur['tel'] ?></td>
                        <td>
                            <a href="afficher.php?id=<?= $id?>">Afficher cours</a>
                            <a href="modifier.php?id=<?= $id?>">Modifier</a>
                            <a href="supprimer.php?id=<?= $id?>" onclick="return confirm('Voulez vous vraiment supprimer le professeur <?php echo $professeur['nom'] ?> ? ')">Supprimer</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>