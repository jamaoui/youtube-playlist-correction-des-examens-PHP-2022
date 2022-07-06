<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
</head>
<body>
    <?php 
    $id = $_GET['id'];
    include_once'include/nav.php';
    $pdo =new PDO('mysql:host=localhost;dbname=gestion_notes','root','');
    $sqlState = $pdo->prepare("SELECT * FROM cours WHERE Matriculeprofesseur=?");
    $sqlState->execute([$id]);
    $cours = $sqlState->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table width="100%" border="1">
        <thead>
            <th>Salle</th>
            <th>Titre</th>
            <th>Coef</th>
        </thead>
        <tbody>
            <?php 
                foreach($cours as $value){
                    echo '<tr>';
                        echo '<td>'.$value['salle'].'</td>';
                        echo '<td>'.$value['titre'].'</td>';
                        echo '<td>'.$value['coef'].'</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>

    </table>
</body>
</html>