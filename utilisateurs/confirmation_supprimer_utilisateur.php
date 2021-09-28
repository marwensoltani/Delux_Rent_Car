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

	<title>System de Location des Voitures - Supprimer Utilisateur</title>

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
	    		
	    	<?php include("../includes/navbar.php");
			//récupérer les données envoyées par l'URL
			$utilisateur=$_GET['code'];
			// requéte affichage du nom et du libelle_type d'utilisateur
			$requete="SELECT nomindividu, prenomindividu from individu where idindividu='".$utilisateur."'" ;
			// execution de la requète et test
			$resultat = mysqli_query($connect,$requete) or die(mysqli_error());
			$row = mysqli_fetch_array($resultat);

	    	 ?>
				
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-md-offset-3">
								<div class="card">
									<div class="card-header" data-background-color="orange">
			                            <h4 class="title"><center>Supprimer Utilisateur</center></h4>
			                            <p class="category"><center><?php echo "Suppression de l'utilisateur ".$row[0].' '.$row[1]; ?></center></p>
			                        </div>
			                        <div class="card-content table-responsive">

										<?php

										//Titre de la page
										echo "<center><strong>";
										echo "Voulez-vous vraiment supprimer cette enregistrement ?<br><br>";	
										// bouton de retour
										echo "<form>";
										echo "<input type='button' value=\"OUI\" class='btn btn-info' onclick=\"window.location='supprimer_utilisateur.php?code=$utilisateur';\">";
										echo "<input type='button' value=\"NON\" class='btn btn-danger' onclick=\"window.location='liste_utilisateur.php';\">";
										echo "</form>";
										echo "</strong></center>";
										// deconnexion de la base
										mysqli_close($connect); 
										?>
									</div>
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