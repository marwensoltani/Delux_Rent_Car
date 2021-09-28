<?php
$serveur = "localhost"; 
$login = "root"; 
$pswd = ""; 
$bdd = "parcauto"; 
$connect = mysqli_connect($serveur,$login,$pswd) or die ('erreur de connexion'); 
mysqli_select_db($connect, $bdd) or die ('erreur de connexion base'); 
?>