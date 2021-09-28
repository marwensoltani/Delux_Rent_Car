<?php 
// On commence par récupérer les champs 
 $nom=$_POST['nom'];
                            $prenom=$_POST['prenom'];
                            $tel=$_POST['tel'];
                            $cin=$_POST['cin'];
                            $interne=$_POST['interne'];

// On vérifie si les champs sont vides 
if(empty($nom) OR empty($prenom) OR empty($tel) OR empty($cin) OR empty($interne)) 
    { 
    echo '<font color="red">Attention, seul le champs <b>ICQ</b> peut rester vide !</font>'; 
    } 

// Aucun champ n'est vide, on peut enregistrer dans la table 
else      
    { 
       // connexion à la base
$serveur = "localhost"; 
$login = "root"; 
$pswd = ""; 
$bdd = "parcauto"; 
$connect = mysqli_connect($serveur,$login,$pswd) or die ('erreur de connexion'); 
mysqli_select_db($connect, $bdd) or die ('erreur de connexion base'); 
     
    // on écrit la requête sql 
   $requete = "INSERT INTO `individu` (`NOMINDIVIDU`, `PRENOMINDIVIDU`, `TELINDIVIDU`, `CININDIVIDU`, `INTERNE`) VALUES 
                            ('".$nom."', '".$prenom."', '".$tel."', '".$cin."', ".$interne.")"; 
     
    // on insère les informations du formulaire dans la table 
    $resultat = mysqli_query($connect,$requete) or die("erreur dans la requete : " .$requete);
                          
    // on affiche le résultat pour le visiteur 
    echo 'Vos infos on été ajoutées.'; 
  mysqli_close($connect);
     // on ferme la connexion 
    }  
?>
  