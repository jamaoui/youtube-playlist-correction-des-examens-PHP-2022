<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter produit</title>
</head>
<body>
    <?php 
        require_once'database.php';
        include_once 'nav.php';
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix_unitaire'];
            $date = $_POST['date_achat'];
            $categorie = $_POST['categorie'];
            if(!empty($libelle) && !empty($prix) && !empty($date) && !empty($categorie) && isset($_FILES['image'])){
                $tmpName = $_FILES['image']['tmp_name'];
                $image = $_FILES['image']['name'];
                move_uploaded_file($tmpName,'images/'.$image);

                $sqlState = $pdo->prepare('INSERT INTO produit VALUES(null,?,?,?,?,?)');
                $sqlState->execute([$libelle,$prix,$date,$image,$categorie]);

                header('location:accueil.php');
            }else{
                echo "Tous les champs sont obligatoires";
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label for="">Libelle</label><br>
        <input type="text" name="libelle"><br>
        <label for="">Prix unitaire</label><br>
        <input type="number" name="prix_unitaire"><br>
        <label for="">Date Achat</label><br>
        <input type="date" name="date_achat"><br>
        <label for="">Photo produit</label><br>
        <input type="file" name="image"><br>
        <label for="">Categorie</label><br>
        <select name="categorie">
            <option value="">Selectionnez une catégorie</option>
            <?php 
                $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                foreach($categories as $categorie){
                    $denomination = $categorie['denomination'];
                    $idCategorie = $categorie['idCategorie']; 
                    echo "<option value='$idCategorie'>$denomination</option>";
                }
            ?>
        </select><br>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>

</body>
</html>