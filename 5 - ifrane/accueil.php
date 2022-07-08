<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Accueil</title>
</head>
<body>
<?php include_once 'nav.php';?>

    <div class="container my-5">
        <?php 
            session_start();
            if(!isset($_SESSION['assure'])){
                header('location:index.php');
            }
            $pdo = new PDO('mysql:host=localhost;dbname=assurance','root','');
            $matricule = $_SESSION['assure']['matricule'];

            $data = $pdo->query("SELECT * FROM entreprise 
                            INNER JOIN assure ON entreprise.num_entreprise=assure.num_entreprise
                            WHERE assure.matricule = '$matricule'
                            ")
            ->fetch(PDO::FETCH_ASSOC);
        ?>
        <h3>Informations de l'assuré</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>situation familliale</th>
                    <th>Total rembourssement</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $data['nom_entreprise']?></td>
                    <td><?= $data['situation_familliale']?></td>
                    <td><?= $data['total_remb']?></td>
                </tr>
            </tbody>
        </table>
    </div>
   
</body>
</html>