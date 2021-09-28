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

	<title>System de Location des Voitures - Modifier Sinistre</title>

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
					<a href="##" onclick="window.history.back();" class="btn-success btn">Listes Sinistre</a>
					<div class="row">
    					<div class="col-md-12">
                            <div class="card">
                                <div class="card-header text-center" data-background-color="purple">
                                    <h4 class="title">Modification Sinistre</h4>
                                </div>
                                <div class="card-content">
									<?php
									//récupération des données à modifier
									$code=$_POST["code"];
									$individu=$_POST["nom"];
									$vehicule=$_POST["matricule"];
									$lieu=$_POST["lieu"];
									$d=$_POST['jour'];
									$m=$_POST['mois'];
									$y=$_POST['annee'];
									$date=$y.'-'.$m.'-'.$d;
									if($d==0)
										$date=NULL;
									$degatmat=$_POST['degatmateriel'];
									$degatcor=$_POST['degatcorporel'];
									$nbrdeces=$_POST['nbrdeces'];
									//requete de mise à jour 
									$requete="update sinistre set idvehicule='".$vehicule."', idindividu='".$individu."', lieusinistre='".$lieu."', 
									datesinistre='".$date."', degatmatsinistre='".$degatmat."', degatcorsinistre='".$degatcor."', nbrdecessinistre='".$nbrdeces."'
									where idsinistre='".$code."'";
									$resultat=mysqli_query($connect,$requete) or die(mysqli_error());
									if($resultat)
										echo("<span class=\"style4\">La modification à été correctement effectuée</span>") ;
									else
										echo("<span class=\"style4\">La modification à échouée</span>") ;
									// bouton de retour
									echo "<br><br>";
									echo "<form>";
									echo "<input type='button' class='btn btn-defaut' value=\"Retour\" onclick=\"window.location='liste_sinistre.php';\">";
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