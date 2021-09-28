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

	<title>System de Location des Voitures - Suppression reservation</title>

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
					<h1>Suppression reservation</h1>
					
							<?php
							//récupérer les données envoyées dans l'adresse URL après confirmation
							$reservation=$_GET['code'];
							//Ne pas effacer les logiciels affectés à la societe supprimée
							$requete = "delete from mission where idmission='".$reservation."'";
							$resultat = mysqli_query($connect,$requete);
							if($resultat)
								echo("<center><span class=style3>La suppression du réservation N° ".$reservation." a correctement été effectuée</span><br>") ;
							else
								echo("<center><span class=style3>La suppression du réservation N° ".$reservation." a échouée</span><br>") ;
							// bouton de retour
							echo "<br><br>";
							echo "<form>";
							echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_reservation.php';\">";
							echo "</form>";
							?>
				</div>
			</div>

			<?php include("../includes/footer.php"); ?>
		</div>
	</div>

</body>

	<?php include("../includes/script.php"); ?>

</html>
<?
mysqli_close($connect); 
?>