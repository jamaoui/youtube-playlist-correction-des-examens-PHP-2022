<?php 
session_start();

echo "Bienvenue ".$_SESSION['user']['nom'];
?>