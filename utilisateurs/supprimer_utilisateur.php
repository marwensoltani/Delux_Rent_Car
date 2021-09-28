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
	    		
	    	<?php include("../includes/navbar.php"); ?>
				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-md-offset-3">
								<div class="card">
									<div class="card-header" data-background-color="orange">
			                            <h4 class="title"><center>Supprimer Utilisateur</center></h4>
			                        </div>
			                        <div class="card-content table-responsive">

										<?php
										//récupérer les données envoyées dans l'adresse URL après confirmation
										$utilisateur=$_GET['code'];
										//Supprimer toutes les missions faite par l'utilisateur
										$requete = "delete from mission where idindividu='".$utilisateur."'";
										$resultat = mysqli_query($connect,$requete);
										//Supprimer tous les sinitres concernant l'utilisateur
										$requete = "delete from sinistre where idindividu='".$utilisateur."'";
										$resultat = mysqli_query($connect,$requete);
										//Permet d'afficher les informations sur l'utilisateur qu'on va supprimer
										$requete = "SELECT nomindividu, prenomindividu from individu where idindividu='".$utilisateur."'" ;
										$resultat = mysqli_query($connect,$requete);
										$row = mysqli_fetch_array($resultat);
										// requete suppression de l'enregistrement
										$requete = "DELETE FROM individu WHERE idindividu = '".$utilisateur."'" ;
										// execution de la requète et test
										$resultat = mysqli_query($connect,$requete);
										if($resultat)
										    echo "<center><span class=style3>La suppression de l'utilisateur ".$row[0].' '.$row[1]." a correctement été effectuée</span><br>" ;
										else
										    echo "<center><span class=style3>La suppression de l'utilisateur ".$row[0].' '.$row[1]." a échouée</span><br>" ;
										// bouton de retour
										echo "<br><br>";
										echo "<form>";
										echo "<input type='button' value=\"Retour\" class='btn btn-primary' onclick=\"window.location='liste_utilisateur.php';\">";
										echo "</form>";
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