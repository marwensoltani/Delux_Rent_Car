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

	<title>System de Location des Voitures - Suppressiobn véhicule</title>

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
								<?php 

										//récupérer les données envoyées par l'URL
										$vehicule=$_GET["code"];
										// requéte affichage du nom et du libelle_type de materiel
										$requete="SELECT IMMATRICULATIONVEHICULE, LIBELLECATEGORIE 
										from vehicule v, categorie c
										where c.IDCATEGORIE=v.IDCATEGORIE
										and IDVEHICULE='".$vehicule."'" ;
										// execution de la requète et test
										$resultat = mysqli_query($connect,$requete);
										$row=mysqli_fetch_array($resultat);  

								?>
	                            <div class="card-header" data-background-color="orange">
	                                <h4 class="title"><center>Suppression véhicule</center></h4>
	                                <p class="category"><center><?php echo "Suppression du materiel ".$row[0]; ?></center></p>
	                            </div>
	                            <div class="card-content table-responsive">
	                              	<?php
	
										//Titre de la page
										echo "<center>";
										echo "Voulez-vous vraiment supprimer cette enregistrement ?<br><br>";
										// bouton de retour
										echo "<form>";
										echo "<input type='button'  class='btn btn-fill btn-danger'  value=\"OUI\" onclick=\"window.location='supprimer_vehicule.php?code=$vehicule';\">";
										echo "&nbsp;";
										echo "<input type='button' class='btn btn-fill btn-info' value=\"NON\" onclick=\"window.location='liste_veh.php?libelle=$row[1]';\">";
										echo "</form></center>";
										// deconnexion de la base
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