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

	<title>System de Location des Voitures - Affectation à un utilisateur</title>

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
				<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Véhicules</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Affectation à un utilisateur</h4>
                                    <p class="catergorie">Récapitulatif sur l'affectation du matériel</p>
                                </div>
                                <div class="card-content">
		
						<?php
						//recuperation des donnee
						$personne=$_POST["personne"];
						$vehicule=$_POST["vehicule"];
						echo "<br>";
						echo "<b>Matricule du véhicule affecté : </b>";
						$requete = "select IMMATRICULATIONVEHICULE from vehicule where IDVEHICULE='".$vehicule."'";
						$resultat = mysqli_query($connect,$requete);
						$row = mysqli_fetch_row($resultat);
						echo "<br><span class=\"style3\"><h3><b>".$row[0]."</b></h3></span>";
						echo "<br>";
						echo "<b>Utilisateur : </b>";
						$requete = "select NOMINDIVIDU, PRENOMINDIVIDU from individu where IDINDIVIDU='".$personne."'";
						$resultat = mysqli_query($connect,$requete);
						$row = mysqli_fetch_row($resultat);
						echo "<br><span class=\"style3\"><h3><b>".$row[0].' '.$row[1]."</b></h3></span>";
						// bouton de retour
						echo "<form>";
						echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='affecter_vehicule_form.php';\">";
						echo "</form>";
						//requete d'insertion dans la table
						$requete="update individu set IDVEHICULE='".$vehicule."' where IDINDIVIDU='".$personne."'";
						$resultat = mysqli_query($connect,$requete) or die("erreur dans la requete : " .$requete);
						mysqli_close($connect); 
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php include("../includes/footer.php"); ?>
		</div>
	</div>

</body>

	<?php include("../includes/script.php"); ?>

</html>