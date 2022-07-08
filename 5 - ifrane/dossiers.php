<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Liste dossiers</title>
</head>
<body>
<?php include_once 'nav.php';

$pdo = new PDO('mysql:host=localhost;dbname=assurance','root','');
$dossiers = $pdo->query('SELECT * FROM dossier')->fetchAll(PDO::FETCH_ASSOC);
?>

    <div class="container my-5">
<table class="table table-striped">
    <h3>Liste des dossiers</h3>
    <thead class="thead-striped">
        <tr>
            <th>Num dossier</th>
            <th>date dêpot</th>
            <th>montant rembourssement</th>
            <th>date traitement</th>
            <th>total dossier</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                foreach($dossiers as $dossier){
                    ?>
                      <tr>
                        <td><?php echo $dossier['numdossier']?></td>
                        <td><?php echo $dossier['datedepot']?></td>
                        <td><?php echo $dossier['montant_remoboursement']?> DHS</td>
                        <td><?php echo $dossier['date_traitement']?></td>
                        <td><?php echo $dossier['total_dossier']?> DHS</td>
                        <td>
                            <a href="modifier.php?id=<?php echo $dossier['numdossier']?>" class="btn btn-success btn-sm">Modifier</a>
                            <a href="supprimer.php?id=<?php echo $dossier['numdossier']?>" class="btn btn-danger btn-sm" onclick=" return confirm('Voulez vous supprimer ce dossier ?')">Supprimer</a>
                            <a href="afficher.php?id=<?php echo $dossier['numdossier']?>" class="btn btn-primary btn-sm">Afficher</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
          
        </tbody>
</table>
    </div>
   
</body>
</html>