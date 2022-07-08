<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Rubriques</title>
</head>
<body>
<?php include_once 'nav.php';?>

    <div class="container my-5">
        <?php 
            session_start();
            if(!isset($_SESSION['assure'])){
                header('location:index.php');
            }
            $id = $_GET['id'];
            $pdo = new PDO('mysql:host=localhost;dbname=assurance','root','');

            $rubriques = $pdo->query("SELECT * FROM rubrique
                WHERE numdossier='$id'
            ")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <h3>Liste des rubriques</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Num rubrique</th>
                    <th>Nom rubrique</th>
                    <th>Num dossier</th>
                    <th>montant rubrique</th>
                </tr>
            </thead>
            <tbody>
               
                    <?php 
                    foreach($rubriques as $data){
                        ?>
                        <tr>
                            <td><?php echo $data['numrubrique']?></td>
                            <td><?= $data['nom_rubrique']?></td>
                            <td><?= $data['numdossier']?></td>
                            <td><?= $data['montant_rubrique']?></td>
                        </tr>

                        <?php
                    }
                    ?>
                   
            </tbody>
        </table>
    </div>
   
</body>
</html>