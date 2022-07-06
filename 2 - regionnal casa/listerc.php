<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste clients</title>
</head>
<body>
    <?php 
        $pdo = new PDO('mysql:host=localhost;dbname=immobilier','root','');
        $sqlState = $pdo->prepare('SELECT * FROM client');
        $sqlState->execute();

        $clients = $sqlState->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <a href="ajouter.php">Ajouter client</a>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th>id_client</th>
                <th>cin</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>password</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                foreach($clients as $client){
                    ?>
                        <tr>
                            <td><?php  echo $client['id_client']?></td>
                            <td><?php  echo $client['cin']?></td>
                            <td><?php  echo $client['nom']?></td>
                            <td><?php  echo $client['prenom']?></td>
                            <td><?php  echo $client['email']?></td>
                            <td><?php  echo $client['password']?></td>
                            <td><a href="supprimer.php?id=<?php echo $client['id_client'] ?>" onclick="return confirm('Voulez vous vraiment supprimer le client ? ')">Supprimer</a></td>
                        </tr>
                    <?php
                }
            ?>
        </thead>
    </table>
</body>
</html>