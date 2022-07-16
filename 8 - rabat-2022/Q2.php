<?php 
function afficherDecision(float $note){
    if($note>=10){
        echo "Reussite";
    }else{
        echo "Echec";
    }
}

afficherDecision(10);
?>