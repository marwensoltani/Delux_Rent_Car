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

	<title>System de Location des Voitures - Ajouter Contrat</title>

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
					<h1>Ajouter Contrat</h1>
							<?php
							$fournisseur=$_POST["fournisseur"];
							$contrat=$_POST["contrat"];
							$matricule=$_POST["matricule"];
							$d=$_POST['jourcontrat'];
							$m=$_POST['moiscontrat'];
							$y=$_POST['anneecontrat'];
							$datedebutcontrat=$y.'-'.$m.'-'.$d;
							if($d==0)
								$datedebutcontrat=NULL;
							$d=$_POST['jourfin'];
							$m=$_POST['moisfin'];
							$y=$_POST['anneefin'];
							$datefincontrat=$y.'-'.$m.'-'.$d;
							if($d==0)
								$datefincontrat=NULL;
							$montant=$_POST['montant'];
							//requete de mise � jour 
							$requete="insert into contrat (idfournisseur, idtypecontrat, idvehicule, datedebcontrat, datefincontrat, montantcontrat) 
							values ($fournisseur, $contrat, $matricule, '$datedebutcontrat', '$datefincontrat', $montant)";
							$resultat = mysqli_query($connect,$requete) or die(mysqli_error());
							if($resultat)
								echo("<span class=\"style4\">L'ajout � �t� correctement effectu�</span>") ;
							else
								echo("<span class=\"style4\">V�rifiez que le contrat n'existe pas</span>") ;
							// bouton de retour
							echo "<br><br>";
							echo "<form>";
							echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_contrat.php';\">";
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
