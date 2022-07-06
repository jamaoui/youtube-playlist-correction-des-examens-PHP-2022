<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Bonjour  <?php 
        session_start();
        echo $_SESSION['user']['nom']." ".$_SESSION['user']['prenom'];


        $id = $_SESSION['user']['id_client'];
        
        $pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','');
        $date = date('Y-m-d');
        $sqlState = $pdo->prepare('SELECT * FROM location 
                                    INNER JOIN immobilier ON location.id_immobilier=immobilier.id_immobilier
                                    INNER JOIN client     ON client.id_client=location.id_client
                                    WHERE client.id_client=?
                                    AND (? BETWEEN date_debut_location AND date_fin_location)
                                    ');
        $sqlState->execute([$id,$date]);
        $locations = $sqlState->fetchAll(PDO::FETCH_ASSOC);
    ?>
    </h1>
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