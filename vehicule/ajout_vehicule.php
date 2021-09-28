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

	<title>System de Location des Voitures - Ajouter un véhicule</title>

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
					<h1>Ajouter un véhicule</h1>

							<?php
							//récupérer les données du formulaire
							$matricule=$_POST["matricule"];
							$nbrporte=$_POST["nbrporte"];
							$puissance=$_POST["puissance"];
							$nbrplace=$_POST["nbrplace"];
							$cartegrise=$_POST["cartegrise"];
							$pathphoto=$_POST["pathphoto"];
							$d=$_POST["jouracquisition"];
							$m=$_POST["moisacquisition"];
							$y=$_POST["anneeacquisition"];
							$dateacquisition=$y.'-'.$m.'-'.$d;
							$categorie=$_POST["categorie"];
							$service=$_POST["service"];
							$typevehicule=$_POST["typevehicule"];
							$modele=$_POST["modele"];
							$typecarburant=$_POST["typecarburant"];
							$site=$_POST["site"];
							$coutassurance=$_POST["coutassurance"];
							if ( empty($coutassurance) )
								$coutassurance=NULL;
							$d=$_POST["jourassurance"];
							$m=$_POST["moisassurance"];
							$y=$_POST["anneeassurance"];
							if( $d!="0" )
								$datedebutassurance=$y.'-'.$m.'-'.$d;
							else
								$datedebutassurance=NULL;
							$d=$_POST["jourfinassurance"];
							$m=$_POST["moisfinassurance"];
							$y=$_POST["anneefinassurance"];
							if( $d!="0" )
								$datefinassurance=$y.'-'.$m.'-'.$d;
							else
								$datefinassurance=NULL;
							$fournisseur=$_POST["fournisseur"];
							$coutreparation=$_POST["coutreparation"];
							if ( empty($coutreparation) )
								$coutreparation=NULL;
							$d=$_POST["jourreparation"];
							$m=$_POST["moisreparation"];
							$y=$_POST["anneereparation"];
							if( $d!="0" )
								$datedebutreparation=$y.'-'.$m.'-'.$d;
							else
								$datedebutreparation=NULL;
							$d=$_POST["jourfinreparation"];
							$m=$_POST["moisfinreparation"];
							$y=$_POST["anneefinreparation"];
							if( $d!="0" )
								$datefinreparation=$y.'-'.$m.'-'.$d;
							else
								$datefinreparation=NULL;
							$fournisseur2=$_POST["fournisseur2"];
							//Requete de travail
							$requete = "INSERT INTO `vehicule` (`IDMODELE`, `IDTYPEVEHICULE`, `IDFOURNISSEUR`, `IDSITE`, `IDCATEGORIE`, `IDTYPECARBURANT`, 
							`IDSERVICE`, `FOU_IDFOURNISSEUR`, `NBRPORTEVEHICULE`, `PUISSANCEVEHICULE`, `NBRPLACEVEHICULE`, `CARTEGRISEVEHICULE`, 
							`IMMATRICULATIONVEHICULE`, `PATHPHOTOVEHICULE`, `DATEAQUISITIONVEHICULE`, `DATEDEBUTASSURANCE`, `DATEFINASSURANCE`, 
							`COUTASSURANCE`, `DATEDEBUTREPARATION`, `DATEFINREPARATION`, `COUTREPARATION`) VALUES 
							($modele, $typevehicule, $fournisseur, $site, $categorie, $typecarburant, $service, $fournisseur2, $nbrporte, $puissance, 
							$nbrplace, '$cartegrise', '$matricule', '$pathphoto', $dateacquisition, $datedebutassurance, $datefinassurance, $coutassurance,
							$datedebutreparation, $datefinreparation, $coutreparation)";
							$resultat = mysqli_query($connect,$requete) or die("erreur dans la requete : " . $requete);
							// bouton de retour
							if( $resultat )
								echo "<span class=\"style3\"><b>Ajout effectué avec succés</b></span>";
							else
								echo "<span class=\"style3\"><b>Désolé problème lors de l'ajout</b></span>";
							echo "<form><br>";
							echo "<input type='button' value=\"Retour\" onclick=\"window.location='ajouter_vehicule_form.php';\">";
							echo "</form>";
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

<?php
mysqli_close($connect);
?>