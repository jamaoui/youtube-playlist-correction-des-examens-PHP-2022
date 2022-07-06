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
    
    include_once'include/nav.php';
    $pdo =new PDO('mysql:host=localhost;dbname=gestion_notes','root','');

    $where = '';
    if(isset($_GET['filtrer'])){
        $professeur = $_GET['professeur'];
        if(!empty($professeur)){
            $where = "WHERE Matriculeprofesseur='$professeur'";
        }

    }
    $cours = $pdo->query("SELECT * FROM cours 
                        INNER JOIN professeur ON cours.Matriculeprofesseur=professeur.Matricule_prof
    
         $where")->fetchAll(PDO::FETCH_ASSOC);
    $professeurs = $pdo->query('SELECT * FROM professeur')->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <form method="get">
        <label>Professeur</label>
        <select name="professeur">
            <?php 
                foreach($professeurs as $professeur){
                    ?>
                    <option value="<?php echo $professeur['Matricule_Prof']?>"><?php echo $professeur['nom']?></option>
                    <?php
                }
            ?>
        </select>
        <input type="submit" name="filtrer" value="Filtrer"><br><br>
    </form>

    <table width="100%" border="1">
        <thead>
            <tr>
                <th>#Num cours</th>
                <th>Salle</th>
                <th>Professeur</th> 
                <th>Titre</th>
                <th>Coef</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($cours as $value){
                    ?>
                    <tr>
                        <td><?php echo $value['Numcours']?></td>
                        <td><?php echo $value['salle']?></td>
                        <td><?php echo $value['nom']?></td>
                        <td><?php echo $value['titre']?></td>
                        <td><?php echo $value['coef']?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
        
    </table>
</body>
</html>