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
    
    $pdo = new PDO('mysql:host=localhost;dbname=gestion_notes','root','');

    $etudiants = $pdo->query('SELECT * FROM etudiant')->fetchAll();

    $cours = $pdo->query('SELECT * FROM cours')->fetchAll();

    if(isset($_POST['ajouter'])){
        $etudiant = $_POST['etudiant'];
        $cours = $_POST['cours'];
        $date = $_POST['date'];
        $note = $_POST['note'];

        if(!empty($etudiant) && !empty($cours) && !empty($date) && !empty($note)){
            $sqlState = $pdo->prepare('INSERT INTO examen VALUES(?,?,?,?)');
            $sqlState->execute([$etudiant,$cours,$date,$note]);
        }else{
            echo "Tous les champs sont obligatoires.";
        }
    }
    
    ?>

    <form method="post">
        <label>Etudiant</label><br>
        <select name="etudiant">
            <option value="">Choisissez un étudiant</option>
            <?php 
                foreach($etudiants as $etudiant){
                    echo "<option value='".$etudiant['code_etudiant']."'>".$etudiant['nom']."</option>";
                }
            ?>
        </select><br>

        <label>Cours</label><br>
        <select name="cours">
            <option value="">Choisissez un cours</option>
            <?php 
            foreach($cours as $value){
                echo "<option value='".$value['Numcours']."'>".$value['titre']."</option>";
            }
            ?>

        </select><br>

        <label>Date</label><br>
        <input type="date" name="date"><br>

        <label>Note</label><br>
        <input type="number" max="40" name="note"><br><br>

        <input type="submit" value="Ajouter note" name="ajouter">

    </form>
</body>
</html>