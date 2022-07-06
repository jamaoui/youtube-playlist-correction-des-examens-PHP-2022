<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste locations</title>
</head>
<body>
<?php 
    $where =' 1';
    $date1 = $date2 ='';

    if(isset($_GET['rechercher'])){
        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];
        $where = " location.date_debut_location > '$date1'
        AND  location.date_fin_location < '$date2'";

    }

        $pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','');
        $sqlState = $pdo->prepare('SELECT * FROM location 
                                    INNER JOIN immobilier ON location.id_immobilier=immobilier.id_immobilier
                                    INNER JOIN client     ON client.id_client=location.id_client
                                    WHERE ?
                                    ');
        $sqlState->execute([$where]);
        $locations = $sqlState->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form method="get">
        <label>Date début</label>
        <input type="date" name="date1" value="<?php echo $date1?>" >
        <label>Date Fin</label>
        <input type="date" name="date2" value="<?php echo $date2?>">
        <input type="submit" value="rechercher" name="rechercher">
    </form>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>Immobilier</th>
                <th>Nom du client</th>
                <th>Date début</th>
                <th>Date fin</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($locations as $location){
                ?>
                    <tr>
                        <td><?php echo $location['titre']?></td>
                        <td><?php echo $location['nom']?></td>
                        <td><?php echo $location['date_debut_location']?></td>
                        <td><?php echo $location['date_fin_location']?></td>
                    </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>