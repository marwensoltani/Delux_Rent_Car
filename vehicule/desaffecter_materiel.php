<?php session_start(); 
include("../includes/config.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>System de Location des Voitures - Desaffecter Materiel</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

  <div class="wrapper">

      
    <?php include("../includes/sidebar.php"); ?>


      <div class="main-panel">
          
        <?php include("../includes/navbar.php"); ?>
        
      <div class="content">
        <div class="container-fluid">
          <h1>Desaffecter Materiel</h1>
              <b><u>Récapitulatif sur l'affectation du matériel :  </u></b><BR>
              <?php

              include('../config.php');


              //récupérer les données URL de liste_mat.php

              $materiel=$_GET['code'];

              //Gestion du nom de l'utilisateur et du type_utilisateur
              $requete1="select nom_complet_utilisateur, libelle_type_materiel, nom_materiel
              				from utilisateur u, materiel m, type_materiel t 
              				where m.id_type_materiel=t.id_type_materiel 
              						and u.id_utilisateur=m.id_utilisateur 
              						and id_materiel=".$materiel.";";
              						
              $resultat1 = mysqli_query($connect,$requete1) or die("erreur dans la requete : " . $requete1);
              $row1=mysqli_fetch_row($resultat1);
              $nom_complet_utilisateur=$row1[0];
              $libelle_type_materiel=$row1[1];
              $nom_materiel=$row1[2];


              echo"<BR>";
              echo("<b>Type de matériel affecté : </b>");
              echo($libelle_type_materiel);echo"<BR>";
              echo("<b>Nom du matériel affecté : </b>");
              echo($nom_materiel);echo"<BR>";
              echo("<b>Utilisateur affecté : </b>");
              echo($nom_complet_utilisateur);echo"<BR>";

                // bouton de retour
                
              echo "<form>";
              echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='liste_mat.php?libelle=".$libelle_type_materiel."';\">";
              echo "</form>";


                // requéte insertion du nouvel enregistrement dans la table materiel
                $requete5="update materiel set id_utilisateur=NULL where id_materiel='".$materiel."'";
                // execution de la requète
                $resultat5 = mysqli_query($connect,$requete5) or die("erreur dans la requete : " .$requete5);
               

                // deconnexion de la base
              mysqli_close($connect); 

              ?>

        </div>
      </div>

      <?php include("../includes/footer.php"); ?>
    </div>
  </div>

</body>

  <?php include("../includes/script.php"); ?>

</html>

