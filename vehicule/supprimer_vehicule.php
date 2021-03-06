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

	<title>System de Location des Voitures - Supprimer Vehicule</title>

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
                            <h4 class="title"><center>Suppressiobn v?hicule</center></h4>
                        </div>
                     	<div class="card-content table-responsive">
							<?php
							//r?cup?rer les donn?es envoy?es par l'URL
							$vehicule=$_GET["code"];
							// requ?te affichage du nom et du libelle_type de materiel
							$requete="SELECT IMMATRICULATIONVEHICULE, LIBELLECATEGORIE 
							from vehicule v, categorie c
							where c.IDCATEGORIE=v.IDCATEGORIE
							and IDVEHICULE='".$vehicule."'" ;
							// execution de la requ?te et test
							$resultat = mysqli_query($connect,$requete);
							$row=mysqli_fetch_array($resultat);
							// requete suppression de l'enregistrement
							$requete="DELETE FROM vehicule WHERE IDVEHICULE = '".$vehicule."'" ;
							// execution de la requete et test
							$resultat = mysqli_query($connect,$requete);
							if( $resultat )
							    echo("<center><span class=style3><b>La suppression du materiel ".$row[0]." de type ".$row[1]." a correctement ?t? effectu?e</b></span><br>") ;
							else
							    echo("<center><span class=style3><b>La suppression du materiel ".$row[0]." de type ".$row[1]." a ?chou?e</b></span><br>") ;
							// bouton de retour
							echo "<br><br><form><input type='button' value=\"Retour\" onclick=\"window.location='liste_veh.php?libelle=$row[1]';\"></form>";
							// deconnexion de la base
							mysqli_close($connect); 
							?>
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