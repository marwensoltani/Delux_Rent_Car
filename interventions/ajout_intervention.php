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

	<title>System de Location des Voitures - Ajouter une intervention</title>

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
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Reservations</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Ajouter une interventio</h4>
                                </div>
                                <div class="card-content">	
					
						<?php
						echo("<b><u>Récapitulatif sur l'utilisateur :  </u></b><BR>");
						//récupérer les données du formulaire "ajout_utilisateur_form"
						$idvehicule=$_POST['vehicule'];
						$idpanne=$_POST['panne'];
						$idindividu=$_POST['individu'];
						$d=$_POST['jourprobleme'];
						$m=$_POST['moisprobleme'];
						$y=$_POST['anneeprobleme'];
						$dateprobleme=$y.'-'.$m.'-'.$d;
						$d=$_POST['jourintervention'];
						$m=$_POST['moisintervention'];
						$y=$_POST['anneeintervention'];
						$dateintervention=$y.'-'.$m.'-'.$d;
						$duree=$_POST['duree'];
						$compterendu=$_POST['compterendu'];
						echo "<BR>";
						echo "<b>Nom de l'utilisateur : </b>";
						$requete = "select nomindividu, prenomindividu from individu where idindividu='".$idindividu."'";
						$resultat = mysqli_query($connect,$requete);
						$row = mysqli_fetch_row($resultat);
						echo $row[0]."<BR>";
						echo "<b>Prénom de l'utilisateur : </b>";
						echo $row[1]."<BR>";
						echo "<b>Matricule du véhicule :</b>";
						$requete = "select immatriculationvehicule from vehicule where idvehicule='".$idvehicule."'";
						$resultat = mysqli_query($connect,$requete);
						$row = mysqli_fetch_row($resultat);
						echo $row[0]."<br>";
						echo "<b>Type de panne :</b>";
						$requete = "select libellepanne from panne where idpanne='".$idvehicule."'";
						$resultat = mysqli_query($connect,$requete);
						$row = mysqli_fetch_row($resultat);
						echo $row[0]."<br>";
						echo "<b>Date du probleme :</b>";
						echo $dateprobleme."<br>";
						echo "<b>Date de l'intervention :</b>";
						echo $dateintervention."<br>";
						echo "<b>Durée :</b>";
						echo $duree."<br>";
						echo "<b>Compte rendu de l'intervention</b>";
						echo $compterendu."<br>";
						// bouton de retour  
						echo "<form>";
						echo "<br><input type='button' class='btn btn-info' value=\"Retour\" onclick=\"window.location='ajouter_intervention_form.php';\">";
						echo "</form>";
						// requéte insertion du nouvel enregistrement dans la table utilisateur
						$requete = "INSERT INTO `intervention` (`idpanne`, `idvehicule`, `idindividu`, `dateprobintervention`, `dateintervention`, `dureeintervention`, `compterenduintervention`) VALUES 
						('".$idpanne."', '".$idvehicule."', '".$idindividu."', '".$dateprobleme."', '".$dateintervention."', '".$duree."', '".$compterendu."')";
						// execution de la requete
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
<?php
// deconnexion de la base
mysqli_close($connect);
?>