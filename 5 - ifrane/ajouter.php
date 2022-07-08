<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Ajouter dossier</title>
</head>
<body>
<?php 
include_once 'nav.php';

?>
    <div class="container my-5">
        <?php 
        $pdo = new PDO('mysql:host=localhost;dbname=assurance','root','');

        if(isset($_POST['ajouter'])){
            $num = $_POST['num'];
            $date_depot = $_POST['date_depot'];
            $montant_rembourssement = $_POST['montant_rembourssement'];
            $date_traitement = $_POST['date_traitement'];
            $lien_malade = $_POST['lien_malade'];
            $assure = $_POST['assure'];
            $maladie = $_POST['maladie'];
            $total_dossier = $_POST['total_dossier'];
    
           
            if(!empty($num) && !empty($date_depot) && !empty($montant_rembourssement) && !empty($date_traitement) 
            && !empty($lien_malade) && !empty($assure) && !empty($maladie) && !empty($total_dossier)){
                if(filter_var($num,FILTER_VALIDATE_INT)){
                   $sqlState = $pdo->prepare('INSERT INTO dossier VALUES(?,?,?,?,?,?,?,?)');
                   $sqlState->execute([$num,$date_depot,$montant_rembourssement,$date_traitement,$lien_malade,$assure,$maladie,$total_dossier]);
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Le Numéro doit être un entier (0,1,2.....).</strong>
                    </div>
                    <?php
                }

            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Tous les champs sont obligatoires.</strong>
                </div>
                <?php
            }
            
        }
        ?>
        <form method="post">
    <div class="form-group">
          <label>Numéro dossier</label>
          <input type="text" name="num" class="form-control">
        </div>
        <div class="form-group">
          <label>Date dépot</label>
          <input type="date" name="date_depot" class="form-control">
        </div>
        <div class="form-group">
          <label>Montant rembourssement</label>
          <input type="number" name="montant_rembourssement" class="form-control">
        </div>
        <div class="form-group">
          <label>Date traitement</label>
          <input type="date" name="date_traitement" class="form-control">
        </div>
        <div class="form-group">
          <label>Lien malade</label>
          <input type="text" name="lien_malade" class="form-control">
        </div>
        <div class="form-group">
         <label>Assure</label>
         <select class="form-control" name="assure">
            <option value="">Selectionnez</option>
         <?php 
            $assures = $pdo->query('SELECT * FROM assure')->fetchAll(PDO::FETCH_ASSOC);
            foreach($assures as $assure){
                echo "<option value='".$assure['matricule']."'>".$assure['nom_assu'].' '.$assure['prenom_assu']."</option>";
            }
         ?>
         </select>
       </div>

       <div class="form-group">
         <label>Maladie</label>
         <select class="form-control" name="maladie">
            <option value="">Selectionnez</option>
         <?php 
            $maladies = $pdo->query('SELECT * FROM maladie')->fetchAll(PDO::FETCH_ASSOC);
            foreach($maladies as $maladie){
                echo "<option value='".$maladie['num_maladie']."'>".$maladie['designation_maladie']."</option>";
            }
         ?>
         </select>
       </div>
       <div class="form-group">
          <label>Total dossier</label>
          <input type="number" name="total_dossier" class="form-control">
        </div>
        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
   
</body>
</html>