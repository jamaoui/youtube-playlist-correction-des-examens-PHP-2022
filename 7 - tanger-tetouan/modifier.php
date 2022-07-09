<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produit</title>
</head>
<body>
    <?php 
        require_once'database.php';
        include_once 'nav.php';
        if(isset($_POST['modifier'])){
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix_unitaire'];
            $date = $_POST['date_achat'];
            $categorie = $_POST['categorie'];
            $reference = $_POST['reference'];
            if(!empty($libelle) && !empty($prix) && !empty($date) && !empty($categorie) && isset($_FILES['image'])){
                $tmpName = $_FILES['image']['tmp_name'];
                $image = $_FILES['image']['name'];
                move_uploaded_file($tmpName,'images/'.$image);

                $sqlState = $pdo->prepare('UPDATE produit SET libelle=?,
                                                            prixUnitaire=?,
                                                            dateAchat=?,
                                                            photoProduit=?,
                                                            idCategorie=?
                                                            WHERE reference=?');
                $sqlState->execute([$libelle,$prix,$date,$image,$categorie,$reference]);
                header('location:accueil.php');
            }else{
                echo "Tous les champs sont obligatoires";
            }
        }
        $id = $_GET['id'];
        $sqlState = $pdo->prepare('SELECT * FROM produit WHERE reference=?');
        $sqlState->execute([$id]);

        $produit = $sqlState->fetch(PDO::FETCH_ASSOC);
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="">Reference</label><br>
        <input type="text" name="reference" value="<?= $produit['reference'] ?>"><br>
        <label for="">Libelle</label><br>
        <input type="text" name="libelle" value="<?= $produit['libelle'] ?>"><br>
        <label for="">Prix unitaire</label><br>
        <input type="number" name="prix_unitaire" value="<?= $produit['prixUnitaire'] ?>"><br>
        <label for="">Date Achat</label><br>
        <input type="date" name="date_achat" value="<?= $produit['dateAchat'] ?>"><br>
        <label for="">Photo produit</label><br>
        <input type="file" name="image"><br>
        <img  src="images/<?= $produit['photoProduit'] ?>" alt="" width="150px"><br>
        <label for="">Categorie</label><br>
        <select name="categorie">
            <option value="">Selectionnez une catégorie</option>
            <?php 
                $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                foreach($categories as $categorie){
                    $denomination = $categorie['denomination'];
                    $idCategorie = $categorie['idCategorie'];
                    $selected = $idCategorie==$produit['idCategorie']?' selected ':'';
                    echo "<option $selected value='$idCategorie'>$denomination</option>";
                }
            ?>
        </select><br>
        <input type="submit" value="Modifier" name="modifier">
    </form>

</body>
</html>