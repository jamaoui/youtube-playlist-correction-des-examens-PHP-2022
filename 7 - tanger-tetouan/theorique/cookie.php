<?php 
setcookie('filiere','DEV',time()+3600*24*15);

if(isset($_GET['filiere'])){
    echo $_COOKIE['filiere'];
}


?>