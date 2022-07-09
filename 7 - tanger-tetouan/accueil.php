<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once'database.php';
        session_start();
        include_once 'nav.php';
        $heure = date('H');

        $message = '';
        if($heure>=17){
            $message = 'Bonsoir';
        }else{
            $message = 'Bonjour';
        }
    ?>
    <h1 style="text-align: center;"><?php echo $message.' '.$_SESSION['user']['nom'].' '.$_SESSION['user']['prenom'];?></h1>

    <?php 
        $produits = $pdo->query('
            SELECT * FROM produit INNER JOIN categorie ON categorie.idCategorie=produit.idCategorie
            ORDER BY libelle')->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>Réference</th>
                <th>Libelle</th>
                <th>Prix unitaire</th>
                <th>Date achat</th>
                <th>photo produit</th>
                <th>catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($produits as $produit){
                    ?>
                        <tr>
                            <td><?= $produit['reference']?></td>
                            <td><?= $produit['libelle']?></td>
                            <td><?= $produit['prixUnitaire']?></td>
                            <td><?= $produit['dateAchat']?></td>
                            <td><img src="images/<?= $produit['photoProduit']?>" width="100px"></td>
                            <td><?= $produit['denomination']?></td>
                            <td>
                                <a href="modifier.php?id=<?= $produit['reference']?>">Modifier</a>
                                <a onclick="return confirm('Voulez vous vraiment supprimer le produit ?')" href="supprimer.php?id=<?= $produit['reference']?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>