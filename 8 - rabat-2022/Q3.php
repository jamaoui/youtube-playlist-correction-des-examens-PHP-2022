<?php 
$villes = ['Rabat', 'Casablanca','Tanger'];
?>
<ul>
   <?php 
    foreach($villes as $ville){
        echo "<li>".$ville."</li>";
    }
   ?>
</ul>