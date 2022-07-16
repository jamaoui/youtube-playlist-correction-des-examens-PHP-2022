<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="100%" border=1>
        <thead>
            <th>Nom</th>
        </thead>
        <tbody>
            <?php 
                $pdo = new PDO('mysql:host=localhost;dbname=mysql','root','');

                $users = $pdo->query('SELECT * FROM user')->fetchAll(PDO::FETCH_ASSOC);
                foreach($users as $user){
                    echo "
                    <tr>
                        <td>".$user['User']."</td>
                    </tr>";
                }

            ?>
        </tbody>
    </table>
</body>
</html>